<?php

namespace cms\View\Composers;

use cms\Page;
use Illuminate\View\View;

class InjectPages
{
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }

    public function compose(View $view)
    {
        $pages = $this->pages->where('hidden', false)->get()->toHierarchy();

        $view->with('pages', $pages);
    }
}
