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
    return view('thanks', compact('contact'));
  }

  public function show()
  {
    $contacts = Contact::all();
    return view('search');
  }

  public function search(Request $request)
  {
    $params = $request->query();
    $contacts = Contact::Paginate(4)->Search($request->fullname)->Search($request->gender)->Search($request->date)->Search($request->email)->get();

    return redirect('/searches',compact('contacts', 'params'))->with('message', '25文字以上の場合は...');
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches');
  } 
}
