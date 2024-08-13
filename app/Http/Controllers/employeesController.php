<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class employeesController extends Controller
{
    public function index()
    {
        $employees = Employees::with('divisions')->paginate(2);
        return response()->json([
            'success' => true,
            'employees'  => $employees,

        ], 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'name' => 'required',
            'phone' => 'required',
            'id_divisions' => 'required',
            'position' => 'required',
        ]);
        $image_name = time() . '_' . $request->image->getClientOriginalName();
        $request->image->storeAs('/storage/foto/', $image_name);
        $validateData['image'] = $image_name;
        $result = Employees::create($validateData);
        if ($result) {
            return response()->json([
                'success' => true,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'name' => 'required',
            'phone' => 'required',
            'id_divisions' => 'required',
            'position' => 'required',
        ]);
        $image_name = time() . '_' . $request->image->getClientOriginalName();
        $request->image->storeAs('/storage/foto/', $image_name);
        $validateData['image'] = $image_name;
        $result = Employees::where('id', $id)
                ->update($validateData);
        if ($result) {
            return response()->json([
                'success' => true,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }
    public function destroy($id){
        $result = Employees::where('id', $id)->delete();
        if ($result) {
            return response()->json([
                'success' => true,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }
}
