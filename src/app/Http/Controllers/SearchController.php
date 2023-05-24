<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function index()
  {
    $contacts = Contact::all();
    return view('search');
  }

  public function search(Request $request)
  {
    $contacts = Contact::Paginate(4)->FullnameSearch($request->fullname)->GenderSearch($request->gender)->DateSearch($request->date)->EmailSearch($request->email)->get();

    return redirect('/searches/search', compact('contact'))->with('message', '25文字以上の場合は...');
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches/search');
  } 
}
