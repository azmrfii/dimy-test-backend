<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Customeradress;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;

class CustomeradressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = Customeradress::all();

        return response()->json([
            "success" => true,
            "message" => "Customer Address List.",
            "data" => $address
        ]);
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
    public function store(AddressRequest $request, $id)
    {
        // $address = Customeradress::create($request->validated());

        $customer = Customer::find($id);

        $address = new Customeradress();
        $address->customer_id = $customer->id;
        $address->address = Carbon::now();

        return response()->json([
            "success" => true,
            "message" => "Customer Address created successfully.",
            "data" => $address
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customeradress $address)
    {
        $addresses = Customeradress::find($address);

        return response()->json([
            "success" => true,
            "message" => "Customer Address Show by Id.",
            "data" => $addresses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Customeradress $address)
    {
        $address->update($request->validated());

        return response()->json([
            "success" => true,
            "message" => "Customer Address updated successfully.",
            "data" => $address
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customeradress $address)
    {
        $address->delete();

        return response()->json([
            "success" => true,
            "message" => "Customer Address deleted successfully.",
            "data" => $address
        ]);
    }
}
