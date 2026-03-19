<?php

namespace App\Http\Controllers;

use App\Models\CartSession;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartSessionController extends Controller
{
    /**
     * Obtener o generar session_id
     */
    private function getSessionId()
    {
        if (!session()->has('cart_session_id')) {
            session(['cart_session_id' => Str::random(40)]);
        }
        return session('cart_session_id');
    }
    
    /**
     * Ver el contenido del carrito
     */
    public function index()
    {
        $sessionId = $this->getSessionId();
        
        $cartItems = CartSession::with('product')
                                ->where('session_id', $sessionId)
                                ->get();
        
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $count = $cartItems->sum('quantity');
        
        return view('cart.index', compact('cartItems', 'total', 'count'));
    }
    
    /**
     * Agregar producto al carrito
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);
        
        $sessionId = $this->getSessionId();
        
        // Buscar si el producto ya está en el carrito de esta sesión
        $cartItem = CartSession::where('session_id', $sessionId)
                               ->where('product_id', $product->id)
                               ->first();
        
        if ($cartItem) {
            // Si ya existe, actualizar cantidad
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
            
            $message = 'Cantidad actualizada en el carrito';
        } else {
            // Si no existe, crear nuevo item
            CartSession::create([
                'session_id' => $sessionId,
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
            
            $message = 'Producto agregado al carrito';
        }
        
        // Obtener el nuevo contador para la respuesta JSON o redirect
        $count = CartSession::where('session_id', $sessionId)->sum('quantity');
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'count' => $count
            ]);
        }
        
        return redirect()->back()->with('success', $message);
    }
    
    /**
     * Actualizar cantidad de un item
     */
    public function update(Request $request, CartSession $cartItem)
    {
        $sessionId = $this->getSessionId();
        
        // Verificar que el item pertenece a la sesión actual
        if ($cartItem->session_id !== $sessionId) {
            abort(403);
        }
        
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);
        
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        
        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }
    
    /**
     * Eliminar item del carrito
     */
    public function remove(CartSession $cartItem)
    {
        $sessionId = $this->getSessionId();
        
        // Verificar que el item pertenece a la sesión actual
        if ($cartItem->session_id !== $sessionId) {
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
        $sessionId = $this->getSessionId();
        
        CartSession::where('session_id', $sessionId)->delete();
        
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }
    
    /**
     * Obtener contador del carrito (para el navbar)
     */
    public function getCount()
    {
        $sessionId = session('cart_session_id');
        
        if (!$sessionId) {
            return 0;
        }
        
        return CartSession::where('session_id', $sessionId)->sum('quantity');
    }
}