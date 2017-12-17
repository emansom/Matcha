<?php

class ItemsDefinitions extends \Phalcon\Mvc\Model
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
     * @Column(column="cast_directory", type="string", length=255, nullable=true)
     */
    public $cast_directory;

    /**
     *
     * @var string
     * @Column(column="sprite", type="string", length=255, nullable=true)
     */
    public $sprite;

    /**
     *
     * @var string
     * @Column(column="colour", type="string", length=255, nullable=true)
     */
    public $colour;

    /**
     *
     * @var integer
     * @Column(column="length", type="integer", length=11, nullable=true)
     */
    public $length;

    /**
     *
     * @var integer
     * @Column(column="width", type="integer", length=11, nullable=true)
     */
    public $width;

    /**
     *
     * @var double
     * @Column(column="top_height", type="double", length=10, nullable=true)
     */
    public $top_height;

    /**
     *
     * @var string
     * @Column(column="behaviour", type="string", length=255, nullable=true)
     */
    public $behaviour;


    public function initialize()
    {
        $this->setSource("items_definitions");
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
        return 'items_definitions';
    }

}
