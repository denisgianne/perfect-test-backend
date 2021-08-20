<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;

class DashboardController extends Controller
{
    private $PAGINATE_ITEMS = 5;
    public function index()
    {
        // $status = SaleController::getStatus();
        $status = [];
        $sales = Sale::orderBy('created_at', 'desc')->paginate($this->PAGINATE_ITEMS);
        $sales_by_status = Sale::selectRaw('SUM(total) as total, status, COUNT(*) as qty')->groupBy('status')->paginate($this->PAGINATE_ITEMS);
        $customers = Customer::orderBy('created_at', 'desc')->paginate($this->PAGINATE_ITEMS);
        $products = Product::orderBy('created_at', 'desc')->paginate($this->PAGINATE_ITEMS);
        return view('dashboard.index', compact('sales', 'sales_by_status', 'customers', 'products', 'status'));
    }
}
