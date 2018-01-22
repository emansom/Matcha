<?php

class CataloguePages extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="order_id", type="integer", length=11, nullable=true)
     */
    public $order_id;

    /**
     *
     * @var integer
     * @Column(column="min_role", type="integer", length=11, nullable=true)
     */
    public $min_role;

    /**
     *
     * @var string
     * @Column(column="name_index", type="string", length=255, nullable=true)
     */
    public $name_index;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="layout", type="string", length=255, nullable=true)
     */
    public $layout;

    /**
     *
     * @var string
     * @Column(column="image_headline", type="string", length=255, nullable=true)
     */
    public $image_headline;

    /**
     *
     * @var string
     * @Column(column="image_teasers", type="string", length=255, nullable=true)
     */
    public $image_teasers;

    /**
     *
     * @var string
     * @Column(column="body", type="string", length=255, nullable=true)
     */
    public $body;

    /**
     *
     * @var string
     * @Column(column="label_pick", type="string", length=255, nullable=true)
     */
    public $label_pick;

    /**
     *
     * @var string
     * @Column(column="label_extra_s", type="string", length=255, nullable=true)
     */
    public $label_extra_s;

    /**
     *
     * @var string
     * @Column(column="label_extra_t", type="string", length=255, nullable=true)
     */
    public $label_extra_t;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("catalogue_pages");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'catalogue_pages';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CataloguePages[]|CataloguePages|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CataloguePages|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
