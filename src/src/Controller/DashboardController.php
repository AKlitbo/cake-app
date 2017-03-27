<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Administration Panel Base Controller
 */
class DashboardController extends AppController {

    /**
     * 
     */
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->setLayout('dashboard');
    }

    /**
     * 
     */
    public function index() {
        //
    }
}
