<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;





class UserModel extends Model
{
    // use HasFactor;
    use HasUuids;
    
    protected  $table = "user";
    protected $primaryKey =  "id";
    protected $keyType = "string";
    protected $icrementing = false;

    protected $fillable = [
        "username",
        "password",
        "email",
        "remember_token"
    ];
}
