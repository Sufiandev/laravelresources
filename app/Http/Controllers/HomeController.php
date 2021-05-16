<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Model\Settings;
use App\Model\Slider;
use App\Model\Menu;
use App\Model\Blog;
use App\Model\Categories;
use App\Model\ContactForm as Contact;
use App\Model\Resources\Project;
use App\Model\Resources\Applications;
use App\Model\Resources\Products;
use App\Model\Resources\Patners;
use App\Model\Resources\Career;

use Helper;

class HomeController extends Controller
{
    public function index()
    {
      $data = [
            'settings'  => Settings::find(1),
            'slider'	=> Slider::where('display','yes')->orderBy('displayOrder')->get(),
            'page'		=> Menu::where('slug','home')->first(),
            'projects'	=> Project::where('display','yes')->orderBy('created_at','desc')->take(4)->get(),
            'patners'	=> Patners::orderBy('created_at','desc')->take(8)->get()
        ];
        return view('home',$data);
    }
    public function products()
    {
    	$data = [
            'settings'  => Settings::find(1),
            'page'		=> Menu::where('slug','products')->first(),
            'products'	=> Products::where('display','yes')->orderBy('created_at','desc')->get(),
            'categories'=> Categories::all(),
        ];
        return view('resources.products',$data);
    }
    public function products_view($slug)
    {
    	$product = Products::where('slug',$slug)->first();
    	if ($product)
    	{
	    	$data = [
	            'settings'  => Settings::find(1),
	            'page'		=> $product,
	        ];
	        return view('resources.products_view',$data);
    	}
    	else
    		return 'Product Not found';
    }
    public function product_download($id)
    {
    	$product = Products::findOrFail($id);
    	return Storage::download($product->file);

    }
    public function projects()
    {
    	$data = [
            'settings'  => Settings::find(1),
            'page'		=> Menu::where('slug','projects')->first(),
            'projects'	=> Project::where('display','yes')->orderBy('created_at','desc')->get(),
        ];
        return view('resources.projects',$data);
    }
    public function projects_view($slug)
    {
    	$record = Project::where('slug',$slug)->first();
    	if ($record)
    	{
	    	$data = [
	            'settings'  => Settings::find(1),
	            'project'	=> $record,
            	'page'		=> Menu::where('slug','projects')->first(),

	        ];
	        return view('resources.projects_view',$data);
    	}
    	else
    		return 'Project Not found';
    }
    public function blog()
    {
    	$data = [
            'settings'  => Settings::find(1),
            'page'		=> Menu::where('slug','blog')->first(),
            'blogs'	=> Blog::where('display','yes')->orderBy('created_at','desc')->paginate(10),
        ];
        return view('resources.blog',$data);
    }
    public function blog_view($id)
    {
    	$record = Blog::findOrFail($id);
    	if ($record)
    	{
	    	$data = [
	            'settings'  => Settings::find(1),
	            'blog'	=> $record,
            	'page'		=> Menu::where('slug','blog')->first(),
            	'blogs'	=> Blog::where('display','yes')->orderBy('created_at','desc')->take(3)->get(),


	        ];
	        return view('resources.blog_view',$data);
    	}
    	else
    		return 'Project Not found';
    }
    public function career()
    {
    	$data = [
            'settings'  => Settings::find(1),
            'page'      => Menu::where('slug','career')->first(),
            'career'    => Career::where('display','yes')->orderBy('created_at','desc')->get(),
            'bladeType'  => 'career'
        ];
        // dd($data['career']);
        return view('resources.career',$data);
    }
    public function show_apply_form()
    {
        $data = [
            'settings'  => Settings::find(1),
            'page'      => Menu::where('slug','career')->first(),
            'career'    => Career::where('display','yes')->orderBy('created_at','desc')->get(),
            'bladeType'  => 'career_apply'
        ];
        return view('resources.career',$data);
    }
    public function apply(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'phone'=> 'required|numeric',
            'email'=> 'required|email',
            'qualification' => 'required',
            'files' => 'mimes:jpeg,png,jpg,gif,svg,docx,pdf,doc|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect('/apply#form_errors')
                        ->withErrors($validator)
                        ->withInput();
        }
         if ($request->hasFile('files')) {
            $request['file'] = $request->file('files')->store('uploads');
        }

        Applications::create($request->all());
        return redirect('/apply#form_errors')->with('success','Your message have been submitted successfully.');
    }

    public function contact()
    {
    	$data = [
            'settings'  => Settings::find(1),
            'page'		=> Menu::where('slug','contact')->first(),
        ];
        return view('resources.contact',$data);
    }
    public function contact_form_submit(Request $request)
    {
       $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/contact#contact_form')
                        ->withErrors($validator)
                        ->withInput();
        }

        Contact::create($request->all());
        return redirect('/contact#contact_form')->with('success','Your message have been submitted successfully.');

    }
    public function pages($pageSlug)
    {

    	$pageData = Menu::where('slug',$pageSlug)->first();
    	// dd($pageData);
    	if ($pageData)
    	{
	    	$data = [
	            'settings'  => Settings::find(1),
	            'page'	=> $pageData,
	            'blogs'		=> Blog::where('display','yes')->orderBy('created_at','desc')->take(3)->get()
        	];
        	return view('dynamic',$data);
    	}
    	else
    	{
    		return 'page not found';
    	}
    }

}
