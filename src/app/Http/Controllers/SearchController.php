<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Search;


class SearchController extends Controller
{
   public $form_data = [
      ['お名前', 'text[fullname]', 'fullname'],
      ['性別', 'radio[gender]', 'gender'],
      ['日付', 'date[date]', 'date'],
      ['メールアドレス', 'email[email]', 'email'],
   ];


  public function show(Request $request)
  {
    $searches = Search::with('contact')->get();
    return view('search', ['form_data' => $this->form_data],compact('searches'));
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

    $result = $contact_data->get();

    $search = $request->only(['fullname', 'gender','email', 'option']);

    $date = Search::with('contact');
    
    $searches = Search::Paginate(4);


    return redirect('/searches', ['search_data' => $result,], compact('searches', 'search'));
  }

  public function delete(Request $request)
  {
    Search::find($request->id)->delete();

    return redirect('/searches');
  } 
}
 

