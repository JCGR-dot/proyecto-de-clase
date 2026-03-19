<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Ver el contenido del carrito
     */
    public function index()
    {
        // Obtener items del carrito del usuario actual
        $cartItems = CartItem::with('product')
                            ->where('user_id', Auth::id())
                            ->get();
        
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'total'));
    }
    
    /**
     * Agregar producto al carrito
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $userId = Auth::id();
        
        // Buscar si el producto ya está en el carrito
        $cartItem = CartItem::where('user_id', $userId)
                            ->where('product_id', $product->id)
                            ->first();
        
        if ($cartItem) {
            // Si ya existe, actualizar cantidad
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
            
            $message = 'Cantidad actualizada en el carrito';
        } else {
            // Si no existe, crear nuevo item
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
            
            $message = 'Producto agregado al carrito';
        }
        
        return redirect()->back()->with('success', $message);
    }
    
    /**
     * Actualizar cantidad de un item
     */
    public function update(Request $request, CartItem $cartItem)
    {
        // Verificar que el item pertenece al usuario
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }
        
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        
        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }
    
    /**
     * Eliminar item del carrito
     */
    public function remove(CartItem $cartItem)
    {
        // Verificar que el item pertenece al usuario
        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }
        
        $cartItem->delete();
        
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }
    
    /**
     * Vaciar el carrito
     */
    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();
        
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }
    
    /**
     * Obtener contador del carrito para el navbar
     */
    public static function getCount()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())->sum('quantity');
        }
        return 0;
    }
}