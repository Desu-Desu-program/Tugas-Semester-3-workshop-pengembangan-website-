<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Alignment;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $request->validate([
            'rotate' => 'nullable|in:0,90,180,270',
            'watermark' => 'nullable|boolean',
        ]);

        $file = $request->file('image');

        if ($file) {
            $original = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());
            $targetExt = in_array($ext, ['png', 'webp'], true) ? $ext : 'jpg';

            $filename = time() . '_'
                . preg_replace('/[^A-Za-z0-9\-_]/', '_', $original)
                . '.' . $targetExt;

            $path = 'products/' . $filename;

            $manager = new ImageManager(Driver::class);

            $image = $manager->decodePath($file->getRealPath())
                ->orient()          // opsional: ikuti rotasi EXIF dari kamera HP
                ->cover(800, 800);  // resize + crop

            $degrees = (int) $request->input('rotate', 0);

            if ($degrees !== 0) {
                $image->rotate($degrees);
            }

            $watermarkPath = public_path('images/watermark.png');

            if ($request->boolean('watermark') && is_file($watermarkPath)) {
                $watermark = $manager->decodePath($watermarkPath)
                    ->scale(width: 150);

                $image->insert(
                    $watermark,
                    10,
                    10,
                    Alignment::BOTTOM_RIGHT,
                    0.5
                );
            }

            $encoded = match ($targetExt) {
                'png' => $image->encodeUsingFileExtension('png', quality: 90),
                'webp' => $image->encodeUsingFileExtension('webp', quality: 85),
                default => $image->encodeUsingFileExtension('jpg', quality: 85),
            };

            Storage::disk('public')->put($path, $encoded->toString());

            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk ditambahkan');
    }
}