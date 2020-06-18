<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $fillable = [
        'id','user_id', 'meal_id', 'date'
    ];
    public function meal(){
		return $this->belongsTo('App\Meal');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
}
