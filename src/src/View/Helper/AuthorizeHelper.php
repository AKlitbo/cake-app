<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\View\Helper;

//use Cake\ORM\TableRegistry;
use Cake\View\Helper;
use App\Auth\AuthComponent;

/**
 * 
 */
class AuthorizeHelper extends Helper {

    /**
     * 
     * @param type $rights
     * @param type $prefix
     * @return boolean
     */
    public function hasRightWithPrefix($rights, $prefix) {
        foreach ($rights as $right) {
            if (strcasecmp($right['prefix'], $prefix) == 0) {
                return true;
            }
        }
        return false;

        /* $data = TableRegistry::get('Permissions')->find('all')
          ->hydrate(false)
          ->join([
          'table'      => 'role_permissions',
          'type'       => 'LEFT',
          'conditions' => 'role_permissions.permission_id = Permissions.id',
          ])
          ->where(['role_permissions.role_id' => $role_id, 'prefix' => $prefix])
          ->count();
          return $data > 0 ? true : false; */
    }

    /**
     * 
     * @param type $rights
     * @param type $prefix
     * @param type $controller
     * @param type $action
     * @return boolean
     */
    public function hasRight($rights, $prefix, $controller, $action) {
        return AuthComponent::checkUserPermission($rights, $prefix, $controller, $action);

        /* $data = TableRegistry::get('Permissions')->find('all')
          ->hydrate(false)
          ->join([
          'table'      => 'role_permissions',
          'type'       => 'LEFT',
          'conditions' => 'role_permissions.permission_id = Permissions.id',
          ])
          ->where(['role_permissions.role_id' => $role_id, 'prefix' => $prefix, 'controller' => $controller, 'action' => $action])
          ->count();
          return $data > 0 ? true : false; */
    }
}
