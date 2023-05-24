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

    public function scopeSearch(Builder $query, array $params): Builder
    {
        if (!empty($param['keyword'])) {
        $query->where(function ($query) use ($params) {
            $query->where('fullname', 'like', '%', $params['keyword'] . '%');
           });
        }  
    
        if(!empty($params['gender'])) {
        $query->where('gender', $params['gender']);
        }

        if(!empty($params['date'])) {
        $query->where('date', $params['date']);
        }

        if(!empty($params['email'])) {
        $query->where('email', $params['email']);
        }

        return $query;
        
    }
 
}
