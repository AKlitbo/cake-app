<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissions Model
 *
 * @property \Cake\ORM\Association\HasMany $PermissionRoles
 *
 * @method \App\Model\Entity\Permission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permission findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PermissionsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('permissions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PermissionRoles', [
            'foreignKey' => 'permission_id'
        ]);
    }

    /**
     * Modifies request data before it is converted into an Entity.
     * 
     * @param \App\Model\Table\Event $event
     * @param \App\Model\Table\ArrayObject $data
     */
    public function beforeMarshal(Event $event, ArrayObject $data) {
        if (isset($data['prefix'])) {
            $data['prefix'] = trim($data['prefix']);
        }

        if (isset($data['controller'])) {
            $data['controller'] = trim($data['controller']);
        }

        if (isset($data['action'])) {
            $data['action'] = trim($data['action']);
        }

        if (isset($data['description'])) {
            $data['description'] = trim($data['description']);
        }
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('prefix');

        $validator
                ->requirePresence('controller', 'create')
                ->notEmpty('controller');

        $validator
                ->requirePresence('action', 'create')
                ->notEmpty('action');

        $validator
                ->requirePresence('description', 'create')
                ->notEmpty('description');

        return $validator;
    }
}
