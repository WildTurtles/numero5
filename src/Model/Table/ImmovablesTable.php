<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Immovables Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Rentals
 * @property \Cake\ORM\Association\HasMany $Taxes
 * @property \Cake\ORM\Association\BelongsToMany $Tenants
 *
 * @method \App\Model\Entity\Immovable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Immovable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Immovable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Immovable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immovable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Immovable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Immovable findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImmovablesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('immovables');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'immovable_id'
        ]);
        $this->hasMany('Taxes', [
            'foreignKey' => 'immovable_id'
        ]);
        $this->belongsToMany('Tenants', [
            'foreignKey' => 'immovable_id',
            'targetForeignKey' => 'tenant_id',
            'joinTable' => 'immovables_tenants'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('rental')
            ->allowEmpty('rental');

        $validator
            ->boolean('rented')
            ->requirePresence('rented', 'create')
            ->notEmpty('rented');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
