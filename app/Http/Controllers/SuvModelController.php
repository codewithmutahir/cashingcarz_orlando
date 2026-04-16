<?php

namespace App\Http\Controllers;

use App\Models\SuvModel;
use Illuminate\Http\Request;

class SuvModelController extends Controller
{
    public function index()
    {
        $suv_models = SuvModel::paginate(10);
        return view('admin.suv_model.index', compact('suv_models'));
    }

    public function store(Request $request)
    {
        $category_id = null;
        if ($request->car_sub_model == null) {
            $category_id = $request->car_model;
        } else {
            $category_id = $request->car_sub_model;
        }
        $check = SuvModel::where('category_id', $category_id)->first();
        if ($check) {
            return back()->with('message', 'Already Added');
        }
        $suv_model = new SuvModel();
        $suv_model->category_id = $category_id;
        $suv_model->save();
        return back()->with('message', 'Successfully Added');
    }

    public function destroy($id)
    {
        SuvModel::findorfail($id)->delete();
        return back()->with('message', 'Successfully Deleted');
    }
}
