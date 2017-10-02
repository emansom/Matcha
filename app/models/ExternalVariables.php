<?php

class ExternalVariables extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="key", type="string", nullable=false)
     */
    public $key;

    /**
     *
     * @var string
     * @Column(column="value", type="string", nullable=false)
     */
    public $value;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("external_variables");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'external_variables';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalVariables[]|ExternalVariables|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalVariables|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
