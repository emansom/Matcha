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


    public function initialize()
    {
        $this->setSource("soundmachine_tracks");
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
        return 'soundmachine_tracks';
    }

}
