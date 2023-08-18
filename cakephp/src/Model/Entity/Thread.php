<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Madori Entity
 *
 * @property int $id
 * @property int $flag
 * @property string $title
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Thread $thread
 */
class Thread extends Entity
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

    public function getUrl()
    {
        return "/thread/" . $this->id;
    }

    public function getCreateUrl()
    {
        return "/thread/create/" . $this->id;
    }

    public function getModified()
    {
        return $this->modified->format("Y-m-d");
    }



}
