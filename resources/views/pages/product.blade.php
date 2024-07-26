@extends('layouts.app')
@section('title') {{ $product->name }} @endsection
@include('utilities.navbar')

<div class="container mx-auto pt-14 pb-16 px-8">
    <!-- Breadcrumb -->
    <div class="pb-2">
        <nav class="flex px-5 py-3 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/products" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                All Products
                </a>
            </li>
        </nav>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="image">
            <img class="h-auto max-w-full" src="{{ $product->image }}" alt="product image" />
        </div>
        <div class="text">
            <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
            <h2 class="text-4xl font-bold pt-2 pb-2">${{ $product->price }}</h2>
            <p class="mb-3 text-gray-500">{{ $product->description }}</p>
            <div class="mt-5 flex space-x-8">
                <form method="POST" action="{{ route('payment.pay') }}">
                    @csrf
                    <input type="hidden" name="product_id" value={{ $product->id }}>
                    <input type="hidden" name="amount" value={{ $product->price }}>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <img src="/assets/payment.svg" alt="" class="pr-1">
                        Buy Now
                    </button>
                </form>
                <form method="POST" action="{{ route('shopping-cart.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value={{ $product->id }}>
                    <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <img src="/assets/cart-shopping-white.svg" alt="" class="pr-1">
                        Add to cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>