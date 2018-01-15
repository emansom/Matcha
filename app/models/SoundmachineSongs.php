<?php

class SoundmachineSongs extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=100, nullable=false)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(column="item_id", type="integer", length=11, nullable=false)
     */
    public $item_id;

    /**
     *
     * @var integer
     * @Column(column="length", type="integer", length=3, nullable=false)
     */
    public $length;

    /**
     *
     * @var string
     * @Column(column="data", type="string", nullable=false)
     */
    public $data;

    /**
     *
     * @var integer
     * @Column(column="burnt", type="integer", length=1, nullable=false)
     */
    public $burnt;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler_test");
        $this->setSource("soundmachine_songs");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'soundmachine_songs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachineSongs[]|SoundmachineSongs|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachineSongs|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
