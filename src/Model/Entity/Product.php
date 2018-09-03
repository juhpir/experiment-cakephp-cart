<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $in_stock
 * @property int $price_eur
 * @property int $weight_kg
 * @property int $length_cm
 * @property int $age_years
 * @property string $sex
 * @property string $photo_url
 * @property bool $published
 */
class Product extends Entity
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
        'title' => true,
        'slug' => true,
        'body' => true,
        'in_stock' => true,
        'price_eur' => true,
        'weight_kg' => true,
        'length_cm' => true,
        'age_years' => true,
        'sex' => true,
        'photo_url' => true,
        'published' => true
    ];
}
