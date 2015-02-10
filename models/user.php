<?php

/**
 * Robots
 *
 * Represents a robot
 *
 * @Source('my_robots');
 * @HasMany("id", "RobotsParts", "robotsId")
 */
class Robots extends \Phalcon\Mvc\Model
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false, column="my_id")
     */
    public $user_id;

    /**
     * @Column(type="string", nullable=false, column="my_name")
     */
    public $firstname;

    /**
     * @Column(type="string", nullable=false, column="my_type")
     */
    public $lastname;

    /**
     * @Column(type="integer", nullable=false, column="my_year")
     */
    public $email;

    /**
    * @Column(type="string", nullable=false, column="my_type")
    */
    public $username;
    public $password;
    public $created;
    public $modified;
    public $logdate;
    public $lognum;
    public $reload_acl_flag;
    public $is_active;
    public $extra;
    public $rp_token;
    public $rp_token_created_at;


}