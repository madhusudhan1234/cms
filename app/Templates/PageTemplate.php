<?php

namespace cms\Templates;

use Illuminate\View\View;

class PageTemplate extends AbstractTemplate
{
    protected $view = 'page';

    public function prepare(View $view, array $parameters)
    {
        // TODO: Implement prepare() method.
    }
}