<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    use HasFactory;
    //protected $table = 'Pet';
    protected $fillable=[
        'user_id',
        'name',
        'type',
        'breed',
        'gender',
        'age',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
