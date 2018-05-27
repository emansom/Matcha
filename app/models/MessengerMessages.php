<?php

class MessengerMessages extends \Phalcon\Mvc\Model
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
     * @Column(column="receiver_id", type="integer", length=11, nullable=true)
     */
    public $receiver_id;

    /**
     *
     * @var integer
     * @Column(column="sender_id", type="integer", length=11, nullable=true)
     */
    public $sender_id;

    /**
     *
     * @var string
     * @Column(column="unread", type="string", length=255, nullable=true)
     */
    public $unread;

    /**
     *
     * @var string
     * @Column(column="body", type="string", length=255, nullable=true)
     */
    public $body;

    /**
     *
     * @var integer
     * @Column(column="date", type="integer", length=20, nullable=true)
     */
    public $date;


    public function initialize()
    {
        $this->setSource("messenger_messages");
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
        return 'messenger_messages';
    }

}
