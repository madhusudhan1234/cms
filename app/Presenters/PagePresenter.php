<?php

namespace cms\Presenters;

use Lewis\Presenter\AbstractPresenter;

    class PagePresenter extends AbstractPresenter
    {
        /**
         * @return string
         */
        public function prettyUri()
        {
            return '/'.ltrim($this->uri,'/');
        }

        /**
         * Return link and the string
         *
         * @param $link
         * @return string
         */
        public function linkToPaddedTitle($link)
        {
            $padding = str_repeat('&nbsp;',$this->depth * 4);

            return $padding.link_to($link,$this->title); 
        }

        /**
         * Return to the Padded title
         *
         * @return string
         */
        public function paddedTitle()
        {
            return str_repeat('&nbsp;',$this->depth * 4).$this->title;
        }
    }