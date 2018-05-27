<?php

class Users extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="username", type="string", length=255, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=255, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(column="figure", type="string", length=255, nullable=false)
     */
    public $figure;

    /**
     *
     * @var string
     * @Column(column="pool_figure", type="string", length=255, nullable=false)
     */
    public $pool_figure;

    /**
     *
     * @var string
     * @Column(column="sex", type="string", length=1, nullable=true)
     */
    public $sex;

    /**
     *
     * @var string
     * @Column(column="motto", type="string", length=100, nullable=true)
     */
    public $motto;

    /**
     *
     * @var integer
     * @Column(column="credits", type="integer", length=11, nullable=true)
     */
    public $credits;

    /**
     *
     * @var integer
     * @Column(column="tickets", type="integer", length=11, nullable=true)
     */
    public $tickets;

    /**
     *
     * @var integer
     * @Column(column="film", type="integer", length=11, nullable=true)
     */
    public $film;

    /**
     *
     * @var integer
     * @Column(column="rank", type="integer", length=11, nullable=true)
     */
    public $rank;

    /**
     *
     * @var string
     * @Column(column="console_motto", type="string", length=100, nullable=true)
     */
    public $console_motto;

    /**
     *
     * @var integer
     * @Column(column="last_online", type="integer", length=11, nullable=true)
     */
    public $last_online;

    /**
     *
     * @var string
     * @Column(column="sso_ticket", type="string", length=255, nullable=true)
     */
    public $sso_ticket;

    /**
     *
     * @var integer
     * @Column(column="club_subscribed", type="integer", length=11, nullable=true)
     */
    public $club_subscribed;

    /**
     *
     * @var integer
     * @Column(column="club_expiration", type="integer", length=11, nullable=true)
     */
    public $club_expiration;

    /**
     *
     * @var string
     * @Column(column="badge", type="string", length=255, nullable=false)
     */
    public $badge;

    /**
     *
     * @var integer
     * @Column(column="badge_active", type="integer", length=11, nullable=true)
     */
    public $badge_active;


    public function initialize()
    {
        $this->setSource("users");
        $this->allowEmptyStringValues(['pool_figure', 'motto', 'console_motto', 'badge']);
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
        return 'users';
    }

}
