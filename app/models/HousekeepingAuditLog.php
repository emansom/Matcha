<?php

class HousekeepingAuditLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="action", type="string", nullable=false)
     */
    public $action;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var integer
     * @Column(column="target_id", type="integer", length=11, nullable=false)
     */
    public $target_id;

    /**
     *
     * @var string
     * @Column(column="message", type="string", length=255, nullable=false)
     */
    public $message;

    /**
     *
     * @var string
     * @Column(column="extra_notes", type="string", length=255, nullable=false)
     */
    public $extra_notes;

    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    public $created_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("kepler");
        $this->setSource("housekeeping_audit_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'housekeeping_audit_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HousekeepingAuditLog[]|HousekeepingAuditLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HousekeepingAuditLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
