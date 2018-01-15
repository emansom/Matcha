<?php

class Rooms extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="owner_id", type="string", length=11, nullable=false)
     */
    public $owner_id;

    /**
     *
     * @var integer
     * @Column(column="category", type="integer", length=11, nullable=true)
     */
    public $category;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="description", type="string", length=255, nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="model", type="string", length=255, nullable=false)
     */
    public $model;

    /**
     *
     * @var string
     * @Column(column="ccts", type="string", length=255, nullable=true)
     */
    public $ccts;

    /**
     *
     * @var integer
     * @Column(column="wallpaper", type="integer", length=4, nullable=true)
     */
    public $wallpaper;

    /**
     *
     * @var integer
     * @Column(column="floor", type="integer", length=4, nullable=true)
     */
    public $floor;

    /**
     *
     * @var integer
     * @Column(column="showname", type="integer", length=1, nullable=true)
     */
    public $showname;

    /**
     *
     * @var integer
     * @Column(column="superusers", type="integer", length=1, nullable=true)
     */
    public $superusers;

    /**
     *
     * @var integer
     * @Column(column="accesstype", type="integer", length=3, nullable=true)
     */
    public $accesstype;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=255, nullable=true)
     */
    public $password;

    /**
     *
     * @var integer
     * @Column(column="visitors_now", type="integer", length=11, nullable=true)
     */
    public $visitors_now;

    /**
     *
     * @var integer
     * @Column(column="visitors_max", type="integer", length=11, nullable=true)
     */
    public $visitors_max;


    public function initialize()
    {
        $this->setSource("rooms");
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
        return 'rooms';
    }

}
