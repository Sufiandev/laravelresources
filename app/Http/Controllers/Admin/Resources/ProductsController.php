<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Model\Resources\Products as Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Image;
use Helper;

class ProductsController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
         $data = [
            'menu'  => 'products',
            'settings'  => DB::table('settings')->find(1),
            'data'  => Product::all()
        ];

        return view('admin.resources.products',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'files2' => 'mimes:jpeg,png,jpg,gif,svg,docx,pdf,doc|max:4096',
            ]);
     	
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        

        if ($request->hasFile('files')) {
            $originalImage = $request->file('files');
             $request['image']  = Helper::processImage($originalImage,TRUE);
        }
        if ($request->hasFile('files2')) {
        	$request['file'] = $request->file('files2')->store('products');
        }
         $request['slug'] = Helper::cleanSlug($request->input('name'));
        Product::create($request->all()); 

        return response()->json(['success'=>'Record is successfully added']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['viewType'] = 'editProduct';
        $data['data'] = Product::findOrFail($id);

         // return $url = Storage::download($data['data']->file);
        return view('admin.called.basic',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id =  $request->input('id');
        $record = Product::findOrFail($id);
			$validator = \Validator::make($request->all(), [
                'name' => 'required',
                'files' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'files2' => 'mimes:jpeg,png,jpg,gif,svg,docx,pdf,doc|max:4096',
            ]);
     	
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files'))
        {
            $originalImage = $request->file('files');
            $request['image']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$record->image);
        }
        if ($request->hasFile('files2')) {
        	Storage::delete($record['file']);
        	$request['file'] = $request->file('files2')->store('products');
        }
         $request['slug'] = Helper::cleanSlug($request->input('name'));
        $record->update($request->all());
        return response()->json(['success'=>'Action success']); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Product::findOrFail($id);
        Helper::UnlinkImage(public_path('images'),$record->image);
        if(!is_null($record['file']))
        	Storage::delete($record['file']);
        $record->delete();
        return back()->with('success','Record Deleted successfully');

    }
}