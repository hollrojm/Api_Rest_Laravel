<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'cover',
    ];
    public $timestamps = false;
    //one to many
    public function author(){
        return $this->hasMany(Author::class);
    }
}
