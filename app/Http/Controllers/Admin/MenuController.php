<?php

namespace App\Http\Controllers\Admin;

use App\Model\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Image;
use Helper;

class MenuController extends Controller
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
            'menu'  => 'menu',
            'settings'  => DB::table('settings')->find(1),
            'data'  => Menu::all()
        ];
        return view('admin.menu',$data);
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
                'slug' => 'required',
                'files' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
     	
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files')) {
            $originalImage = $request->file('files');
            $request['image']  = Helper::processImage($originalImage,TRUE);
        }

        if($request->input('displayOrder') == NULL)
        	$request['displayOrder'] = 0;

        $request['slug'] = Helper::cleanSlug($request->input('slug'));
        $request['position'] = implode(',', $request->input('position'));
        Menu::create($request->all()); 

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
        $data['viewType'] = 'editMenu';
        $data['data'] = Menu::findOrFail($id);
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
        $id =  $request->input('menu_id');
        $menu = Menu::findOrFail($id);
			$validator = \Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'files' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
     	
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files'))
        {
            $originalImage = $request->file('files');
            $request['image']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$menu->image);
            
        }
        if($request->input('displayOrder') == NULL)
        	$request['displayOrder'] = 0;

        $request['slug'] = Helper::cleanSlug($request->input('slug'));
        $request['position'] = implode(',', $request->input('position'));

        
        $menu->update($request->all());
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
        $record = Menu::findOrFail($id);
        Helper::UnlinkImage(public_path('images'),$record->image);
        $record->delete();
        return back()->with('success','Record Deleted successfully');

    }
}