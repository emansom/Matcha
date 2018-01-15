<?php

class SchemaMigrations extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="version", type="string", length=255, nullable=false)
     */
    public $version;


    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("schema_migrations");
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
        return 'schema_migrations';
    }

}
