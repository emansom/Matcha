<?php

class MessengerMessages extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=true)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="receiver_id", type="integer", nullable=false)
     */
    public $receiver_id;

    /**
     *
     * @var integer
     * @Column(column="sender_id", type="integer", nullable=false)
     */
    public $sender_id;

    /**
     *
     * @var string
     * @Column(column="unread", type="string", nullable=false)
     */
    public $unread;

    /**
     *
     * @var string
     * @Column(column="body", type="string", nullable=false)
     */
    public $body;

    /**
     *
     * @var string
     * @Column(column="date", type="string", nullable=false)
     */
    public $date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("messenger_messages");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MessengerMessages[]|MessengerMessages|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MessengerMessages|\Phalcon\Mvc\Model\ResultInterface
     */
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
        return 'messenger_messages';
    }

}
