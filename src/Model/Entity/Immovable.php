<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Immovable Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property int $rental
 * @property bool $rented
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rental[] $rentals
 * @property \App\Model\Entity\Tax[] $taxes
 * @property \App\Model\Entity\Tenant[] $tenants
 */
class Immovable extends Entity
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
