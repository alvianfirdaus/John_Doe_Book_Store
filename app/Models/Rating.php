<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class Rating extends Model
{ 
    use HasFactory; 
    protected $guarded=[];
    public function book(){ 
        return $this->belongsTo(Book::class); 
    }
}