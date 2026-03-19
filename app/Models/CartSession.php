<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartSession extends Model
{
    use HasFactory;
    
    protected $table = 'cart_sessions';
    
    protected $fillable = [
        'session_id',
        'product_id',
        'quantity'
    ];
    
    /**
     * Relación con el producto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    /**
     * Calcular subtotal del item
     */
    public function getSubtotalAttribute()
    {
        return $this->product->price * $this->quantity;
    }
}