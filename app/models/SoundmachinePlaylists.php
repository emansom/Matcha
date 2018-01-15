<?php

class SoundmachinePlaylists extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="item_id", type="integer", length=11, nullable=false)
     */
    public $item_id;

    /**
     *
     * @var integer
     * @Column(column="song_id", type="integer", length=11, nullable=false)
     */
    public $song_id;

    /**
     *
     * @var integer
     * @Column(column="slot_id", type="integer", length=11, nullable=false)
     */
    public $slot_id;


    public function initialize()
    {
        $this->setSchema("kepler_test");
        $this->setSource("soundmachine_playlists");
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
        return 'soundmachine_playlists';
    }

}
