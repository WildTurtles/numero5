<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeRents Model
 *
 * @property \Cake\ORM\Association\HasMany $Rents
 *
 * @method \App\Model\Entity\TypeRent get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeRent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeRent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeRent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeRent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeRent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeRent findOrCreate($search, callable $callback = null)
 */
class TypeRentsTable extends Table
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

        $this->table('type_rents');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Rents', [
            'foreignKey' => 'type_rent_id'
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
            ->allowEmpty('type');

        return $validator;
    }
}
