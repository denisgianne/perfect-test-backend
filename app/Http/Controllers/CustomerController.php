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
        $customers = Customer::paginate(15);
        return view('customers.index', compact('customers'));
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
        $request->validate([
            'name'  => ['required', 'string', 'min:2'],
            'email' => ['required', 'unique:customers'],
            'cpf'   => ['required', 'unique:customers', 'min:11']
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // não adiciona sem email
        }
        $customer = Customer::create([
            'name'  => $request->name,
            'email' => $request->email,
            'cpf'   => $request->cpf,
        ]);

        // dd($customer);
        return redirect()->route('customers.show', $customer);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->cpf = preg_replace('/[^\d]/', '', $request->cpf);

        $request->validate([
            'name'  => ['required', 'string', 'min:2'],
            'email' => ['required', 'unique:customers'],
            'cpf'   => ['required', 'min:11']
        ]);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // não adiciona sem email
        }
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ]);

        // dd($customer);
        return redirect()->route('customers.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Customer $customer)
    public function destroy(Customer $customer)
    {
        foreach ($customer->sales as $sale) {
            $sale->delete();
        };
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
