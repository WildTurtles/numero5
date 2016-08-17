<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImmovablesTenants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Immovables
 * @property \Cake\ORM\Association\BelongsTo $Tenants
 *
 * @method \App\Model\Entity\ImmovablesTenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ImmovablesTenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ImmovablesTenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImmovablesTenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ImmovablesTenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ImmovablesTenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImmovablesTenant findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImmovablesTenantsTable extends Table
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

        $this->table('immovables_tenants');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Immovables', [
            'foreignKey' => 'immovable_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tenants', [
            'foreignKey' => 'tenant_id',
            'joinType' => 'INNER'
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
            ->date('date_end')
            ->allowEmpty('date_end');

        $validator
            ->date('date_begin')
            ->allowEmpty('date_begin');

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
        $rules->add($rules->existsIn(['immovable_id'], 'Immovables'));
        $rules->add($rules->existsIn(['tenant_id'], 'Tenants'));

        return $rules;
    }
}
