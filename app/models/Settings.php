<?php

class Settings extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="setting", type="string", length=50, nullable=false)
     */
    public $setting;

    /**
     *
     * @var string
     * @Column(column="value", type="string", nullable=false)
     */
    public $value;


    public function initialize()
    {
        $this->setSource("settings");
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
        return 'settings';
    }

}
