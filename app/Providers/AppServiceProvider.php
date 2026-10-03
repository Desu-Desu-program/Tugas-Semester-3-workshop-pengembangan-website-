<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use App\Policies\PostPolicy;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-post', function (User $user, $post) {
            return $user->id === $post->user_id;
        });
    }

    protected $policies = [
        Post::class => PostPolicy::class,
    ];
}
