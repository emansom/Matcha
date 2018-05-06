<?php

class ItemsDefinitions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="id", type="integer", nullable=true)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="cast_directory", type="string", nullable=true)
     */
    public $cast_directory;

    /**
     *
     * @var string
     * @Column(column="sprite", type="string", nullable=true)
     */
    public $sprite;

    /**
     *
     * @var string
     * @Column(column="colour", type="string", nullable=true)
     */
    public $colour;

    /**
     *
     * @var integer
     * @Column(column="length", type="integer", nullable=true)
     */
    public $length;

    /**
     *
     * @var integer
     * @Column(column="width", type="integer", nullable=true)
     */
    public $width;

    /**
     *
     * @var string
     * @Column(column="top_height", type="string", nullable=true)
     */
    public $top_height;

    /**
     *
     * @var string
     * @Column(column="behaviour", type="string", nullable=true)
     */
    public $behaviour;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("items_definitions");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ItemsDefinitions[]|ItemsDefinitions|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ItemsDefinitions|\Phalcon\Mvc\Model\ResultInterface
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
        return 'items_definitions';
    }

}
