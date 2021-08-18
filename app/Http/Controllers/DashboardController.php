<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['sales'] = Sale::orderBy('created_at', 'desc')->paginate(10);
        $data['customers'] = Customer::orderBy('created_at', 'desc')->paginate(10);
        $data['products'] = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.index', $data);
    }
}
