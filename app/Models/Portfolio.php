<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['title','project_url','image','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
