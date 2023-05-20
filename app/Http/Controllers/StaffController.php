<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Faq;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use App\Models\Resources\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller {
   // protected $_staffModel;
    public function __construct() {
       // $this->_staffModel = new Staff();
        $this->middleware('can:isStaff');
    }
    public function staff() {
        return view('staff');
    }
}
