<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id_user_pegawai','username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_user_pegawai', 'id');
    }

}
