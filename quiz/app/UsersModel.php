<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'user_name', 'user_email', 'user_password'];
    protected $guarded = [];
}
