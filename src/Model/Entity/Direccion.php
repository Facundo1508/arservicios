<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Direccion Entity
 *
 * @property string $id
 * @property string $provincia_id
 * @property string $departamento_id
 * @property string $distrito_id
 * @property string $calle_id
 * @property int $numero
 * @property string $barrio
 * @property string $manzana
 * @property string $casa
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\Departamento $departamento
 * @property \App\Model\Entity\Distrito $distrito
 * @property \App\Model\Entity\Calle $calle
 */
class Direccion extends Entity
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
        'provincia_id' => true,
        'departamento_id' => true,
        'distrito_id' => true,
        'calle_id' => true,
        'numero' => true,
        'barrio' => true,
        'manzana' => true,
        'casa' => true,
        'created' => true,
        'modified' => true,
        'provincia' => true,
        'departamento' => true,
        'distrito' => true,
        'calle' => true
    ];
}
