<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','price', 'size','user_id'];

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
