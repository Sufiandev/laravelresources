<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Image;
use Helper;




class CmsUser extends Controller
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
            'menu'  => 'cmsuser',
            'settings'  => DB::table('settings')->find(1),
            'data'  => Admin::all()
        ];

        return view('admin.cms_user',$data);
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
                'email' => 'required|unique:admins',
                'password'  => 'required|min:4',
                'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files')) {
            $originalImage = $request->file('files');
             $request['image']  = Helper::processImage($originalImage,TRUE);
        }
        $request['password'] = Hash::make($request->input('password'));
        $admin = Admin::create($request->all());
      
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
        $data['viewType'] = 'editCmsUser';
        $data['data'] = Admin::findOrFail($id);
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
        $admin = Admin::findOrFail($id);

        $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:admins,email,'.$id,
            ]);
     
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files'))
        {
            $originalImage = $request->file('files');
            $request['image']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$admin->image);
            
        }
        if($request->input('password') != "")
            $request['password'] = Hash::make($request->input('password'));
        else
            unset($request['password']);

        
        $admin->update($request->all());
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
        $admin = Admin::findOrFail($id);
        Helper::UnlinkImage(public_path('images'),$admin->image);
        $admin->delete();
        return back()->with('success','Record Deleted successfully');

    }
}