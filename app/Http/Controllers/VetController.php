<?php

namespace App\Http\Controllers;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class VetController extends Controller
{
    //


    public function prueba ()
    {
        return 'Una prueba';

    }

    public function index() {
        $customers = Customer::paginate(15);
        return $customers;
    }

    public function show($id) {

        $customer = Customer::where('idCustomer', $id)->first();
        if (empty($customer)) {
            return 'El cliente no existe';
        }
        return $customer;

    }

    public function store(Request $request) {

        //validar datos  completos
        $this->validate($request, [
                'idCustomer' => 'required | integer',
                'name' => 'required | string',
                'adress' => 'required | string',
                'phone' => 'required | integer',
                'email' => 'required | string',
                'bank_account' => 'required | integer'
            ]);


        // crear cliente

        $customer = Customer::create([
            'idCustomer' => $request->get('idCustomer'),
            'name' => $request->get('name'),
            'adress' => $request->get('adress'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'bank_account' => $request->get('bank_account')
        ]);

        return $customer;

    }

    public function update(Request $request, $id) {

        //validar datos  completos
        $this->validate($request, [
                'idCustomer' => 'required | integer',
                'name' => 'required | string',
                'adress' => 'required | string',
                'phone' => 'required | integer',
                'email' => 'required | string',
                'bank_account' => 'required | integer'
            ]
        );

        // encontrar cliente
        $customer = Customer::where('idCustomer', $id)->first();

        if (empty($customer)) {
            return 'El cliente no existe';
        }

        // update cliente
        $customer->update([
                'idCustomer' => $request->input('idCustomer'),
                'name' => $request->input('name'),
                'adress' => $request->input('adress'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'bank_account' => $request->input('bank_account')
        ]);

        return $customer;

    }

    public function destroy($id) {

        $customer = Customer::where('idCustomer', $id)->first();
        if (empty($customer)) {
            return 'El cliente no existe';
        }

        $customer->delete();

        return 'Cliente borrado exitosamente';
    }








}
