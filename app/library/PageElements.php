<?php
namespace Kepler;

use \Phalcon\Tag as Tag;
use \Phalcon\Mvc\User\Component as Component;
use \SiteMenu as SiteMenu;

class PageElements extends Component
{
    // TODO: refactor the shit out of this function
    public function getMainMenu()
    {
        // TODO: cache whole generated menu instead of the ORM object
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        $cacheKey = 'mainmenu-' . $controllerName;

        // Differentiate cache if logged in
        if ($this->session->has('user_id')) {
            $cacheKey .= '-' . $this->session->get('user_id');
        }

        $menu = \SiteMenu::find([
            'parent_id = 0',
            'order' => 'order_id ASC',
            'cache' => [
                'key' => $cacheKey,
                'lifetime' => 300 // five minutes
            ]
        ]);

        $menuItems = [];

        $i = 1;
        $size = $menu->count();
        foreach($menu as $item) {
            $buf = '<li';

            if ($item->controller == $controllerName)
            {
                $buf .= ' id="active">';
            } else if ($size == $i) {
                $buf .= ' class="last">';
            } else {
                $buf .= '>';
            }

            $buf .= '<span class="left"></span>';

            $buf .= Tag::linkTo(
                [
                    $item->link,
                    Tag::image('/c_images/navi_icons/' . $item->icon) .  $item->caption
                ]
            );

            $buf .= '<span class="right"></span>';
            $buf .= '</li>';

            array_push($menuItems, $buf);

            $i++;
        }

        $buildUp = '<div id="mainmenu">
            <ul>
                <li id="leftspacer">&nbsp;</li>
        ';

        foreach ($menuItems as $buf) {
            $buildUp .= $buf;
        }

        $buildUp .= '</ul></div>';

        return $buildUp;
    }

    public function getSubMenu()
    {
        // TODO: cache whole generated menu instead of the ORM object
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        $cacheKey = 'submenu-' . $controllerName;

        // Differentiate cache if logged in
        if ($this->session->has('user_id')) {
            $cacheKey .= '-' . $this->session->get('user_id');
        }

        $parent = \SiteMenu::findFirst([
            'parent_id = 0 AND controller = ?0',
            'bind' => [
                0 => $controllerName
            ]
        ]);

        $menus = \SiteMenu::find([
            'conditions' => 'parent_id = ?1',
            'bind' => [
                1 => $parent->id
            ],
            'order' => 'order_id ASC',
            'cache' => [
                'key' => $cacheKey,
                'lifetime' => 300 // five minutes
            ]
        ]);

        $subMenu = [];
        $i = 1;
        $size = $menus->count();

        foreach($menus as $sub) {
            if ($sub->controller == $controllerName && $sub->action == $actionName) {
                $buf = $sub->caption;
            } else {
                $buf = Tag::linkTo([$sub->link, $sub->caption]);
            }

            if ($i != $size) {
                $buf .= "&nbsp;|&nbsp;";
            }

            array_push($subMenu, $buf);
            $i++;
        }

        $buildUp = '<div id="submenu">
            <div class="subnav">
        ';

        foreach ($subMenu as $buf) {
            $buildUp .= $buf;
        }

        $buildUp .= '</div></div>';

        return $buildUp;
    }

    public function getTopElements()
    {
        return join('', [$this->_getHabboLogo(), $this->_getEnterHotelButton()]);
    }

    private function _getHabboLogo()
    {
        return '<img src="/web-gallery/images/logos/pedobear_small.png" alt="" border="0" style="margin-top: 100px; margin-left: 190px; position: absolute;"/>
        <div id="habbologo">
            ' . Tag::linkTo('/') . '
        </div>';
    }

    private function _getEnterHotelButton()
    {
        // If emulator is offline, respond with hotel closed
        if (!$this->rcon->ping()) {
            return '<div id="hotel-closed"></div>';
        } else {
            // TODO: if SSO is enabled, change link to /login
            return '<div id="enter-hotel">
                ' . Tag::linkTo(['/client', '', 'target' => 'client', 'id' => 'enter-hotel-link', 'onclick' => 'openOrFocusHabbo(this); return false;']) . '
            </div>';
        }
    }

    public function getPromoArea()
    {

    }

    public function getNewsBox()
    {

    }

    public function getEventsBox()
    {

    }

    public function getTopFiveBattleBall()
    {

    }

    public function getTopFiveSnowStorm()
    {

    }

    public function getTopFiveWobbleSquabble()
    {

    }

    public function getInfobusInformation()
    {

    }

    public function getLastChangedHomepages()
    {

    }

    public function getFooterText()
    {
        return $this->config->application->footerText;
    }
}