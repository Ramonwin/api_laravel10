<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

use function Illuminate\Validation\Rules\message;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json([
            'data' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $customer = Customer::create([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'dob' => $request->dob,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => "Save Succees",
            'data' => $customer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'data' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->id_number = $request->id_number;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->save();

        return Response()->json([
            'message' => "Data Has Updated",
            'data' => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            "message" => "data has Deleted"
        ]);
    }
}
