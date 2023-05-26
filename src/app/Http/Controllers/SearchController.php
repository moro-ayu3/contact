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
    return view('search', ['form_data' => $this->form_data],);
  }

  public function search(Request $request)
  {
    $query = self::query();

    if (!empty($keyword)) {
    $query->where('fullname', 'like', '%' . $keyword . '%');
    }

    if (!empty($keyword)) {
    $query->where('email', 'like', '%' . $keyword . '%');
    }

    $result = $query->get();

    $radio_array = [];
    foreach ($request->input('radio') as $value){
      $radio_array[] = $value;
    }

    $contact_data = Search::table('searches');

    if(in_array('gender', $radio_array)){
      $contact_data->where('gender', $value);
    }

    $result = $contact_data->get();

    $search = $request->only(['fullname', 'gender','email', 'created_at']);

    $date = Search::table('searches');
    $date = Carbon::createFromFormat('Y-m-d H:i:s', $search->created_at)->format('Y-m-d');


    $searches = Search::Paginate(4);

    return view('/searches', ['search_data' => $result,], compact('searches'));
  }

  public function delete(Request $request)
  {
    Search::find($request->id)->delete();

    return redirect('/searches');
  } 
}
 

