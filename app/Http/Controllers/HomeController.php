<?php

namespace App\Http\Controllers;

use App\Models\Jewelry;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jewelries = Jewelry::with('category')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::all();

        return view('welcome', compact('jewelries', 'categories'));
    }
} 