<?php

class RankFuserights extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="min_rank", type="integer", length=11, nullable=false)
     */
    public $min_rank;

    /**
     *
     * @var string
     * @Column(column="fuseright", type="string", length=255, nullable=false)
     */
    public $fuseright;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("rank_fuserights");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rank_fuserights';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RankFuserights[]|RankFuserights|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RankFuserights|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
