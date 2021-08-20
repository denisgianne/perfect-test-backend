<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\SaleProduct;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class SaleProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Sale $sale)
  {
    $request->validate([
      'qty'  => ['required', 'min:1', 'max:10'],
    ]);

    $product = Product::find($request->product_id);
    $total_price = $request->qty * $product->price;
    $total = ($request->discount_type == 'percentual') ? ($total_price * (1 - ($request->discount / 100))) : ($total_price - $request->discount);

    SaleProduct::create([
      'sale_id' => $sale->id,
      'product_id' => $product->id,
      'qty' => $request->qty,
      'price' => $product->price,
      'total' => $total,
      'discount_type' => $request->discount_type,
      'discount' => $request->discount,
    ]);
    // calcular total do pedido e atualizar a venda
    $sale->total = SaleProduct::where('sale_id', $sale->id)->sum('total');
    $sale->save();

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
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($sale_id, $id)
  {
    $sale_product = SaleProduct::where('id', $id)->where('sale_id', $sale_id)->first();
    if ($sale_product !== null) {
      $sale_product->delete();
      Sale::find($sale_id)->update([
        'total' => SaleProduct::where('sale_id', $sale_id)->sum('total')
      ]);
    }
    return redirect()->route('sales.edit', ['sale' => $sale_id]);
  }
}
