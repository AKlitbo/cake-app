<?php
/**
 * 
 * @author Andrew Klitbo
 */

use Migrations\AbstractSeed;

/**
 * Roles Seed
 * 
 * The first seed that needs to called, will then call Users seed when finished.
 */
class RolesSeed extends AbstractSeed {

    /**
     * 
     * @return void
     */
    public function run() {
        $data = [
            [
                'id'   => '1',
                'name' => 'Administrator',
            ],
            [
                'id'   => '2',
                'name' => 'User',
            ],
        ];

        $table = $this->table('roles');
        $table->insert($data)->save();
        $this->call('UsersSeed');
    }
}
