<?php

class ItemsMoodlightPresets extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="item_id", type="integer", length=11, nullable=false)
     */
    public $item_id;

    /**
     *
     * @var integer
     * @Column(column="current_preset", type="integer", length=11, nullable=false)
     */
    public $current_preset;

    /**
     *
     * @var string
     * @Column(column="preset_1", type="string", length=50, nullable=false)
     */
    public $preset_1;

    /**
     *
     * @var string
     * @Column(column="preset_2", type="string", length=50, nullable=false)
     */
    public $preset_2;

    /**
     *
     * @var string
     * @Column(column="preset_3", type="string", length=50, nullable=false)
     */
    public $preset_3;


    public function initialize()
    {

        $this->setSource("items_moodlight_presets");
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
        return 'items_moodlight_presets';
    }

}
