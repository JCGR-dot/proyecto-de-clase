<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

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

    public function products()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }
    

    public function categories()
    {
        $categories = Category::withCount('products')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    
    
    public function orders()
    {
        return view('admin.orders.index');
    }
    
    public function users()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }
}