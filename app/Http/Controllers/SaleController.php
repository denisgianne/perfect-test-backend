<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use App\SaleProduct;
use Illuminate\Http\Request;

class SaleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$sales = Sale::with('customer')->orderBy('date', 'DESC')->orderBy('created_at', 'DESC')->paginate(15);
		return view('sales.index', compact('sales'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		// Uso os dados de clientes e produtos para montar o formulário de inserção
		$customers = Customer::all();
		$products = Product::all();
		$status_list = Sale::status_list();
		return view('sales.create', compact('customers', 'products', 'status_list'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'customer_id'  => ['required', 'nullable']
		]);
		$sale = Sale::create([
			'customer_id' => $request->customer_id,
			'status' => $request->status,
			'date' => implode('-', array_reverse(explode('/', $request->date))),
		]);
		return redirect()->route('sales.edit', $sale);
	}

	/**
	 * Display the specified resource.
	 * @param  int  $id
	 */
	public function show(Sale $sale)
	{
		$sale->load('customer');
		return view('sales.show', compact('sale'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int  $id
	 */
	public function edit(Sale $sale)
	{
		$products = Product::orderBy('name')->get();
		return view('sales.edit', compact('sale', 'products'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  int  $id
	 */
	public function update(Request $request, Sale $sale)
	{
		$sale->update([
			'status' => $request->status
		]);
		return redirect()->route('sales.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 */
	public function destroy(Sale $sale)
	{
		$sale->delete();
		return redirect()->route('sales.index');
	}
}
