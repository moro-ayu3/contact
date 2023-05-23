<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(ContactRequest $request)
  {
    $contacts = Contact::all();
    $contact = $request->only(['fullname', 'gender','email', 'postcode', 'address', 'option']);
    return view('index', compact('contact'));
  }

   public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['fullname', 'gender','email', 'postcode', 'address', 'option']);
    Contact::find($request->id)->confirm($contact);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'option']);
    Contact::create($contact);
    return view('thanks', compact('contacts'));
  }

  public function search(Request $request)
  {
    $contacts = Contact::Paginate(4)->FullnameSearch($request->fullname)->GenderSearch($request->gender)->DateSearch($request->date)->EmailSearch($request->email)->get();

    return view('search', compact('contacts'))->with('message', '25文字以上の場合は...');;
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/contacts/search');
  }
}
