<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['book_id','quantity','total_price'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
