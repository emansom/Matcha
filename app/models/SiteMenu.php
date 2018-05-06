<?php

class SiteMenu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="parent_id", type="integer", nullable=false)
     */
    public $parent_id;

    /**
     *
     * @var integer
     * @Column(column="order_id", type="integer", nullable=false)
     */
    public $order_id;

    /**
     *
     * @var string
     * @Column(column="caption", type="string", nullable=false)
     */
    public $caption;

    /**
     *
     * @var string
     * @Column(column="link", type="string", nullable=false)
     */
    public $link;

    /**
     *
     * @var string
     * @Column(column="controller", type="string", nullable=false)
     */
    public $controller;

    /**
     *
     * @var string
     * @Column(column="action", type="string", nullable=false)
     */
    public $action;

    /**
     *
     * @var string
     * @Column(column="icon", type="string", nullable=false)
     */
    public $icon;

    /**
     *
     * @var integer
     * @Column(column="visibility", type="integer", nullable=false)
     */
    public $visibility;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("site_menu");
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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SiteMenu[]|SiteMenu|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SiteMenu|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
