<?php
/**
 * 
 * @author Andrew Klitbo
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Datasource\EntityInterface;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Core\Configure;
use ArrayObject;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method.
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType'   => 'INNER'
        ]);
    }

    /**
     * Modifies request data before it is converted into an Entity.
     * 
     * @param \App\Model\Table\Event $event
     * @param \App\Model\Table\ArrayObject $data
     * @param \App\Model\Table\ArrayObject $options
     */
    public function beforeMarshal(Event $event, ArrayObject $data) {
        if (isset($data['display_name'])) {
            $data['display_name'] = trim($data['display_name']);
        }
    }

    /**
     * Modifies an Entity before saving.
     * 
     * @param \Cake\Event\Event $event
     * @param \Cake\Datasource\EntityInterface $entity
     * @param ArrayObject $options
     */
    public function beforeSave(Event $event, EntityInterface $entity) {
        if ($entity->isNew() && empty($entity->role_id)) {
            $entity->role_id = Configure::read('DefaultRoles.user');
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
                ->requirePresence('username', 'create')
                ->notEmpty('username')
                ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
                ->requirePresence('display_name', ['create', 'update'])
                ->notEmpty('display_name')
                ->add('display_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
                ->requirePresence('password', 'create')
                ->notEmpty('password')
                ->add('password', ['compare' => ['rule' => ['compareWith', 'confirm_password']]]);

        $validator
                ->requirePresence('confirm_password', 'create')
                ->notEmpty('confirm_password')
                ->add('confirm_password', ['compare' => ['rule' => ['compareWith', 'password']]]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['display_name']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    /**
     * Auth finder for adding role data to the logged in user.
     * 
     * @param \Cake\ORM\Query $query
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function findAuth(Query $query, array $options) {
        return $query->contain(['Roles']);
    }
}
