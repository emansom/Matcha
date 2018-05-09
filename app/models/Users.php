<?php

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="username", type="string", nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(column="password", type="string", nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(column="figure", type="string", nullable=false)
     */
    public $figure;

    /**
     *
     * @var string
     * @Column(column="pool_figure", type="string", nullable=false)
     */
    public $pool_figure;

    /**
     *
     * @var string
     * @Column(column="sex", type="string", nullable=false)
     */
    public $sex;

    /**
     *
     * @var string
     * @Column(column="motto", type="string", nullable=false)
     */
    public $motto;

    /**
     *
     * @var integer
     * @Column(column="credits", type="integer", nullable=false)
     */
    public $credits;

    /**
     *
     * @var integer
     * @Column(column="tickets", type="integer", nullable=false)
     */
    public $tickets;

    /**
     *
     * @var integer
     * @Column(column="film", type="integer", nullable=false)
     */
    public $film;

    /**
     *
     * @var integer
     * @Column(column="rank", type="integer", nullable=false)
     */
    public $rank;

    /**
     *
     * @var string
     * @Column(column="console_motto", type="string", nullable=false)
     */
    public $console_motto;

    /**
     *
     * @var string
     * @Column(column="last_online", type="string", nullable=false)
     */
    public $last_online;

    /**
     *
     * @var string
     * @Column(column="sso_ticket", type="string", nullable=true)
     */
    public $sso_ticket;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("users");
        $this->allowEmptyStringValues(['pool_figure', 'motto', 'console_motto']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
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
        return 'users';
    }

}
