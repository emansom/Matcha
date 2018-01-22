<?php

class UsersRoomFavourites extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="room_id", type="integer", length=11, nullable=false)
     */
    public $room_id;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("users_room_favourites");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users_room_favourites';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersRoomFavourites[]|UsersRoomFavourites|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersRoomFavourites|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
