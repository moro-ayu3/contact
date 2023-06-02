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
    $contacts = Contact::all();
    return view('search', compact('contacts'));
  }

  public function search(Request $request)
  {
    
    $contacts = Contact::Paginate(4)->KeywordSearch($request->keyword)->ValueSearch($request->value)->DateSearch($request->date)->get();

    return redirect('/searches/serach', '/searches/2', '/searches/3', '/searches/4', compact('contacts'))->with('message', 'ご意見は25文字以上の場合は...');
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches/search', '/searches/2', '/searches/3', '/searches/4');
  } 
}

