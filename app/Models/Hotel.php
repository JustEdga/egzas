<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function deletePhoto()
    {
        if($this->photo){
            $fileName = $this->photo;
            unlink(public_path().$fileName);
            $this->photo = null;
            $this->save();
        }
    }

    const SORT = [
        'asc_price' => 'Price low to high',
        'desc_price' => 'Price high to low',
    ];
    
    public function hotelCountry()
    {
        return $this->belongsTo(Country::class, 'country', 'name');
    }
}