<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    
    use Sluggable;
    
    protected $fillable=[
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body',
        
    ];
    
     

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
   
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
