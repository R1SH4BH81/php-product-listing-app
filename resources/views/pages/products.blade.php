@extends('layouts.app')
@section('title') {{ 'Products Catalogue' }} @endsection
@include('utilities.navbar')
<div class="container mx-auto pt-14 pb-16">  
    <!-- Breadcrumb -->
    <div class="pb-2">
        <nav class="flex px-5 py-3 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Products</a>
                </div>
            </li>
            </ol>
        </nav>
    </div>
    @if (count($products) > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div>
                    <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow">
                        <a href="/products/{{ $product->slug }}">
                            <img class="p-8 rounded-t-lg" src="{{ $product->image }}" alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="/products/{{ $product->slug }}" class="mb-5">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
                            </a>
                            <div class="flex items-center justify-between mt-5">
                                <span class="text-3xl font-bold text-gray-900 pb-4">${{ $product->price }}</span>
                                <form method="POST" action="{{ route('shopping-cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value={{ $product->id }}>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Add to cart
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('payment.pay') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value={{ $product->id }}>
                                    <input type="hidden" name="amount" value={{ $product->price }}>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Buy Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex pt-4">
            @if($products->currentPage() > 1)
                <!-- Previous Button -->
                <a href="{{ $products->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 mr-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                  </svg>
                  Previous
                </a>
            @endif
            @if($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  Next
                  <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                  </svg>
                </a>
            @endif
        </div>
        
    @else
        <div class="text-center">
            <h3 class="text-2xl font-black pt-8 pb-4">No Products Yet</h3>
        </div>   
    @endif
</div>