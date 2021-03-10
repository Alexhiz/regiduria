<?php

namespace App\Http\Controllers;
use App\Exports\ConditionsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\Condition\AddRequest;
use App\Http\Requests\Condition\UpdateRequest;
class ConditionController extends Controller
{
    
    public function index()
    {
        $conditions = Condition::latest()->get();
        return view("admin.estado.index",compact("conditions"));
    }

    public function create()
    {
        return view("admin.estado.add");
    }

    public function store(AddRequest $request)
    {
        $data = $request->except("_token");
        $message = "Error al insertar datos";
        $type="danger";
        if(Condition::create($data)){
          $message = "Agregado correctamente";
          $type="success";
        }
        return redirect()->route("estados.index")->with(['type'=>$type,'message'=>$message]);
    }


    public function edit(Condition $condition,$id)
    { 
      $condition = Condition::find($id);
      return view('admin.estado.edit',compact('condition'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $message = "Error al editar datos";
        $type="danger";
        if(Condition::where('id','=',$id)->update($data)){
          $message = "Editado correctamente";
          $type="success";
        }
        return redirect()->route("estados.edit",$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function destroy($id)
    {
        $condition = Condition::find($id);
        $condition->delete();

        return redirect()->route('estados.index');
    }

    public function exportExcelCondition() 
    {
        return Excel::download(new ConditionsExport, 'estados.xlsx');
    }
}
