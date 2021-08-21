<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard.index');

// Ações padrão do Laravel pelo controlador de recursos ( Padrão CRUD )
/**
 * VERBOS /uri => [ nome da rota ou nome do método ] ( ação )
 * arquivo de controle é o \Http\Controller\TabelaController
 * GET / => [tabela.index] ( lista todos )
 * GET /create => [tabela.create] ( form create )
 * POST / => [tabela.store] ( salvar novo )
 * GET /{id} => [tabela.show] ( exibe item )
 * GET /{id}/edit => [tabela.edit] ( edita item )
 * PUT/PATCH /{id} => [tabela.update] ( edita item )
 * DELETE /{id} => [tabela.destroy] ( exclui item )
 */
Route::resources([
    'customers' => 'CustomerController',
    'products' => 'ProductController',
    'sales' => 'SaleController',
    'sale.product' => 'SaleProductController', // nested resource
    // 'customer.sales' => 'CustomerSaleController',
]);
