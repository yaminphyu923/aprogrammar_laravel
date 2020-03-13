<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Receipe;
class Category extends Model
{
    protected $table = "Category";

    public function receipe()
    {
        return $this->hasMany(Receipe::class);
    }
}
