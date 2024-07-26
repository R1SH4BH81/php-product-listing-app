
<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/products" class="flex items-center">
          <span class="self-center text-2xl font-semibold whitespace-nowrap">Tezda</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        @guest
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white md:dark:bg-gray-900">
            <li>
                <a href="/products" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Products</a>
            </li>
            <li>
                <a href="/login" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Login</a>
            </li>
            <li>
                <a href="/register" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Register</a>
            </li>
            <li>
                <a href="/shopping-cart">
                    <button type="button" class="relative inline-flex items-center text-sm font-medium text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><style>svg{fill:#1662e3}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        <span class="sr-only">Shopping Cart</span>
                        <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">0</div>
                    </button>
                </a>
  
            </li>
            </ul>
        @else
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white md:dark:bg-gray-900">
            <li>
                <a href="/products" class="block py-2 pl-3 pr-4 md:bg-transparent text-blue-700 md:p-0 dark:text-blue-500" aria-current="page">Products</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <button class="pl-4 text-sm font-medium md:bg-transparent text-blue-700 md:p-0 dark:text-blue-500">
                        {{ __('Sign Out') }}
                    </button>
                </form>
            </li>
            <li>
                <a href="/shopping-cart">
                    <button type="button" class="relative inline-flex items-center text-sm font-medium text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><style>svg{fill:#1662e3}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        <span class="sr-only">Shopping Cart</span>
                        <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">{{ Auth::user()->shopping_cart->count() }}</div>
                    </button>
                </a>
  
            </li>
            </ul>
        @endguest
      </div>
    </div>
  </nav>
  