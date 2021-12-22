<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    public function khotbaPermissions(){
        return $this->belongsToMany(Khotba::class,'khotba_permissions','user_id','khotba_id');
    }


    public function hasPermission($id){
        $hasPermission = (bool) $this->khotbaPermissions()
        ->where(['khotba_permissions.khotba_id'=>$id,'khotba_permissions.user_id'=>$this->id])->first();
        if($hasPermission || $this->id===1){
            return true;
        }
        return false;
    }
}
