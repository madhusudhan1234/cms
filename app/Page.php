<?php

namespace cms;

use Baum\Node;

class Page extends Node
{
    /**
     * @var array
     */
    protected $fillable = ['title','name','uri','content','template'];
    
    /**
     * @param $value
     */
    public function updateOrder($order,$orderPage)
    {
        $orderPage = $this->findOrFail($orderPage);

        if($order == 'before'){
            $this->moveToLeftOf($orderPage);
        }elseif ($order == 'after'){
            $this->moveToRightOf($orderPage);
        }elseif ($order == 'childof'){
            $this->makeChildOf($orderPage);
        }
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ?: null;
    }

    /**
     * @param $value
     */
    public function setTemplateAttribute($value)
    {
        $this->attributes['template'] = $value ?: null;
    }
}
