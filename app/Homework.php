<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    public $fillable=[

        'subject',
        'title',
        'submit_date',
        'status',
        'order_date',
        'details',

    ];

    public static $rules=[

        'subject'       =>  'required',
        'title'         =>  'required',
        'submit_date'   =>  'required',
        'order_date'    =>  'required',
        'status'        =>  'required',

    ];

}
