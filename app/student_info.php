<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_info extends Model
{
    public $fillable = [
     	'name',
     	'email'
     ];
}
