<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoAgregarRequest;
use App\Http\Requests\DepartamentoEditarRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos= Department::orderBy('id','desc')->get();
        return view('admin.departamento.departamentos',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departamento.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoAgregarRequest $request)
    {
        $dataDepartamento = $request->except("_token");
        $type = "danger";
        $message ="Error al Insertar departamento";
        if (Department::create($dataDepartamento)) {
            $type = "success";
            $message ="Departamento creada correctamente";
        }
        return redirect()->route('departamentos.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Department::find($id);
          return view('admin.departamento.ver',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department,$id)
    {
        $departamento = Department::find($id);
          return view('admin.departamento.editar',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoEditarRequest $request, $id)
    {
        $dataDepartamento = $request->except(["_token","_method"]);
        $type = "danger";
        $message ="Error al Editar departamento";
        if (Department::where("id",'=',$id)->update($dataDepartamento)) {
            $type = "success";
            $message ="Departamento editada correctamente";
        }
        return redirect()->route('departamentos.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Department::find($id);
        $departamento->delete();
    }
}
