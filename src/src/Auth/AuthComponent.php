<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Auth;

use Cake\ORM\TableRegistry;

/**
 *
 * @todo AuthComponent is a terrible name?
 */
final class AuthComponent {

    /**
     * 
     * @param type $role_id
     * @param type $session
     */
    public static function getUserPermissions($role_id, $session) {
        $rights = null;
        if ($session && $session->check('Auth.Rights')) {
            $rights = $session->read('Auth.Rights');
        } else if ($session && !$session->check('Auth.Rights')) {
            $permissions = TableRegistry::get('Permissions')
                    ->find('all')
                    ->hydrate(false)
                    ->join([
                        'table'      => 'role_permissions',
                        'type'       => 'LEFT',
                        'conditions' => 'role_permissions.permission_id = Permissions.id',
                    ])
                    ->where(['role_permissions.role_id' => $role_id])
                    ->select(['prefix', 'controller', 'action'])
                    ->toArray();
            $session->write('Auth.Rights', $permissions);
            $rights      = $permissions;
        }
        return $rights;
    }

    /**
     * Checks to see if the rights array provided contains the prefix, controller and action requested.
     * 
     * @todo there must be some sort of search I can perform instead of looping?
     *  maybe pass the prefix, controller and action as an array and compare?
     * @param  array   $rights     The array of user rights 
     * @param  string  $prefix     The prefix to check for
     * @param  string  $controller The controller to check for
     * @param  string  $action     The action to check for
     * @return boolean
     */
    public static function checkUserPermission($rights, $prefix, $controller, $action) {
        foreach ($rights as $right) {
            $r_prefix = isset($right['prefix']) ? $right['prefix'] : null;
            if (strcasecmp($r_prefix, $prefix) == 0 && strcasecmp($right['controller'], $controller) == 0 && strcasecmp($right['action'], $action) == 0) {
                return true;
            }
        }
        return false;
    }
}
