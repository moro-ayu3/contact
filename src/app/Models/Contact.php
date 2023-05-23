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
         'adress',
         'option',
     ];

    public function scopeFullnameSearch($query, $fullname)
    {
       if (!empty($fullname)) {
       $query->where('fullname', $fullname);
       }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if(!empty($gender)) {
        $query->where('gender', $gender);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if(!empty($date)) {
        $query->where('date', $date);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if(!empty($email)) {
        $query->where('$email', $email);
        }
    }
}
