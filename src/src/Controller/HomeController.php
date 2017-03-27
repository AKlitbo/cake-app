<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * 
 */
class HomeController extends AppController {
    
    /**
     * 
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * 
     */
    public function index() {
        //
    }
}
