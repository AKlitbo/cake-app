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
class RolesController extends DashboardController {

    /**
     * 
     */
    public function index() {
        $roles = $this->paginate($this->Roles);
        $this->set(compact('roles'));
    }

    /**
     * 
     */
    public function view($id = null) {
        $role = $this->Roles->get($id, [
            'contain' => ['Users', 'RolePermissions']
        ]);
        $this->set(compact('role'));
    }

    /**
     * 
     */
    public function add() {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * 
     */
    public function edit($id = null) {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * @todo make it so you cannot remove roles 1 - admin or 2 - user
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
