<?php

namespace cms\Presenters;

use Lewis\Presenter\AbstractPresenter;

    class PagePresenter extends AbstractPresenter
    {
        public function prettyuri()
        {
            return '/'.ltrim($this->uri,'/');
        }
    }