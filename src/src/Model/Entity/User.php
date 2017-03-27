<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $display_name
 * @property int $role_id
 * @property type $verified
 * @property \Cake\I18n\Time $last_login
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Role $role 
 */
class User extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id'           => false,
        'username'     => true,
        'password'     => true,
        'display_name' => true,
        'role_id'      => false,
        'verified'     => true,
        //'last_login'   => false,
        //'created'       => false,
        //'modified'      => false,
        '*'            => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * 
     */
    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
