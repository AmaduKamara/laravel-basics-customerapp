<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {

        // Eloquent Model
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();

        return view('pages.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));

        // $activeCustomers = Customer::where('active', 1)->get();
        // $inactiveCustomers = Customer::where('active', 0)->get();
        // dd($inactiveCustomers);
        // $customers = Customer::orderBy('created_at', 'desc')->paginate(2); // This makes pagination works

        // return view('pages.customers', [
        //     'activeCustomers' => $activeCustomers,
        //     'inactiveCustomers' => $inactiveCustomers
        // ]);

    }

    // Function handling storing data to the database
    public function store()
    {
        // To save customer data to the database, Create an instance of the Customer Model
        // Data validation rules
        $data = request()->validate([
            'name' => 'required | min:5',
            'email' => 'required | email | min:6',
            'address' => 'required | min:6 ',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        // Mass Assignment / Storage
        Customer::create($data);
        return back();

        // dd($data);

        // $customer = new Customer();
        // $customer->name = Request('name');
        // $customer->email = Request('email');
        // $customer->address = Request('address');
        // $customer->active = Request('active');
        // $customer->save();
        // return back();

        // return redirect('/customers');
        // dd(request('name'));

    }
}
