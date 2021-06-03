<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Expense extends Model
{
  protected $fillable = ['user_id','category_id','name','date','amount'];

	 public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
