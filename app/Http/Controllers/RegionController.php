<?php

namespace App\Http\Controllers;
use App\Exports\RegionsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\Region\AddRequest;
use App\Http\Requests\Region\UpdateRequest;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::latest()->get();
        return view("admin.regiones.index",compact("regions"));
    }

    public function create()
    {
        return view("admin.regiones.add");
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Region::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("regiones.index")->with(['type'=>$type,'message'=>$message]);
    }


    public function edit(Region $unit,$id)
    { 
      $region = Region::find($id);
      return view('admin.regiones.edit',compact('region'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Region::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("regiones.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        return redirect()->route('regiones.index');
    }

    public function exportExcelRegion() 
    {
        return Excel::download(new RegionsExport, 'regiones.xlsx');
    }
}
