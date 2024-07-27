<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdenPedido Entity
 *
 * @property int $id
 * @property int|null $numero_ped
 * @property int|null $user_id
 * @property string|null $descripcion
 * @property string|null $enviada
 * @property string|null $Status_aprobada
 * @property string|null $aprobada
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OrdenItem[] $orden_items
 */
class OrdenPedido extends Entity
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
        'numero_ped' => true,
        'user_id' => true,
        'descripcion' => true,
        'enviada' => true,
        'Status_aprobada' => true,
        'aprobada' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'orden_items' => true,
         'anulada' => true,
    ];
}
