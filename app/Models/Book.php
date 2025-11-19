<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author','year','stock','category_id','image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
