<?php

class RareCycle extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="sale_code", type="string", length=255, nullable=false)
     */
    public $sale_code;

    /**
     *
     * @var integer
     * @Column(column="reuse_time", type="integer", length=11, nullable=false)
     */
    public $reuse_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("rare_cycle");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rare_cycle';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RareCycle[]|RareCycle|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RareCycle|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
