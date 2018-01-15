<?php

class ItemsTeleporterLinks extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="item_id", type="integer", length=11, nullable=false)
     */
    public $item_id;

    /**
     *
     * @var integer
     * @Column(column="linked_id", type="integer", length=11, nullable=false)
     */
    public $linked_id;


    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("items_teleporter_links");
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
        return 'items_teleporter_links';
    }

}
