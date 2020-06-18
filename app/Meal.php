<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';
	protected $fillable = [
        'id','name', 'recept', 'carbohydrates ', 'fats', 'protein', 'calories'
    ];

	public function menus(){
		return $this->hasMany('App\Menu');
	}
}
