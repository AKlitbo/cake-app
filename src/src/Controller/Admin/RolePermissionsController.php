<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Controller\Admin;

use App\Controller\DashboardController;

/**
 * 
 */
class RolePermissionsController extends DashboardController {

    /**
     * 
     */
    public function index() {
        $this->paginate  = [
            'contain' => ['Roles', 'Permissions']
        ];
        $rolePermissions = $this->paginate($this->RolePermissions);
        $this->set(compact('rolePermissions'));
    }

    /**
     * 
     */
    public function add() {
        $rolePermission = $this->RolePermissions->newEntity();
        if ($this->request->is('post')) {
            $rolePermission = $this->RolePermissions->patchEntity($rolePermission, $this->request->data);
            if ($this->RolePermissions->save($rolePermission)) {
                $this->Flash->success(__('The role permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role permission could not be saved. Please, try again.'));
        }
        $roles       = $this->RolePermissions->Roles->find('list', ['limit' => 200]);
        $permissions = $this->RolePermissions->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('rolePermission', 'roles', 'permissions'));
    }

    /**
     * 
     */
    public function edit($id = null) {
        $rolePermission = $this->RolePermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolePermission = $this->RolePermissions->patchEntity($rolePermission, $this->request->data);
            if ($this->RolePermissions->save($rolePermission)) {
                $this->Flash->success(__('The role permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role permission could not be saved. Please, try again.'));
        }
        $roles       = $this->RolePermissions->Roles->find('list', ['limit' => 200]);
        $permissions = $this->RolePermissions->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('rolePermission', 'roles', 'permissions'));
    }

    /**
     * @todo make it so you cant remove the link between admin and admin prefixed permissions
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $rolePermission = $this->RolePermissions->get($id);
        if ($this->RolePermissions->delete($rolePermission)) {
            $this->Flash->success(__('The role permission has been deleted.'));
        } else {
            $this->Flash->error(__('The role permission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
