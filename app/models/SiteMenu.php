<?php

class SiteMenu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=4, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="parent_id", type="integer", length=3, nullable=false)
     */
    public $parent_id;

    /**
     *
     * @var integer
     * @Column(column="order_id", type="integer", length=3, nullable=false)
     */
    public $order_id;

    /**
     *
     * @var string
     * @Column(column="caption", type="string", length=255, nullable=false)
     */
    public $caption;

    /**
     *
     * @var string
     * @Column(column="link", type="string", length=255, nullable=false)
     */
    public $link;

    /**
     *
     * @var string
     * @Column(column="controller", type="string", length=70, nullable=false)
     */
    public $controller;

    /**
     *
     * @var string
     * @Column(column="action", type="string", length=70, nullable=false)
     */
    public $action;

    /**
     *
     * @var string
     * @Column(column="icon", type="string", length=70, nullable=false)
     */
    public $icon;

    /**
     *
     * @var integer
     * @Column(column="visibility", type="integer", length=1, nullable=false)
     */
    public $visibility;


    public function initialize()
    {

        $this->setSource("site_menu");
    }


    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }


    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'site_menu';
    }

}
