<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    public $rules = [
        'role_id' => 'required|numeric|unique:App\Models\Person,role_id',
        'email' => 'required|email',
        'password' => 'required|min:4',
        'mobile_number' => 'required|numeric|digits:10',
        'gender' => 'required',
        'birth_date' => 'required',
        'address' => 'required',
        'city' => 'required',
        'pincode' => 'required|min:6|max:6',
        'file' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('pages.datatables');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.add_person');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        if ($request->file()) {
            $request->file('file')->storeAs('pictures', $request->file->getClientOriginalName(), 'public');
        }

        Person::create([
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'picture' => $request->file->getClientOriginalName(),
        ]);
        return redirect()->route('pages.datatables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('forms.edit_person', ['person' => $person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $this->rules['role_id'] = 'required';
        if ($request->file()) {
            $request->validate($this->rules);
            Storage::delete('public/pictures/'.$person->picture);
            $request->file('file')->storeAs('pictures', $request->file->getClientOriginalName(), 'public');
            $person->update([
                'role_id' => $request->role_id,
                'email' => $request->email,
                'password' => $request->password,
                'mobile_number' => $request->mobile_number,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'picture' => $request->file->getClientOriginalName(),
            ]);
        } else {
            $this->rules['file'] = '';
            $request->validate($this->rules);
            $person->update([
                'role_id' => $request->role_id,
                'email' => $request->email,
                'password' => $request->password,
                'mobile_number' => $request->mobile_number,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
            ]);
        }
        return redirect()->route('pages.datatables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        Storage::delete('public/pictures/'.$person->picture);
        return redirect()->route('pages.datatables');
    }
}
