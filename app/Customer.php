<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = [
		'hotkey',
		'subhotkey',
		'name',	
		'dob',
		'profession',
		'location',
		'phone',
		'points'
	];
}
