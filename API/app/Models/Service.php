<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'fullname',
        'email',
        'cpNumber',
        'role',
        'service_fee',
        'address',
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   
    public function request(){
        return $this->hasMany(RequestServ::class);
    }
}
