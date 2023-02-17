<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\contactRequest;

class ContactController extends Controller
{

public function __construct()
{
    $this->middleware('auth', ['except' =>['index','show']]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::all() ;


        return view('welcome' ,compact('contacts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.createnewcontact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contactRequest $request)
    {
        $request->validated();

        Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email_adress' => $request->email_adress,
            'user_id' => Auth::user()->id,

        ]);

        return redirect(route('contact.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.showcontact',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.updatecontact', compact('contact'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {

     $request->validate([

        'name' =>[
            'required',
             'min:6',
        ],

        'email_adress'   =>  [
            'required',
             Rule::unique('contacts')->ignore($contact),
        ],
        'contact'   =>  [
            'required',
            'numeric',
            'digits:9',
             Rule::unique('contacts')->ignore($contact),
        ]
    ]);

        $contact->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'email_adress' => $request->email_adress,
        ]);

        return redirect(route('contact.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')
        ->with('success','contact deleted succesfully');


    }
}
