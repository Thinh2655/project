<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id','product_id','quantity'];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
