<?php

namespace App\Http\Controllers;


use App\Models\OfferSubmission;
use App\Mail\OrderProcessing;
use App\Mail\PostApproved;
use App\Models\blogpost;
use App\Models\order;
use App\Models\Post;
use App\Models\User;
use App\Services\TwilioSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Exception;
use Illuminate\Support\Str;
use function Symfony\Component\String\b;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    public function order(Request $request)
    {
        $orders = order::orderBy('id', 'DESC');

        if ($request->id != null) {
            $orders = $orders->where('id', $request->id);
        }

        if ($request->payment_status != null) {
            $orders = $orders->where('payment', $request->payment_status);
        }


        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery', $request->delivery_status);
        }
        $orders = $orders->paginate(20);
        return view('checkout.order_list', compact('orders'));
    }

    public function checkout($post_id)
    {
        $post_details = Post::findorfail($post_id);
        if (!Auth::check()) {
            return redirect('login');
        }

        return appView('checkout.index', compact('post_details'));
    }

    public function order_confirm(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($request->post_id);
            $customer_name = \auth()->user()->name;
            $customer_phone = \auth()->user()->phone;

            $seller = User::findorfail($post->user_id);

            if ($post->selled == 1) {
                return back()->with('error', 'Already sold');
            }
            $order = new order();
            $order->post_id = $post->id;
            $order->user_id = \auth()->user()->id;
            $order->price = $post->price;
            $order->payment_method = $request->payment_method;
            $order->status = 0;
            $order->save();
            $post->selled = 1;
            $post->save();
            DB::commit();
            Mail::to(\auth()->user()->email)->send(new OrderProcessing(\auth()->user()->name, $order->id));
            // Example data
            $deleteLink = url('/') . 'account/posts/list' . $post->id . '/delete';
            // Send email
            Mail::to('creator@example.com')->send(new PostApproved($seller->name, $request->post_id, $deleteLink));
            $messageBody = "New Buy Request Alert!\n" .
                "Customer Name: $customer_name\n" .
                "Customer Phone: $customer_phone\n" .
                "Post_id/reference: $post->id\n" .
                "Please follow up with the customer for further details.";
            $twilio = new TwilioSMS();
            $twilio->sendSms($messageBody);
            return redirect()->route('order.confirmation', $order->id);


        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }


    }

    public function order_confirmation($order)
    {
        $order = order::find($order);
        $post = Post::find($order->post_id);
        return view('checkout.order_confirmation', compact('post'));
    }

    public function yes_list(Request $request)
    {
        $posts = Post::where('agree_with', 1)->orderBy('id', 'desc');

        if ($request->id != null) {
            $posts = $posts->where('id', $request->id);
        }

        if ($request->payment_status != null) {
            $posts = $posts->where('id', $request->id);
        }


        if ($request->delivery_status != null) {
            $posts = $posts->where('id', $request->id);
        }

        if ($request->sales_status != null) {
            $posts = $posts->where('selled', $request->sales_status);
        }

        $posts = $posts->paginate(30);


        return view('admin.panel.yes_list', compact('posts'));
    }

    public function no_list(Request $request)
    {
        $posts = Post::where('agree_with', 0)->orderBy('id', 'desc');
        if ($request->id != null) {
            $posts = $posts->where('id', $request->id);
        }

        if ($request->payment_status != null) {
            $posts = $posts->where('id', $request->id);
        }


        if ($request->delivery_status != null) {
            $posts = $posts->where('id', $request->id);
        }

        if ($request->sales_status != null) {
            $posts = $posts->where('selled', $request->sales_status);
        }
        $posts = $posts->paginate(30);
        return view('admin.panel.no_list', compact('posts'));
    }

    public function accounts()
    {
        $topBuyers = DB::table('orders')
            ->select('user_id', DB::raw('SUM(price) as total_spent'), DB::raw('COUNT(*) as order_count'))
            ->groupBy('user_id')
            ->orderBy('total_spent', 'DESC')
            ->limit(10)
            ->get();

        $userIds = $topBuyers->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');


        $topSellers = DB::table('posts')
            ->select('user_id', DB::raw('SUM(price) as total_sales'), DB::raw('COUNT(*) as total_selled'))
            ->where('selled', 1)
            ->groupBy('user_id')
            ->orderBy('total_sales', 'DESC')
            ->limit(10)
            ->get();

        $userIdss = $topSellers->pluck('user_id')->toArray();

        $userss = User::whereIn('id', $userIdss)->get()->keyBy('id');


        return view('admin.panel.accounts', compact('topBuyers', 'users', 'topSellers', 'userss'));
    }

    // public function blog()
    // {
    //     $blogs = blogpost::paginate(10);
    //     return view('admin.blog.index', compact('blogs'));
    // }
    
    
    public function blog()
{
    // Fetch blogs ordered by the most recent uploads
    $blogs = blogpost::orderBy('created_at', 'desc')->paginate(10);

    return view('admin.blog.index', compact('blogs'));
}


