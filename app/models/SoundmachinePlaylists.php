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

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("soundmachine_playlists");
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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachinePlaylists[]|SoundmachinePlaylists|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SoundmachinePlaylists|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
