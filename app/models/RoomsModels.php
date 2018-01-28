<?php

class RoomsModels extends \Phalcon\Mvc\Model
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
     * @Column(column="model_id", type="string", length=255, nullable=false)
     */
    public $model_id;

    /**
     *
     * @var string
     * @Column(column="model_name", type="string", length=255, nullable=true)
     */
    public $model_name;

    /**
     *
     * @var integer
     * @Column(column="door_x", type="integer", length=11, nullable=false)
     */
    public $door_x;

    /**
     *
     * @var integer
     * @Column(column="door_y", type="integer", length=11, nullable=false)
     */
    public $door_y;

    /**
     *
     * @var string
     * @Column(column="door_z", type="string", nullable=false)
     */
    public $door_z;

    /**
     *
     * @var integer
     * @Column(column="door_dir", type="integer", length=11, nullable=true)
     */
    public $door_dir;

    /**
     *
     * @var string
     * @Column(column="heightmap", type="string", nullable=false)
     */
    public $heightmap;

    /**
     *
     * @var string
     * @Column(column="trigger_class", type="string", nullable=false)
     */
    public $trigger_class;


    public function initialize()
    {

        $this->setSource("rooms_models");
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
        return 'rooms_models';
    }

}
