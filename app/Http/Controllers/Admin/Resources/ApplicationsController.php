<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Model\Resources\Applications as MClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Helper;

class ApplicationsController extends Controller
{
 
 	// Not resuable for images
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
            'menu'  => 'applications',
            'settings'  => DB::table('settings')->find(1),
            'data'  => MClass::all()
        ];
        return view('admin.resources.applications',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadApplication($id)
    {
        $record = MClass::findOrFail($id);
        return Storage::download($record['file']);
    }
    public function destroy($id)
    {
        $record = MClass::findOrFail($id);
        if(!is_null($record['file']))
            Storage::delete($record['file']);
        $record->delete();
        return back()->with('success','Record Deleted successfully');

    }
}