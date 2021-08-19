<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use App\SaleProducts;
use Illuminate\Http\Request;

class SaleController extends Controller
{
	public $status = [
		null => 'Escolha...',
		'sold' => 'Vendido',
		'cancel' => 'Cancelado',
		'returned' => 'Devolvido'
	];
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = [];
		$data['sales'] = Sale::with('customer')->paginate(15);
		return view('sales.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data = [];
		// Uso os dados de clientes e produtos para montar o formulário de inserção
		$data['customers'] = Customer::all();
		$data['products'] = Product::all();
		$data['status'] = $this->status;
		return view('sales.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$sale = Sale::create([
			'customer_id' => $request->customer_id,
			'status' => $request->status,
			'date' => implode('-', array_reverse(explode('/', $request->date))),
		]);
		return redirect()->route('sales.edit', ['sale' => $sale->id]);
	}

	/**
	 * Display the specified resource.
	 * @param  int  $id
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int  $id
	 */
	public function edit(Sale $sale)
	{
		$data = [
			'sale' => $sale
		];
		$data['status'] = $this->status;
		$data['products'] = Product::orderBy('name')->get();

		return view('sales.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * @param  int  $id
	 */
	public function update(Request $request, Sale $sale)
	{
		if (isset($request->status)) {
			$sale->update([
				'status' => $request->status
			]);
			return redirect()->route('sales.edit', ['sale' => $sale->id]);
		}

		$request->validate([
			'qty'  => ['required', 'min:1', 'max:10']
		]);

		$product = Product::find($request->product_id);
		$amount = $request->qty * $product->price;
		$total = ($request->discount_type == 'percentual') ? ($amount * (1 - ($request->discount / 100))) : ($amount - $request->discount);

		SaleProducts::create([
			'sale_id' => $sale->id,
			'product_id' => $product->id,
			'qty' => $request->qty,
			'price' => $product->price,
			'total' => $total,
			'discount_type' => $request->discount_type,
			'discount' => $request->discount,
		]);
		// calcular total do pedido e atualizar no mode da venda
		$sale->total = SaleProducts::where('sale_id', $sale->id)->sum('total');
		$sale->save();

		return redirect()->route('sales.edit', ['sale' => $sale->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 */
	public function destroy(Sale $sale)
	{
		dd($sale);
	}
}
