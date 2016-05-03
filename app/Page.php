<?php

namespace cms;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title','name','uri','content'];
}
