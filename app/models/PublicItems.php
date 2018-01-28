<?php

class PublicItems extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="id", type="string", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="room_model", type="string", length=255, nullable=false)
     */
    public $room_model;

    /**
     *
     * @var string
     * @Column(column="sprite", type="string", length=255, nullable=true)
     */
    public $sprite;

    /**
     *
     * @var integer
     * @Column(column="x", type="integer", length=11, nullable=false)
     */
    public $x;

    /**
     *
     * @var integer
     * @Column(column="y", type="integer", length=11, nullable=false)
     */
    public $y;

    /**
     *
     * @var string
     * @Column(column="z", type="string", nullable=false)
     */
    public $z;

    /**
     *
     * @var integer
     * @Column(column="rotation", type="integer", length=11, nullable=false)
     */
    public $rotation;

    /**
     *
     * @var string
     * @Column(column="top_height", type="string", nullable=false)
     */
    public $top_height;

    /**
     *
     * @var integer
     * @Column(column="length", type="integer", length=11, nullable=false)
     */
    public $length;

    /**
     *
     * @var integer
     * @Column(column="width", type="integer", length=11, nullable=false)
     */
    public $width;

    /**
     *
     * @var string
     * @Column(column="behaviour", type="string", length=255, nullable=false)
     */
    public $behaviour;

    /**
     *
     * @var string
     * @Column(column="current_program", type="string", length=255, nullable=true)
     */
    public $current_program;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("public_items");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'public_items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PublicItems[]|PublicItems|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PublicItems|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
