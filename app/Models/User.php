<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // Relasi One to One ke Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relasi One to Many ke Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relasi Many to Many ke Role
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected $dates = ['deleted_at'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Mutator: Mengenkripsi password otomatis sebelum disimpan ke database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Accessor: Menggabungkan first_name dan last_name saat data ditampilkan
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}