public function blog_store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:blogposts,slug',
        'description' => 'required|string',
        'meta_title' => 'nullable|string|max:255', // Meta Title
        'meta_description' => 'nullable|string', // Meta Description
        'meta_keywords' => 'nullable|string', // Meta Keywords
        'og_title' => 'nullable|string|max:255', // OG Title
        'og_description' => 'nullable|string', // OG Description
        'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // OG Image
        'og_type' => 'nullable|string|max:255', // OG Type
        'og_url' => 'nullable|url', // OG URL
        'photo' => 'nullable|image|max:2048', // Main Blog Image
    ]);

    // Create a new blog post instance
    $blog = new Blogpost();
    $blog->title = $request->title;
    $blog->slug = $request->slug; // Ensure slug is saved
    $blog->description = $request->description;

    // Save the meta tags if they are provided, otherwise use defaults
    $blog->meta_title = $request->meta_title ?? $request->title; // Default meta title is the blog's title if not provided
    $blog->meta_description = $request->meta_description ?? $request->description; // Default meta description is the blog's description if not provided
    $blog->meta_keywords = $request->meta_keywords; // Meta keywords

    // Save the OG tags if they are provided, otherwise use defaults
    $blog->og_title = $request->og_title ?? $request->title; // Default OG title is the blog's title if not provided
    $blog->og_description = $request->og_description ?? $request->description; // Default OG description is the blog's description if not provided
    $blog->og_type = $request->og_type ?? 'article'; // Default OG type is 'article'
    $blog->og_url = $request->og_url ?? url()->current(); // Default OG URL is the current page URL

    // Handle file upload for OG image
    if ($request->hasFile('og_image')) {
        $ogImagePath = $request->file('og_image')->store('og_images', 'public');
        $blog->og_image = $ogImagePath; // Save OG image path
    }

    // Handle file upload for the main blog image
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('blog_img', 'public');
        $blog->photo = $path; // Save main blog image path
    }

    // Save the blog post to the database
    $blog->save();

    // Redirect back with a success message
    return back()->with('message', 'Blog Successfully Created');
}




public function update(Request $request, $id)
{
    $blog = Blogpost::findOrFail($id);

    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:blogposts,slug,' . $id, // Allow unique slug except for the current blog
        'description' => 'required|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'og_title' => 'nullable|string|max:255',
        'og_description' => 'nullable|string',
        'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'og_type' => 'nullable|string|max:255',
        'og_url' => 'nullable|url',
        'photo' => 'nullable|image|max:2048',
    ]);

    // Update the blog attributes
    $blog->title = $request->input('title');
    $blog->slug = $request->input('slug');
    $blog->description = $request->input('description');
    $blog->meta_title = $request->input('meta_title');
    $blog->meta_description = $request->input('meta_description');
    $blog->meta_keywords = $request->input('meta_keywords');
    $blog->og_title = $request->input('og_title');
    $blog->og_description = $request->input('og_description');
    $blog->og_type = $request->input('og_type');
    $blog->og_url = $request->input('og_url');

    // Handle OG Image upload
    if ($request->hasFile('og_image')) {
        // Delete old OG image if it exists
        if ($blog->og_image && Storage::exists('public/' . $blog->og_image)) {
            Storage::delete('public/' . $blog->og_image);
        }

        // Store new OG image
        $ogImagePath = $request->file('og_image')->store('og_images', 'public');
        $blog->og_image = $ogImagePath;
    }

    // Handle main blog photo upload
    if ($request->hasFile('photo')) {
        // Delete old photo if it exists
        if ($blog->photo && Storage::exists('public/' . $blog->photo)) {
            Storage::delete('public/' . $blog->photo);
        }

        // Store new photo
        $photoPath = $request->file('photo')->store('blog_img', 'public');
        $blog->photo = $photoPath;
    }

    // Save the updated blog
    $blog->save();

    return back()->with('message', 'Blog Successfully Updated');
}



    public function blog_post_delete($id)
    {
        $photo_gallery = blogpost::findorfail($id);
        $path = storage_path('app/public') . '/' . $photo_gallery->photo;
        if (file_exists($path)) {
            unlink($path);
        }
        $photo_gallery->delete();
        return back()->with('message', 'Blog Successfully Deleted');
    }


        public function blog_show()
    {
        $blogs = blogpost::query()->whereRaw('1 = 0')->paginate(15);
        return view('pages.blog', compact('blogs'));
    }

    
//     public function blog_show()
// {
//     // Fetch blogs ordered by the most recent uploads
//     $blogs = blogpost::orderBy('created_at', 'desc')->paginate(15);
//     $og = null;

//     return view('pages.blog', compact('blogs', 'og'));
// }
    
 public function single_blog($slug)
{
    $blog = Blogpost::where('slug', $slug)->firstOrFail();
    $recent_blogs = Blogpost::latest()->take(5)->get();

    return view('pages.single_blog', [
        'blog' => $blog,
        'recent_blogs' => $recent_blogs,
        'meta_title' => $blog->title,
        'meta_description' => Str::limit(strip_tags($blog->description), 150),
        'meta_image' => asset('storage/' . $blog->photo)
    ]);
}


public function sitemap()
{
    // Get all blog posts
    $blogs = Blogpost::all();
    
    // Return the view with blogs data
    return response()->view('sitemap', compact('blogs'))
        ->header('Content-Type', 'text/xml');
}


public function showOfferSubmissions()
{  $submissions = OfferSubmission::paginate(10);

    return view('admin.offer-submissions', compact('submissions'));
} 

//     public function single_blog($slug)
// {
//     $blog = blogpost::whereRaw("REPLACE(LOWER(title), ' ', '-') = ?", [$slug])->firstOrFail();
//     $recent_blogs = blogpost::where('id', '!=', $blog->id)->get();
    
//     return view('pages.single_blog', compact('blog', 'recent_blogs'));
// }

// public function single_blog($id)
    // {
    //     $blog = blogpost::findorfail($id);
    //     $recent_blogs = blogpost::where('id', '!=', $id)->get();
    //     return view('pages.single_blog', compact('blog', 'recent_blogs'));
    // }
    

}
