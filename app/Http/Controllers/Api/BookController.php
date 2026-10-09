<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            // Proses validasi
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'title' => 'required|string',
                'description' => 'required|string',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validasi Gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Simpan data
            $book = \App\Models\Book::create($validator->validated());
            
            return response()->json($book, 201);

        } catch (\Throwable $e) {
            return response()->json([
                'PESAN_ERROR_ASLI' => $e->getMessage(),
                'LOKASI_FILE' => $e->getFile(),
                'BARIS_KE' => $e->getLine()
            ], 500);
        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted'], 200);
    }
}