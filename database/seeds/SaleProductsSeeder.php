<?php

use App\Sale;
use Illuminate\Database\Seeder;

class SaleProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sale_products = factory('App\SaleProduct', 150 * 7)->create();
        $sales = Sale::all();
        foreach ($sales as $sale) {
            $sale->update([
                'total' => $sale->products()->sum('total')
            ]);
        }
    }
}
