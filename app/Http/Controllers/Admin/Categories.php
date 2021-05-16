<?php

namespace App\Http\Controllers\Admin;

use App\Model\Categories as Cats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Image;
use Helper;




class Categories extends Controller
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
            'menu'  => 'categories',
            'settings'  => DB::table('settings')->find(1),
            'data'  => Cats::all()
        ];
        return view('admin.categories',$data);
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
                'cat_name' => 'required',
                'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files')) {
            $originalImage = $request->file('files');
             $request['cat_image']  = Helper::processImage($originalImage,TRUE);
        }
        
        $admin = Cats::create($request->all());
      
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
        $data['viewType'] = 'editCategory';
        $data['data'] = Cats::findOrFail($id);
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
        $id =  $request->input('cat_id');
        $cat = Cats::findOrFail($id);

        $validator = \Validator::make($request->all(), [
                'cat_name' => 'required',
            ]);
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files'))
        {
            $originalImage = $request->file('files');
            $request['cat_image']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$cat->cat_image);
            
        }
        
        $cat->update($request->all());
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
        $record = Cats::findOrFail($id);
        Helper::UnlinkImage(public_path('images'),$record->cat_image);
        $record->delete();
        return back()->with('success','Record Deleted successfully');

    }
}