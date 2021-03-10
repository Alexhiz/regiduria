<?php

namespace App\Http\Controllers;
use App\Exports\LudotecasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ludoteca;
use App\Models\Condition;
use App\Models\Ubication;
use App\Http\Requests\Ludoteca\AddRequest;
use App\Http\Requests\Ludoteca\UpdateRequest;
use Illuminate\Http\Request;

class LudotecaController extends Controller
{
    public function index()
    {

        $ludotecas = Ludoteca::latest()->get();
        return view("admin.ludotecas.index",compact("ludotecas"));
    }

    public function create()
    {
        $conditions = Condition::latest()->get();
        $ubications = Ubication::latest()->get();
        return view("admin.ludotecas.add",compact(["conditions","ubications"]));
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Ludoteca::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("ludotecas.index")->with(['type'=>$type,'message'=>$message]);
    }
    
    public function show($id){
      $ludoteca = Ludoteca::find($id);
      return view("admin.ludotecas.show",compact('ludoteca'));
    }


    public function edit(Ludoteca $ubication,$id)
    { 
      $conditions = Condition::latest()->get();
      $ubications = Ubication::latest()->get();
      $ludoteca = Ludoteca::find($id);
      return view('admin.ludotecas.edit',compact(['ludoteca','conditions','ubications']));
    }

    
    public function update(UpdateRequest $request, $id)
    {   
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Ludoteca::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("ludotecas.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $ludoteca = Ludoteca::find($id);
        $ludoteca->delete();

        return redirect()->route('ludotecas.index');
    }

    public function exportExcelLudoteca() 
    {
        return Excel::download(new LudotecasExport, 'ludotecas.xlsx');
    }
}
