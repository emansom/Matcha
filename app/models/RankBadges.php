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

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("rank_badges");
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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RankBadges[]|RankBadges|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RankBadges|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
