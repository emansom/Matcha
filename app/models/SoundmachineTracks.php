<?php

class SoundmachineTracks extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="soundmachine_id", type="integer", length=11, nullable=false)
     */
    public $soundmachine_id;

    /**
     *
     * @var integer
     * @Column(column="track_id", type="integer", length=11, nullable=false)
     */
    public $track_id;

    /**
     *
     * @var integer
     * @Column(column="slot_id", type="integer", length=11, nullable=false)
     */
    public $slot_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("soundmachine_tracks");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'soundmachine_tracks';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachineTracks[]|SoundmachineTracks|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachineTracks|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
