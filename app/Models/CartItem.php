<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [''];
    protected $hidden = [''];
    protected $appends = ['current_price'];

    public function getCurrentPriceAttribute(){
        return $this->quantity * 10;
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
