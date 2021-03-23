<?php

namespace App\Http\Controllers;
use App\Exports\MarimbasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Marimba;
use App\Models\Condition;
use App\Models\Ubication;
use App\Http\Requests\Marimba\AddRequest;
use App\Http\Requests\Marimba\UpdateRequest;
use Illuminate\Http\Request;

class MarimbaController extends Controller
{
    public function index()
    {

        $marimbas = Marimba::latest()->get();
        return view("admin.marimbas.index",compact("marimbas"));
    }

    public function create()
    {
        $conditions = Condition::latest()->get();
        $ubications = Ubication::latest()->get();
        return view("admin.marimbas.add",compact(["conditions","ubications"]));
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Marimba::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("marimbas.index")->with(['type'=>$type,'message'=>$message]);
    }
    
    public function show($id){
      $marimba = Marimba::find($id);
      return view("admin.marimbas.show",compact('marimba'));
    }


    public function edit(Marimba $ubication,$id)
    { 
      $conditions = Condition::latest()->get();
      $ubications = Ubication::latest()->get();
      $marimba = Marimba::find($id);
      return view('admin.marimbas.edit',compact(['marimba','conditions','ubications']));
    }

    
    public function update(UpdateRequest $request, $id)
    {   
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Marimba::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("marimbas.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        
    }

    public function exportExcelMarimba() 
    {
        return Excel::download(new MarimbasExport, 'marimbas.xlsx');
    }

    public function delete(Request $request, $id)
    {
			if($request->ajax()){
			      Marimba::destroy($id);
            $total = Marimba::all()->count();

            return response()->json([
                'total' => $total,
                'message' => ""
            ]);
        }
  	}
}
