<?php

namespace App\Http\Controllers;

use App\Models\Lockerroom;
use App\Models\Unit;
use App\Models\Region;
use App\Models\Condition;
use App\Models\Ubication;
use App\Http\Requests\Lockerroom\AddRequest;
use App\Http\Requests\Lockerroom\UpdateRequest;
use Illuminate\Http\Request;

class LockerroomController extends Controller
{
    public function index()
    {

        $lockerrooms = Lockerroom::latest()->get();
        return view("admin.vestuarios.index",compact("lockerrooms"));
    }

    public function create()
    {
        $units = Unit::latest()->get();
        $regions = Region::latest()->get();
        $conditions = Condition::latest()->get();
        $ubications = Ubication::latest()->get();
        return view("admin.vestuarios.add",compact(["conditions","ubications","units","regions"]));
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Lockerroom::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("vestuarios.index")->with(['type'=>$type,'message'=>$message]);
    }
    
    public function show($id){
      $lockerroom = Lockerroom::find($id);
      return view("admin.vestuarios.show",compact('lockerroom'));
    }


    public function edit(Lockerroom $ubication,$id)
    { 
      $units = Unit::latest()->get();
      $regions = Region::latest()->get();
      $conditions = Condition::latest()->get();
      $ubications = Ubication::latest()->get();
      $lockerroom = Lockerroom::find($id);
      return view('admin.vestuarios.edit',compact(['lockerroom','conditions','ubications',"units","regions"]));
    }

    
    public function update(UpdateRequest $request, $id)
    {   
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Lockerroom::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("vestuarios.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $lockerroom = Lockerroom::find($id);
        $lockerroom->delete();

        return redirect()->route('vestuarios.index');
    }
}
