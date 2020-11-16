<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHangModel extends Authenticatable
{
    //ten bang
    protected $table = 'khachhang';
    //Khoa chinh
    protected $primaryKey = 'kh_id';
    //Truong can them
    protected $fillable = ['kh_hoten', 'kh_diachi', 'username', 'password'];

    protected $hidden = [];
    protected $dates = [];
}
