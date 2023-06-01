<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;


class SearchController extends Controller
{

  public function show(Request $request)
  {
    $searches = Search::with('contact')->get();
    
    return view('search',compact('searches'));
  }

  public function search(Request $request)
  {
    $contact_data = Search::with('contact');

    if (!empty($keyword)) {
    $contact_data->where('fullname', 'like', '%' . $keyword . '%');
    }

    if (!empty($keyword)) {
    $contact_data->where('email', 'like', '%' . $keyword . '%');
    }
    
    if(!empty($value)){
    $contact_data->where('gender', $value);
    }

    if(!empty($date)){
    $contact_date->where('created_at', $date);
    }

    $search = $request->only(['fullname', 'gender','email', 'option'])->$contact_data->get();
  
    $searches = Search::Paginate(10);

    return redirect('/searches', compact('searches', 'search'));
  }

  public function delete(Request $request)
  {
    Search::find($request->id)->delete();

    return redirect('/searches');
  } 
}
 

