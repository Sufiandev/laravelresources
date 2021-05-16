<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Model\Resources\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Image;
use Helper;

class ProjectController extends Controller
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
            'menu'  => 'projects',
            'settings'  => DB::table('settings')->find(1),
            'data'  => Project::all()
        ];
        return view('admin.resources.project',$data);
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
                'details' => 'required',
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
        $request['slug'] = str_slug($request->input('name'));
        $request['position'] = 'home';
        Project::create($request->all()); 

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
        $data['viewType'] = 'editProject';
        $data['data'] = Project::findOrFail($id);
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
        $record = Project::findOrFail($id);
			$validator = \Validator::make($request->all(), [
                'name' => 'required',
                'details' => 'required',
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
            Helper::UnlinkImage(public_path('images'),$record->image);
            
        }
        $request['slug'] = str_slug($request->input('name'));
        

        
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
        $record = Project::findOrFail($id);
        Helper::UnlinkImage(public_path('images'),$record->image);
        $record->delete();
        return back()->with('success','Record Deleted successfully');

    }
}