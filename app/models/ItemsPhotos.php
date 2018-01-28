<?php

class ItemsPhotos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="photo_id", type="integer", length=11, nullable=false)
     */
    public $photo_id;

    /**
     *
     * @var integer
     * @Column(column="photo_user_id", type="integer", length=11, nullable=false)
     */
    public $photo_user_id;

    /**
     *
     * @var integer
     * @Column(column="timestamp", type="integer", length=11, nullable=false)
     */
    public $timestamp;

    /**
     *
     * @var string
     * @Column(column="photo_data", type="string", nullable=false)
     */
    public $photo_data;

    /**
     *
     * @var integer
     * @Column(column="photo_checksum", type="integer", length=11, nullable=false)
     */
    public $photo_checksum;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("items_photos");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'items_photos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ItemsPhotos[]|ItemsPhotos|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ItemsPhotos|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
