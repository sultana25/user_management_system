<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    $fillable=['post_id',
               'is_active',
               'author',
               'email',
               'body'
              ];
    
    
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
