<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Replies;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id','content', 'rating'];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Replies::class, 'review_id');
    }
}
