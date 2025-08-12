<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class Book extends Model
{ 
    use HasFactory; 
    protected $guarded=[];
    public function author(){ 
        return $this->belongsTo(Author::class); 
    }
    public function category(){ 
        return $this->belongsTo(Category::class); 
    }
    public function ratings(){ 
        return $this->hasMany(Rating::class); 
    }
}
