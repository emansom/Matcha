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


    public function initialize()
    {
        $this->setSource("rank_fuserights");
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
        return 'rank_fuserights';
    }

}
