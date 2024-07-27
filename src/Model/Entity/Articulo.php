<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Articulo Entity
 *
 * @property int $id
 * @property string|null $departamento
 * @property string|null $categoria
 * @property string|null $codigo
 * @property string|null $descripcion
 * @property string|null $cantidad
 *
 * @property \App\Model\Entity\OrdenItem[] $orden_items
 */
class Articulo extends Entity
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
        'departamento' => true,
        'categoria' => true,
        'codigo' => true,
        'descripcion' => true,
        'cantidad' => true,
        'orden_items' => true,
    ];
}
