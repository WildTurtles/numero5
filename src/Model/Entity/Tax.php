<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tax Entity
 *
 * @property int $id
 * @property int $amount
 * @property int $immovable_id
 *
 * @property \App\Model\Entity\Immovable $immovable
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\TaxCategories[] $taxes_categories
 */
class Tax extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
