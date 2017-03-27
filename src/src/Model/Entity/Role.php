<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\RolePermission[] $role_permissions
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id'   => false,
        'name' => true,
        '*'    => false
    ];

}
