<?php

class CatalogueItems extends \Phalcon\Mvc\Model
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
     * @Column(column="sale_code", type="string", length=255, nullable=true)
     */
    public $sale_code;

    /**
     *
     * @var integer
     * @Column(column="page_id", type="integer", length=11, nullable=true)
     */
    public $page_id;

    /**
     *
     * @var integer
     * @Column(column="order_id", type="integer", length=11, nullable=false)
     */
    public $order_id;

    /**
     *
     * @var integer
     * @Column(column="price", type="integer", length=11, nullable=false)
     */
    public $price;

    /**
     *
     * @var integer
     * @Column(column="definition_id", type="integer", length=11, nullable=true)
     */
    public $definition_id;

    /**
     *
     * @var integer
     * @Column(column="item_specialspriteid", type="integer", length=11, nullable=false)
     */
    public $item_specialspriteid;

    /**
     *
     * @var string
     * @Column(column="package_name", type="string", length=255, nullable=true)
     */
    public $package_name;

    /**
     *
     * @var string
     * @Column(column="package_description", type="string", length=255, nullable=true)
     */
    public $package_description;

    /**
     *
     * @var integer
     * @Column(column="is_package", type="integer", length=1, nullable=false)
     */
    public $is_package;


    public function initialize()
    {
        $this->setSource("catalogue_items");
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
        return 'catalogue_items';
    }

}
