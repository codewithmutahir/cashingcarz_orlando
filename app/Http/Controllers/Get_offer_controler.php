<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Category;
//use Illuminate\Http\Request;
//
//class Get_offer_controler extends Controller
//{
//    public function get_offer()
//    {
////        $post = new Post();
////        $post->save();
////        $post_edit = Post::findorfail($post->id);
////        dd($post_edit);
//
//        return view('post.post_create');
//    }
//
//    public function get_car_model(Request $request)
//    {
//        $getstate['states'] = Category::where('parent_id', $request->category_id)->get(["name", "id"]);
//
//        return response()->json($getstate);
//    }
//
//    public function get_car_model_sub(Request $request)
//    {
//        $getstate['states'] = Category::where('parent_id', $request->sub_category_id)->get(["name", "id"]);
//
//        return response()->json($getstate);
//    }
//
//    public function get_car_model_sub_store(Request $request)
//    {
//        dd($request->all());
//    }
//}
