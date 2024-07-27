<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdenItem Entity
 *
 * @property int $id
 * @property int|null $articulo_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $orden_pedido_id
 * @property string|null $comentario
 * @property int|null $cantidad
 *
 * @property \App\Model\Entity\Articulo $articulo
 * @property \App\Model\Entity\OrdenPedido $orden_pedido
 */
class OrdenItem extends Entity
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
        'articulo_id' => true,
        'created' => true,
        'modified' => true,
        'orden_pedido_id' => true,
        'comentario' => true,
        'cantidad' => true,
        'articulo' => true,
        'orden_pedido' => true,
    ];
}
