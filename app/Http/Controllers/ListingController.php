<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    // all listing 
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // single listing 
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form 
    public function create () {
        return view('listings.create');
    }


    // store listing data
    public function store (Request $request) {

        // dd(auth()->id());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }



    // ----------------------------------------------show edit form----------------------------------------------------------
    public function edit (Listing $listing) {
        // dd($listing->title);
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }


    // --------------------------------------------update listing data-------------------------------------------------------
    public function update (Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // $formFields['user_id'] = auth()->id();

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }




    // -------------------------------------------------DELETE LISTING------------------------------------------------------------ 
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!!!');
    }
}
