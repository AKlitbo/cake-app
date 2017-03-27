<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\View\Helper;

use Cake\View\Helper;

/**
 *  
 */
class LinkHelper extends Helper {

    /**
     * @todo there has to be a better fucking way to do this?
     */
    public function pagiArrow($key, $title, $sort, $dir) {
        if ($key == $sort) {
            return $title . " &nbsp;<i class='fa fa-angle-" . $dir . "'></i>";
        } else {
            return $title;
        }
    }
}
