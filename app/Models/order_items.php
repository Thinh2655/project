<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\orders;

class order_items extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity'];
    public $timestamps = false;
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
