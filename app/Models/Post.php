<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;


  protected $table = 'posts';
protected $primaryKey = 'id';
public $incrementing = true;
public $timestamps = true;

protected $fillable = [
      'title', 'description', 'price', 'contact', 'user_id'
];

//eloquent relationship -- because 1:many, many:1 relationship between user and created posts
 public function user()
    {
        return $this->belongsTo(User::class);
    }

}
