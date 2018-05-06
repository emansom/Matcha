<?php
namespace Kepler;

use \Phalcon\Tag as Tag;
use \Phalcon\Mvc\User\Component as Component;

class PageElements extends Component
{
    // TODO: refactor the shit out of this function
    public function getMainMenu()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();

        $menu = \SiteMenu::find([
            'parent_id = 0',
            'order' => 'order_id ASC'
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
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();

        $menus = \SiteMenu::find([
            'conditions' => 'parent_id != 0 AND controller = ?1',
            'bind' => [
                1 => $controllerName
            ],
            'order' => 'order_id ASC'
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
        return '<div id="enter-hotel">
            ' . Tag::linkTo(['/client', '', 'target' => 'client', 'id' => 'enter-hotel-link']) . '
        </div>';
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
}