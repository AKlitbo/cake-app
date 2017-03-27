<?php
/**
 * 
 * @author Andrew Klitbo
 */

use Migrations\AbstractSeed;

/**
 * Users Seed
 */
class UsersSeed extends AbstractSeed {

    /**
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'id'           => '1',
                'username'     => 'cake@andrewklitbo.com',
                'password'     => '$2y$10$BNIODA5qviQE4P25j3IKyub2rBMfrxUPnena00FfGpnwk80QAxYgi',
                'display_name' => 'Administrator',
                'role_id'      => '1',
                'verified'     => '0',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
        //$this->call('PermissionsSeed');
    }
}
