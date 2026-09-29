<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers= Customer::all();

        return view('pelanggan.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

        $logo = $request->file('logo');
        $logoName = time() . '_' . $logo->getClientOriginalName();
        $logo->storeAs('customers', $logoName, 'public');

    Customer::create([
        'name' => $request->name,
        'logo' => $logoName,
        'is_active' => $request->has('is_active'),
    ]);

    return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer= Customer::findOrFail($id);

        return view('pelanggan.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

        $customer->name = $request->name;
        $customer->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
             $logo = $request->file('logo');
             $logoName = time() . '_' . $logo->getClientOriginalName();
             $logo->storeAs('customers', $logoName, 'public');
             $customer->logo = $logoName;
    }

        $customer->save();

        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer= customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('pelanggan.index');
    }
}
