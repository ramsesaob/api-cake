<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $password_confirm
 * @property string|null $role
 * @property int|null $status
 * @property string $nombre
 * @property string $vendedor
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $telefonovend
 * @property string|null $telefonoana
 * @property string|null $userbod
 *
 * @property \App\Model\Entity\BODEGAPED[] $b_o_d_e_g_a_p_e_d_s
 * @property \App\Model\Entity\BODEGAPEDSAux[] $b_o_d_e_g_a_p_e_d_s_aux
 * @property \App\Model\Entity\Reciboped[] $recibopeds
 * @property \App\Model\Entity\BodegaRespaldo[] $bodega_respaldo
 * @property \App\Model\Entity\Orden[] $ordens
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'password_confirm' => true,
        'role' => true,
        'status' => true,
        'nombre' => true,
        'vendedor' => true,
        'created' => true,
        'modified' => true,
        'telefonovend' => true,
        'telefonoana' => true,
        'userbod' => true,
        'b_o_d_e_g_a_p_e_d_s' => true,
        'b_o_d_e_g_a_p_e_d_s_aux' => true,
        'recibopeds' => true,
        'bodega_respaldo' => true,
        'ordens' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
