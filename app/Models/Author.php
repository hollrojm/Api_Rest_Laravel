<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'book_id',
    ];
    public $timestamps = false;
    //one to one
   /*  public function books(){
        return $this->belongsTo(Books::class);
    }
 */
}
