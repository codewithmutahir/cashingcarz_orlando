<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::paginate(15);
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $faq = Faq::where('question', $request->question)->first();
        if ($faq) {
            return back();
        }
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return back();

    }

    public function destroy($id)
    {
        Faq::findorfail($id)->delete();
        return back();
    }
}
