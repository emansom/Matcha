<?php

class Items extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=true)
     */
    public $user_id;

    /**
     *
     * @var integer
     * @Column(column="room_id", type="integer", length=11, nullable=true)
     */
    public $room_id;

    /**
     *
     * @var integer
     * @Column(column="definition_id", type="integer", length=11, nullable=false)
     */
    public $definition_id;

    /**
     *
     * @var string
     * @Column(column="x", type="string", length=255, nullable=true)
     */
    public $x;

    /**
     *
     * @var string
     * @Column(column="y", type="string", length=255, nullable=true)
     */
    public $y;

    /**
     *
     * @var string
     * @Column(column="z", type="string", length=255, nullable=true)
     */
    public $z;

    /**
     *
     * @var string
     * @Column(column="wall_position", type="string", length=255, nullable=false)
     */
    public $wall_position;

    /**
     *
     * @var integer
     * @Column(column="rotation", type="integer", length=11, nullable=true)
     */
    public $rotation;

    /**
     *
     * @var string
     * @Column(column="custom_data", type="string", length=255, nullable=false)
     */
    public $custom_data;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("items");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items[]|Items|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
