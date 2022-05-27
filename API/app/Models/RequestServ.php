<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestServ extends Model
{
    use HasFactory;

    protected $fillable=[
        'fullName',
        'eMail',
        'cpNumber',
        'details',
        'service_id'
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function request(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
