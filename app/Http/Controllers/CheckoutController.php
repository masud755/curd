<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Checker;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::with(['state', 'country'])->paginate(15);

        return view('checkout.index', ['checkouts' => $checkouts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $states    = State::all();

        return view('checkout.create', ['countries' => $countries, 'states' =>
            $states]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:checkouts,username|max:255',
            'email' => 'required|email|unique:checkouts,email|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'zip' => 'required',
        ]);

        Checkout::create($request->except('_token'));

        return redirect()->back()->with('message', 'Data store successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        return view('checkout.show', ['checkout' => $checkout]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        $countries = Country::all();
        $states    = State::all();

        return view('checkout.edit', ['checkout' => $checkout, 'countries' =>
            $countries, 'states' =>
            $states]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        $validated = $request->validate([
            'username' => 'required|unique:checkouts,username,' . $checkout
                ->id . ',id|max:255',
            'email' => 'required|email|unique:checkouts,email,' . $checkout
                ->id . ',id|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'zip' => 'required',
        ]);
        $checkout->update($validated);

        return redirect()->route('checkout.index')->with('message',
            'Data updated successful');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        $checkout->delete();

        return redirect()->back()->with('message', 'Data deleted successful');

    }
}
