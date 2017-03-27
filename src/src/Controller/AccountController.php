<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\I18n\Time;
use App\Controller\AppController;

/**
 * User Account Controller
 */
class AccountController extends AppController {

    /**
     * 
     */
    public function initialize() {
        parent::initialize();
        $this->loadModel('Users');
    }

    /**
     * 
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view', 'register', 'logout', 'forgot', 'reset']);
    }

    /**
     * 
     */
    public function index() {
        return $this->redirect('/account/view');
    }

    /**
     * 
     */
    public function view() {
        $u = $this->Auth->user();
        if (!$u) {
            return $this->redirect('/');
        } else {
            $user = $this->Users->get($u['id'], [
                'contain' => ['Roles']
            ]);
            $this->set('user', $user);
        }
    }

    /**
     * 
     */
    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'roles'));
    }

    /**
     * 
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                // update last_login without updating modified
                $this->Users->updateAll(['last_login' => Time::now()], ['id' => $user['id'], 'username' => $user['username']]);

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    /**
     * 
     */
    public function logout() {
        $this->request->session()->delete('Auth.User');
        $this->request->session()->delete('Auth.Rights');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * @todo Forgot Password Function
     */
    public function forgot() {
        throw new \Cake\Network\Exception\NotImplementedException();
    }

    /**
     * @todo Reset Password Function
     */
    public function reset() {
        throw new \Cake\Network\Exception\NotImplementedException();
    }
}
