<?php

namespace App\Http\Controllers;

use App\Exports\UbicationsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Ubication;
use Illuminate\Http\Request;
use App\Http\Requests\Ubication\AddRequest;
use App\Http\Requests\Ubication\UpdateRequest;

class UbicationController extends Controller
{
    public function index()
    {
        $ubications = Ubication::latest()->get();
        return view("admin.ubicaciones.index",compact("ubications"));
    }

    public function create()
    {
        return view("admin.ubicaciones.add");
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Ubication::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("ubicaciones.index")->with(['type'=>$type,'message'=>$message]);
    }


    public function edit(Ubication $ubication,$id)
    { 
      $ubication = Ubication::find($id);
      return view('admin.ubicaciones.edit',compact('ubication'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Ubication::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("ubicaciones.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        
    }

    public function exportExcelUbication() 
    {
        return Excel::download(new UbicationsExport, 'ubicaciones.xlsx');
    }

    public function delete(Request $request, $id)
    {
			if($request->ajax()){
			      Ubication::destroy($id);
            $total = Ubication::all()->count();

            return response()->json([
                'total' => $total,
                'message' => ""
            ]);
        }
  	}
}
