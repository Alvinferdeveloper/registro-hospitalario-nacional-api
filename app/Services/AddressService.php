<?php
namespace App\Services;
use App\Models\Address;

class AddressService{

    public static function insertAddress($validatedInfo){
        return Address::create([
            'departament_id' => $validatedInfo['departament_id'],
            'municipio' => $validatedInfo['municipio'],
            'city' => $validatedInfo['city'],
            'address' => $validatedInfo['address'],
        ]);
    }
}

?>