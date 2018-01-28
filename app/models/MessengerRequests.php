<?php

class MessengerRequests extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="from_id", type="integer", length=11, nullable=true)
     */
    public $from_id;

    /**
     *
     * @var integer
     * @Column(column="to_id", type="integer", length=11, nullable=true)
     */
    public $to_id;


    public function initialize()
    {
        $this->setSource("messenger_requests");
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
        return 'messenger_requests';
    }

}
