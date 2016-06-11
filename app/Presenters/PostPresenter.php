<?php

namespace cms\Presenters;

use Lewis\Presenter\AbstractPresenter;
use League\CommonMark\CommonMarkConverter;

class PostPresenter extends AbstractPresenter
{

    /**
     * PostPresenter constructor.
     * @param object $object
     * @param CommonMarkConverter $markdown
     */
    public function __construct($object, CommonMarkConverter $markdown)
    {
        $this->markdown = $markdown;

        parent::__construct($object);
    }

    /**
     * @return null
     */
    public function excerptHtml()
    {
        return $this->excerpt ? $this->markdown->convertToHtml($this->excerpt) : null;
    }

    /**
     * @return null
     */
    public function bodyHtml()
    {
        return $this->body ? $this->markdown->convertToHtml($this->body) : null;
    }

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