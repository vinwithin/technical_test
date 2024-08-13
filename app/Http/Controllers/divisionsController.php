<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use Illuminate\Http\Request;

class divisionsController extends Controller
{
    public function index(){
        $divisions = Divisions::paginate(2);
        return response()->json([
            'success' => true,
            'divisions'  => $divisions,    
        ], 200);
    }
    
}
