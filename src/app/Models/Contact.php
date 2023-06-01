<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
         'fullname',
         'gender',
         'email',
         'postcode',
         'address',
         'building_name',
         'option',
     ];

    public function search()
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
    }
}
