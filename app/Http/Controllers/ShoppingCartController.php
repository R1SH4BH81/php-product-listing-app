<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToShoppingCartRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopping_carts = Auth::user()->shopping_cart()->paginate();
        // dd($shopping_cart);
        return view('pages.shopping-cart', ['shopping_carts' => $shopping_carts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductToShoppingCartRequest $request)
    {
        // Product already in cart?
        $validatedInput = $request->safe();
        $this_product = Auth::user()->shopping_cart()->where('product_id', $validatedInput['product_id'])->first();
        if (!$this_product) {
            $shopping_cart = new ShoppingCart;
            $shopping_cart->user_id = Auth::user()->id;
            $shopping_cart->product_id = $validatedInput['product_id'];
            $shopping_cart->save();
            return redirect()->back()->with('alert', 'Product added to cart successfully.');
        }
        return redirect()->back()->with('alert', 'Product already added to cart!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shopping_cart = ShoppingCart::find($id);
        if ($shopping_cart) {
            $shopping_cart->delete();
            return redirect()->back()->with('alert', 'Product removed from cart successfuly!');
        }
        return redirect()->back()->with('alert', 'No record found!');
    }
}
