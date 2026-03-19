<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra el dashboard del admin
     */
    public function dashboard()
    {
        $stats = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'users' => User::count(),
            'recent_products' => Product::with('category')->latest()->take(5)->get()
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
    
    /**
     * Muestra la lista de productos
     */
    public function products()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }
    
    /**
     * Muestra la lista de categorías
     */
    public function categories()
    {
        $categories = Category::withCount('products')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    
    /**
     * Muestra el formulario para crear una categoría
     */
    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }
    
    /**
     * Guarda una nueva categoría
     */
    public function categoriesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:categories,name',
            'description' => 'nullable|max:255'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories')->with('success', 'Categoría creada exitosamente');
    }
    
    /**
     * Muestra el formulario para editar una categoría
     */
    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    
    /**
     * Actualiza una categoría
     */
    public function categoriesUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $request->validate([
            'name' => 'required|min:3|max:100|unique:categories,name,' . $id,
            'description' => 'nullable|max:255'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories')->with('success', 'Categoría actualizada exitosamente');
    }
    
    /**
     * Elimina una categoría
     */
    public function categoriesDestroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Verificar si tiene productos asociados
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Categoría eliminada exitosamente');
    }
    
    /**
     * Muestra la lista de pedidos
     */
    public function orders()
    {
        return view('admin.orders.index');
    }
    
    /**
     * Muestra la lista de usuarios
     */
    public function users()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }
}