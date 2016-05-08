<?php

namespace cms;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title','name','uri','content','template'];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ?: null;
    }
    public function setTemplateAttribute($value)
    {
        $this->attributes['template'] = $value ?: null;
    }
}
