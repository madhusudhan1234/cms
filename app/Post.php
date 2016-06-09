<?php

namespace cms;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fillable Fields
     *
     * @var array
     */
    protected $fillable = ['auther_id','title','slug','body','excerpt','published_at'];

    /**
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * return null if there is no value 
     * 
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
