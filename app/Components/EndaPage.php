<?php

namespace App\Components;

use Illuminate\Contracts\Pagination\Presenter;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\BootstrapThreePresenter;

class EndaPage extends BootstrapThreePresenter implements Presenter
{
    public $paginator;

    public function __construct(PaginatorContract $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Determine if the underlying paginator being presented has pages to show.
     *
     * @return bool
     */
    public function hasPages()
    {
        return $this->paginator->hasPages() && count($this->paginator->items()) > 0;
    }

    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return string
     */
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pager">%s %s</ul>',
                $this->getPreviousButton('<span aria-hidden="true">&larr;</span>上一頁'),
                $this->getNextButton('下一頁<span aria-hidden="true">&rarr;</span>')
            );
        }

        return '';
    }

    /**
     * 取得上一頁按鈕
     *
     * @param  string  $text
     * @return string
     */
    public function getPreviousButton($text = '&laquo;')
    {
        if ($this->paginator->currentPage() <= 1) {
            return $this->getPreviousDisabledTextWrapper($text);
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPreviousPageWrapper($url, $text, 'prev');
    }


    /**
     * 取得上一頁li
     * @param $url
     * @param $page
     * @param null $rel
     * @return string
     */
    protected function getPreviousPageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li class="previous"><a href="'.htmlentities($url).'"'.$rel.'>'.$page.'</a></li>';
    }

    /**
     * 取得下一頁按鈕
     *
     * @param  string  $text
     * @return string
     */
    public function getNextButton($text = '&raquo;')
    {
        if (! $this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getNextPageWrapper($url, $text, 'next');
    }

    /**
     * 取得下一頁li
     * @param $url
     * @param $page
     * @param null $rel
     * @return string
     */
    protected function getNextPageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li class="next"><a href="'.htmlentities($url).'"'.$rel.'>'.$page.'</a></li>';
    }


    /**
     * 取得上一頁選擇狀態下的li
     *
     * @param  string  $text
     * @return string
     */
    protected function getPreviousDisabledTextWrapper($text)
    {
        return '<li class="previous disabled"><span>'.$text.'</span></li>';
    }

    /**
     * 取得下一頁選擇狀態下的li
     *
     * @param  string  $text
     * @return string
     */
    protected function getNextDisabledTextWrapper($text)
    {
        return '<li class="next disabled"><span>'.$text.'</span></li>';
    }
}
