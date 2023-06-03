<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
         'last_name',
         'first_name',
         'gender',
         'email',
         'postcode',
         'address',
         'building_name',
         'option',
     ];

    public function doSearch($keyword, $value, $date)
    {
       $query = self::query();

       if (!empty($keyword)) {
       $query->where('last_name', 'like', '%' . $keyword . '%');
       }

       if (!empty($keyword)) {
       $query->where('first_name', 'like', '%' . $keyword . '%');
       }

       if (!empty($keyword)) {
       $query->where('email', 'like', '%' . $keyword . '%');
       }

       if(!empty($value)){
       $query->where('gender', $value);
       }

       if(!empty($date)){
       $query->where('created_at', $date);
       }

       $results = $query->get();
       return $results;
    }
}

