<?php

class CatalogueItems extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="sale_code", type="string", nullable=true)
     */
    public $sale_code;

    /**
     *
     * @var integer
     * @Column(column="page_id", type="integer", nullable=true)
     */
    public $page_id;

    /**
     *
     * @var integer
     * @Column(column="order_id", type="integer", nullable=true)
     */
    public $order_id;

    /**
     *
     * @var integer
     * @Column(column="price", type="integer", nullable=true)
     */
    public $price;

    /**
     *
     * @var integer
     * @Column(column="definition_id", type="integer", nullable=true)
     */
    public $definition_id;

    /**
     *
     * @var integer
     * @Column(column="item_specialspriteid", type="integer", nullable=true)
     */
    public $item_specialspriteid;

    /**
     *
     * @var string
     * @Column(column="package_name", type="string", nullable=true)
     */
    public $package_name;

    /**
     *
     * @var string
     * @Column(column="package_description", type="string", nullable=true)
     */
    public $package_description;

    /**
     *
     * @var integer
     * @Column(column="is_package", type="integer", nullable=true)
     */
    public $is_package;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("catalogue_items");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CatalogueItems[]|CatalogueItems|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CatalogueItems|\Phalcon\Mvc\Model\ResultInterface
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
        return 'catalogue_items';
    }

}
