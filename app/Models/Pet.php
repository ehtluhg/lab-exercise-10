<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'pet_name',
        'animal_type',
        'pet_owner',
        'owner_address'
    ];

    /* public function users()
    {
        return $this->hasMany(User::class, 'pet_id', 'id');
    }

    public function getMembersCount()
    {
        if (empty($this->users) || is_null($this->users)) {
            return 0;
        }
        return $this->users->count();
    } */

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->pet_name;
    }

    public function getType()
    {
        return $this->animal_type;
    }

    public function getOwner()
    {
        return $this->pet_owner;
    }

    public function getAddress()
    {
        return $this->owner_address;
    }

    /* public function getWebsiteURL()
    {
        return $this->website_url;
    } */

    public function setName($value)
    {
        // UPDATE pets SET name=$value
        $this->pet_name = $value;
        return $this->save();
    }

    public function setType($value)
    {
        // UPDATE pets SET animal_type=$value
        $this->animal_type = $value;
        return $this->save();
    }

    public function setOwner($value)
    {
        $this->pet_owner = $value;
        return $this->save();
    }

    public function setAddress($value)
    {
        $this->owner_address = $value;
        return $this->save();
    }

    /* public function setWebsiteURL($value)
    {
        $this->website_url = $value;
        return $this->save();
    } */

    public function isMammal()
    {
        return ($this->animal_type == 'mammal');
    }

    public function isBird()
    {
        return ($this->animal_type == 'bird');
    }

    public function isFish()
    {
        return ($this->animal_type == 'fish');
    }

    public function isReptile()
    {
        return ($this->animal_type == 'reptile');
    }

    public function isAmphibian()
    {
        return ($this->animal_type == 'amphibian');
    }

    public function isArthropod()
    {
        return ($this->animal_type == 'arthropod');
    }
}
