<?php

namespace App\Http\Controllers;
use App\Exports\BandsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Band;
use App\Models\Condition;
use App\Models\Ubication;
use App\Http\Requests\Band\AddRequest;
use App\Http\Requests\Band\UpdateRequest;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {

        $bands = Band::latest()->get();
        return view("admin.bandas.index",compact("bands"));
    }

    public function create()
    {
        $conditions = Condition::latest()->get();
        $ubications = Ubication::latest()->get();
        return view("admin.bandas.add",compact(["conditions","ubications"]));
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Band::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("bandas.index")->with(['type'=>$type,'message'=>$message]);
    }
    
    public function show($id){
      $band = Band::find($id);
      return view("admin.bandas.show",compact('band'));
    }


    public function edit(Band $ubication,$id)
    { 
      $conditions = Condition::latest()->get();
      $ubications = Ubication::latest()->get();
      $band = Band::find($id);
      return view('admin.bandas.edit',compact(['band','conditions','ubications']));
    }

    
    public function update(UpdateRequest $request, $id)
    {   
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Band::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("bandas.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
      

    }

    public function exportExcelBand() 
    {
        return Excel::download(new BandsExport, 'bandas.xlsx');
    }

    public function delete(Request $request, $id)
    {
			if($request->ajax()){
			      Band::destroy($id);
            $total = Band::all()->count();

            return response()->json([
                'total' => $total,
                'message' => ""
            ]);
        }
  	}
}
