<?php

class ExternalTexts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="entry", type="string", length=255, nullable=false)
     */
    public $entry;

    /**
     *
     * @var string
     * @Column(column="text", type="string", nullable=false)
     */
    public $text;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("external_texts");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'external_texts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalTexts[]|ExternalTexts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalTexts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
