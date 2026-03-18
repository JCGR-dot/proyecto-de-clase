<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importamos el modelo Product
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        
        $featuredProducts = Product::latest()->take(3)->get();
        
        
        return view('welcome', compact('featuredProducts'));
    }
}