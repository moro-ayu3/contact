<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    return view('search');
    return view('link2');
    return view('link3');
    return view('link4');
  }

  public function search(Request $request)
  {
    $contacts =Contact::all();
    $contacts = Contact::simplePaginate(10)->KeywordSearch($request->keyword)->ValueSearch($request->value)->DateSearch($request->date)->get();

    return redirect('/searches', compact('contacts'))->with('message', 'ご意見は25文字以上の場合は...');
    return redirect('/searches/2', compact('contacts'))->with('message', 'ご意見は25文字以上の場合は...');
    return redirect('/searches/3', compact('contacts'))->with('message', 'ご意見は25文字以上の場合は...');
    return redirect('/searches/4', compact('contacts'))->with('message', 'ご意見は25文字以上の場合は...');
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches');
    return redirect('/searches/2');
    return redirect('/searches/3');
    return redirect('/searches/4');
  } 
}

