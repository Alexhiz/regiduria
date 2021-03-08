<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\Unit\AddRequest;
use App\Http\Requests\Unit\UpdateRequest;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->get();
        return view("admin.unidades.index",compact("units"));
    }

    public function create()
    {
        return view("admin.unidades.add");
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Unit::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("unidades.index")->with(['type'=>$type,'message'=>$message]);
    }


    public function edit(Unit $unit,$id)
    { 
      $unit = Unit::find($id);
      return view('admin.unidades.edit',compact('unit'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Unit::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("unidades.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->route('unidades.index');
    }
}
