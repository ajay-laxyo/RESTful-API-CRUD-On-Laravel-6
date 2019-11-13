<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Model
{
	use HasApiTokens, Notifiable;
	
    protected $table = 'students';

    protected $fillable = ['fname','lname','course','section'];
}
