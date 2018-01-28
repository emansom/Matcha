<?php

class UsersBadges extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var string
     * @Column(column="badge", type="string", length=3, nullable=false)
     */
    public $badge;


    public function initialize()
    {

        $this->setSource("users_badges");
        $this->belongsTo('user_id', '\Users', 'id', ['alias' => 'Users']);
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
        return 'users_badges';
    }

}
