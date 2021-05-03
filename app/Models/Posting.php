<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;
  
  
  protected $table = 'postings';
protected $primaryKey = 'id';
public $incrementing = true;
public $timestamps = true;
protected $fillable = [
      'title', 'description', 'price', 'contact'
];
  
  
}
