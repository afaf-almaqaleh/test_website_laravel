<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\User;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','body','user_id'];
    protected $dates = ['deleted_at'];

 public function user(){

   // return this->belongsTo('App\User','user_id');
    return $this->belongsTo(User::class, 'user_id');
 }
}
