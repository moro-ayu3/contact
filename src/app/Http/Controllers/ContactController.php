<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
   public function index(ContactRequest $request)
   {
      $contact = $request->only(['fullname', 'gender','email', 'postcode', 'address', 'building_name', 'option']);

      return view('index', compact('contact'));
   }

   public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['fullname', 'gender','email', 'postcode', 'address', 'building_name', 'option']);
    
    return view('confirm', compact('contact'));
  }

    public function store(ContactRequest $request)
  {
    $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'option']);
    Contact::create($contact);
    return view('thanks');
  } 
}
