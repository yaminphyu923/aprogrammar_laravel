<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\ReceipeStored;
use App\Category;

class Receipe extends Model
{
	protected $table = 'receipes';
	protected $fillable =['name','ingredients','category','author_id'];

	protected static function boot()
	{
		parent::boot();
		static::created(function($receipe){
		session()->flash("message",'Recipe has created successfully!');
        \Mail::to('yaminphyu1237@gmail.com')->send(new ReceipeStored($receipe));
		});
	}

	public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }
}
