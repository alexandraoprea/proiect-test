<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2255'],
            'need_accommodation' => ['nullable', 'boolean'],
            'expired_at' => ['required', 'date'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'type' => ['required', 'string'],
            'image' => ['nullable', 'file']
        ]);
        
        $imagePath = null; 
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $imagePath = 'images/' . $file->getClientOriginalName(); // New path in the public directory
            Storage::put($imagePath, file_get_contents($file));
        }
        
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'need_accommodation' => $request->need_accommodation ?? false,
            'expired_at' => $request->expired_at,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'image' => $imagePath 
        ]);


        return redirect(RouteServiceProvider::HOME);
    }


    public function index()
    {
        if (isset($_GET["need_acccommodation"])) {
            $products = Product::where('need_accommodation', '=', 1)
            ->get();
        } else {
            $products = Product::all();
        }
       
        return view('button2', [
            'products' => $products
        ]);
    }
}
