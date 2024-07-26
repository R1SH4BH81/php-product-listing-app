<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('reference')) { 
            $verifyUrl = config('services.paystack.domain').'/transaction/verify/'.$request->input('reference');
            $verifyResponse = Http::withHeaders([
                 'Authorization' => "Bearer " . config('services.paystack.secret'),
                 'Content-Type' => 'application/json',
                 'Cache-Control' => 'no-cache'
             ])->get($verifyUrl);
             $verifyResponseArray = json_decode($verifyResponse, true);
             $payment = new Payment();
             $payment->reference = $verifyResponseArray['data']['reference'];
             $payment->status = $verifyResponseArray['data']['status'];
             $payment->amount = $verifyResponseArray['data']['amount'] / 500;
             $payment->user_id = $verifyResponseArray['data']['metadata']['custom_fields']['user_id'];
             $payment->product_id = $verifyResponseArray['data']['metadata']['custom_fields']['product_id'];
             $payment->raw_data = $verifyResponseArray['data'];
             $payment->save();
             return redirect('/products')->with('alert', 'Payment Successful!');
        }
        $products = Product::paginate(12);
        return view('pages.products', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('pages.product', ['product' => $product]);
    }

}
