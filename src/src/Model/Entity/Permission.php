<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $id
 * @property string $prefix
 * @property string $controller
 * @property string $action
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\RolePermission[] $role_permissions
 */
class Permission extends Entity {

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
