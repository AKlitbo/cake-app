<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RolePermission Entity
 *
 * @property int $id
 * @property int $role_id
 * @property int $permission_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Permission $permission
 */
class RolePermission extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @todo
     * @var array
     */
    protected $_accessible = [
        '*'  => true,
        'id' => false
    ];

}
