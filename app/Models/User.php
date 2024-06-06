<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // ユーザーが削除されたときに、そのユーザーのレビューも削除される
    protected static function booted()
    {
        static::deleting(function ($user) {
            $user->reviews()->delete();
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'id' => 'string'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getIsAdminAttribute()
    {   // 管理者用のカラムを取得　データベースのis_adminの値を取得。何もなければfalseを返す
        return $this->attributes['is_admin'] ?? false;
    }
}