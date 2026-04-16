<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(15);
        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $brand = Brand::where('name', $request->name)->first();
        if ($brand) {
            return back()->with('message', 'Already Added');
        }
        $brand = new Brand();
        $brand->name = $request->name;
        if ($request->has('photo')) {
            $path = $request->file('photo')->store('brand', 'public');
            $brand->photo = $path;

        }
        $brand->save();

        return back()->with('message', 'Successfully Added');
    }

    public function edit($id)
    {
        $brand = Brand::findorfail($id);
        return view('admin.brand.edit', compact('brand'));

    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findorfail($id);
        $brand->name = $request->name;
        if ($request->has('photo')) {
            $path = $request->file('photo')->store('brand', 'public');
            $brand->photo = $path;
        }
        $brand->save();
        return redirect()->route('brand')->with('message', 'Successfully Updated');
    }

    public function destroy($id)
    {
        Brand::findorfail($id)->delete();
        return back()->with('message', 'Brand has been successfully deleted');
    }
}
