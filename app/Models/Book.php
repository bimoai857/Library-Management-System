<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function issue(){
        return $this->hasMany(Issue::class,'type_id','id');
        
    }
    public function book_detail(){
        return $this->hasMany(Book_detail::class,'id','id');
    }
}
