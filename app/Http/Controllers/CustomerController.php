<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['customers'] = Customer::paginate(15);
        return view('customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->cpf = preg_replace('/[^\d]/', '', $request->cpf);
        $validate = $request->validate([
            'name'  => ['required', 'string', 'min:2'],
            'email' => ['required', 'unique:customers'],
            'cpf'   => ['required', 'min:11']
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // não adiciona sem email
        }
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ]);

        dd($customer);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     */
    public function show(Customer $customer)
    {
        return view('customers.show', $customer);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
