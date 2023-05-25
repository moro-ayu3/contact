<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
   public $form_data = [
      ['性別', 'radio[gender]', 'gender'],
   ];


  public function show()
  {
    return view('search', ['form_data' => $this->form_data]);
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

    $contact_data = DB::table('contacts');

    if(in_array('gender', $radio_array)){
      $contact_data->where('gender', $gender);
    }

    $result = $contact_data->get();

    $contacts = Contact::Paginate(4);

    return view('/searches/serach', ['search_data' => $result,], compact('contacts'));
  }

  public function delete(Request $request)
  {
    Contact::find($request->id)->delete();

    return redirect('/searches');
  } 
}
 

