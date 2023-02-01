<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Navi;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     * 
     *
     * @var array
     */
    protected static $views = [
        'partials.navigation',
        'partials.footer-menu',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'navigation' => $this->navigation(),
            'navigationFooter' => $this->navigationFooter(),
        ];
    }



    // Primary menu


    /**
     * Returns the primary navigation.
     *
     * @return array
     */
    public function navigation(string $menuName = 'primary_navigation')
    {
        $navigation = (new Navi())->build($menuName);

        if ($navigation->isEmpty()) {
            return;
        }
        return $navigation->toArray();

    }

    // Footer menu


    /**
     * Returns the primary navigation.
     *
     * @return array
     */
    public function navigationFooter(string $menuName = 'footer_navigation_left')
    {
        $navigationFooter = (new Navi())->build($menuName);

        if ($navigationFooter->isEmpty()) {
            return;
        }
        return $navigationFooter->toArray();

    }
}














