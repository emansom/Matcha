<?php

class MessengerFriends extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="from_id", type="integer", length=11, nullable=false)
     */
    public $from_id;

    /**
     *
     * @var integer
     * @Column(column="to_id", type="integer", length=11, nullable=false)
     */
    public $to_id;


    public function initialize()
    {
        $this->setSource("messenger_friends");
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
        return 'messenger_friends';
    }

}
