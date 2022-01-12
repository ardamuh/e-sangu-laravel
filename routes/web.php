<?php

use Illuminate\Support\Facades\Route;
use App\http\Livewire\Budgetings;
use App\http\Livewire\Transactions;
use App\Http\Livewire\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('/');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('budgeting', budgetings::class)->name('budgeting');

Route::get('transaction', transactions::class)->name('transaction');

// @auth
//             <a href="{{url('/budgeting')}}"
//                     id="navAction"
//                     class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
//                 >
//                     Budgeting
//             </a>
//           @endauth
//          @guest
//             <a href="{{url('/register')}}"
//                     id="navAction"
//                     class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#""
//                 >
//                     Register
//             </a>
//             <a href="{{url('/login')}}"
//                     id="navAction"
//                     class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
//                 >
//                     Login
//             </a>
//          @endguest