<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function book(){
        return $this->belongsTo(Book::class,'type_id','id');
        
    }
}
