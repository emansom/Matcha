<?php

class Rooms extends \Phalcon\Mvc\Model
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
     * @Column(column="owner_id", type="integer", nullable=false)
     */
    public $owner_id;

    /**
     *
     * @var integer
     * @Column(column="category", type="integer", nullable=false)
     */
    public $category;

    /**
     *
     * @var string
     * @Column(column="name", type="string", nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="model", type="string", nullable=false)
     */
    public $model;

    /**
     *
     * @var string
     * @Column(column="ccts", type="string", nullable=true)
     */
    public $ccts;

    /**
     *
     * @var integer
     * @Column(column="wallpaper", type="integer", nullable=false)
     */
    public $wallpaper;

    /**
     *
     * @var integer
     * @Column(column="floor", type="integer", nullable=false)
     */
    public $floor;

    /**
     *
     * @var integer
     * @Column(column="showname", type="integer", nullable=false)
     */
    public $showname;

    /**
     *
     * @var integer
     * @Column(column="superusers", type="integer", nullable=false)
     */
    public $superusers;

    /**
     *
     * @var integer
     * @Column(column="accesstype", type="integer", nullable=false)
     */
    public $accesstype;

    /**
     *
     * @var string
     * @Column(column="password", type="string", nullable=false)
     */
    public $password;

    /**
     *
     * @var integer
     * @Column(column="visitors_now", type="integer", nullable=false)
     */
    public $visitors_now;

    /**
     *
     * @var integer
     * @Column(column="visitors_max", type="integer", nullable=false)
     */
    public $visitors_max;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("rooms");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rooms[]|Rooms|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rooms|\Phalcon\Mvc\Model\ResultInterface
     */
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
