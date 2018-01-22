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

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("messenger_friends");
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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MessengerFriends[]|MessengerFriends|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MessengerFriends|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
