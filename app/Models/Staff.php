<?php

namespace App\Models\Resources;

use App\Models\Azienda;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{public function getStaff(){
    return Staff::all();
}

    public function getStaffbyId($id){
        return Azienda::find($id);
    }

}
