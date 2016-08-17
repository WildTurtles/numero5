<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TypeRents
 * @property \Cake\ORM\Association\BelongsTo $Rentals
 *
 * @method \App\Model\Entity\Rent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rent findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RentsTable extends Table
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

        $this->table('rents');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypeRents', [
            'foreignKey' => 'type_rent_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rentals', [
            'foreignKey' => 'rental_id',
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
            ->integer('account')
            ->requirePresence('account', 'create')
            ->notEmpty('account');

        $validator
            ->boolean('paid')
            ->allowEmpty('paid');

        $validator
            ->dateTime('date')
            ->allowEmpty('date');

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
        $rules->add($rules->existsIn(['type_rent_id'], 'TypeRents'));
        $rules->add($rules->existsIn(['rental_id'], 'Rentals'));

        return $rules;
    }
}
