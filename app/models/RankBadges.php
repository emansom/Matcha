<?php

class RankBadges extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="rank", type="integer", length=1, nullable=false)
     */
    public $rank;

    /**
     *
     * @var string
     * @Column(column="badge", type="string", length=3, nullable=false)
     */
    public $badge;


    public function initialize()
    {
        $this->setSource("rank_badges");
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
        return 'rank_badges';
    }

}
