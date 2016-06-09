<?php

namespace cms\Presenters;

use Lewis\Presenter\AbstractPresenter;

class PostPresenter extends AbstractPresenter
{
    /**
     * @return string
     */
    public function publishedDate()
    {
        if($this->published_at){
            return $this->published_at->toFormattedDateString();
        }
        return 'Not Published';
    }

    /**
     * @return string
     */
    public function publishedHeighlight()
    {
        if($this->published_at && $this->published_at->isFuture())
        {
            return 'info';
        }
        elseif (! $this->published_at)
        {
            return 'warning';
        }
    }
}