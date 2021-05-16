<?php

namespace App\Http\Controllers\Admin;

use App\Model\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Image;
use Helper;

class SettingsController extends Controller
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
            'menu'  => 'settings',
            'settings'  => DB::table('settings')->find(1),
        ];
        return view('admin.settings',$data);
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
        $id =  1;
        $settings = Settings::findOrFail($id);
            $validator = \Validator::make($request->all(), [
                'siteName' => 'required',
                'files' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->hasFile('files'))
        {
            $originalImage = $request->file('files');
            $request['logo']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$settings->logo);
        }
        if ($request->hasFile('files2'))
        {
            $originalImage = $request->file('files2');
            $request['favicon']  = Helper::processImage($originalImage,TRUE);
            Helper::UnlinkImage(public_path('images'),$settings->favicon);
        }
        
        $settings->update($request->all());
        return response()->json(['success'=>'Action success']); 
        
    }
}