<?php

namespace cms\Templates;

use Illuminate\View\View;

class PageTemplate extends AbstractTemplate
{
    /**
     * @var string
     */
    protected $view = 'page';

    /**
     * @param View $view
     * @param array $parameters
     */
    public function prepare(View $view, array $parameters)
    {
        // TODO: Implement prepare() method.
    }
}