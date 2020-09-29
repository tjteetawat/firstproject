<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $fillable=[

        'id',
        'name',
        'teacher_name',
        'created_at',
        'updated_at',
    ];

    public static $rules=[

        'name'          =>  'required',
        'teacher_name'  =>  'required',
    ];
}
