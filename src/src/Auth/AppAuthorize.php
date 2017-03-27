<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;
use App\Auth\AuthComponent;

/**
 * 
 */
class AppAuthorize extends BaseAuthorize {

    /**
     * 
     * @param array $user
     * @param Request $request
     * @return boolean
     */
    public function authorize($user, Request $request) {
        $params = $request->params;
        $prefix = isset($params['prefix']) ? $params['prefix'] : null;

        // static pages can be accessed by everyone
        if (is_null($prefix) && strcasecmp($params['controller'], 'pages') == 0 && strcmp($params['action'], 'display')) {
            return true;
        }

        $rights = AuthComponent::getUserPermissions($user, $request->session());
        return AuthComponent::checkUserPermission($rights, $prefix, $params['controller'], $params['action']);
    }
}
