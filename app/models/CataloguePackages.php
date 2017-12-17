<?php

class CataloguePackages extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="salecode", type="string", length=255, nullable=true)
     */
    public $salecode;

    /**
     *
     * @var integer
     * @Column(column="definition_id", type="integer", length=11, nullable=true)
     */
    public $definition_id;

    /**
     *
     * @var integer
     * @Column(column="special_sprite_id", type="integer", length=11, nullable=true)
     */
    public $special_sprite_id;

    /**
     *
     * @var integer
     * @Column(column="amount", type="integer", length=11, nullable=true)
     */
    public $amount;


    public function initialize()
    {
        $this->setSource("catalogue_packages");
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
        return 'catalogue_packages';
    }

}
