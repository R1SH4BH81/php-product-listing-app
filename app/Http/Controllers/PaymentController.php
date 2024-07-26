<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\App;

class PaymentController extends Controller
{
    /**
     * Make request to payment provider
     */
    public function pay(PaymentRequest $request)
    {
        $validatedInput = $request->safe();
        $url = config('services.paystack.domain')."/transaction/initialize";
        $data = [];
        $data['email'] = Auth::user()->email;
        $data['amount'] = $validatedInput['amount'] * 500;
        $data['reference'] = 'tzd_'.Str::random(20);
        $data['channels'] = ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'];
        $data['metadata']['custom_fields']['user_id'] = Auth::user()->id;
        $data['metadata']['custom_fields']['product_id'] = $validatedInput['product_id'];
        $response = Http::withHeaders([
             'Authorization' => "Bearer " . config('services.paystack.secret'),
             'Content-Type' => 'application/json',
             'Cache-Control' => 'no-cache'
         ])->post($url,$data);
         $response_array = json_decode($response, true);
        if (array_key_exists("authorization_url", $response_array["data"])) {
            return App::environment('production') ? redirect()->away($response_array["data"]["authorization_url"]) : redirect('/products?reference=tzd_WLG6tlezo5OH0MzfB25S');
        }
        return redirect()->back()->with('alert', 'Sorry we are unable to process your payment at this time, try again in few minutes.');
    }
}
