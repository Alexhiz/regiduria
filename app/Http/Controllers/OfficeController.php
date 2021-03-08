<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Condition;
use App\Models\Ubication;
use App\Http\Requests\Office\AddRequest;
use App\Http\Requests\Office\UpdateRequest;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {

        $offices = Office::latest()->get();
        return view("admin.oficinas.index",compact("offices"));
    }

    public function create()
    {
        $conditions = Condition::latest()->get();
        $ubications = Ubication::latest()->get();
        return view("admin.oficinas.add",compact(["conditions","ubications"]));
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Office::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("oficinas.index")->with(['type'=>$type,'message'=>$message]);
    }
    
    public function show($id){
      $office = Office::find($id);
      return view("admin.oficinas.show",compact('office'));
    }


    public function edit(Office $ubication,$id)
    { 
      $conditions = Condition::latest()->get();
      $ubications = Ubication::latest()->get();
      $office = Office::find($id);
      return view('admin.oficinas.edit',compact(['office','conditions','ubications']));
    }

    
    public function update(UpdateRequest $request, $id)
    {   
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Office::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("oficinas.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $office = Office::find($id);
        $office->delete();

        return redirect()->route('oficinas.index');
    }
}
