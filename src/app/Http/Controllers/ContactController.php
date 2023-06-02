<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
   public function index()
   {
      return view('index');
   }

   public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'option']);
    
    return view('confirm', compact('contact'));
  }

    public function store(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'option']);
    Contact::create($contact);
    return view('thanks');
  } 

  public function show()
  {
    $contacts = [];
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'option']);
    return view('search', compact('contacts','contact'));
  }

  public function search(Request $request)
  {
    
    $contacts = Contact::Paginate(4)->KeywordSearch($request->keyword)->ValueSearch($request->value)->DateSearch($request->date)->get();

    return redirect('/searches', compact('contacts'));
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches');
  } 
}

