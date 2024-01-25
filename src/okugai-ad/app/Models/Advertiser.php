<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


// ----------メール認証送信機能を追加するか否か----------

//メール認証しない場合（認証用メールは送信されない、一応これだけでもメール認証なしに出来るが、明示的にweb.phpを同時に修正しても良い）
class Advertiser extends Authenticatable

//メール認証する場合（これだけだと、あくまでメール送信するのみ、メール認証は別、 web.phpも修正）
// class Advertiser extends Authenticatable implements MustVerifyEmail

{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];
}
