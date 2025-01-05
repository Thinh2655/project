<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order_items;
use App\Models\Categories;
use App\Models\Carts;
use App\Models\orders;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sale_price', 'image_url', 'category_id','status','like'];
    public function orderItem()
    {
        return $this->hasMany(order_items::class);
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function cart()
    {
        return $this->hasMany(Carts::class);
    }
    public function order()
    {
        return $this->hasMany(orders::class);
    }
}
