<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedorAgregarRequest;
use App\Http\Requests\ProveedorEditarRequest;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores= Provider::orderBy('id','desc')->get();
        return view('admin.proveedor.proveedores',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedor.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorAgregarRequest $request)
    {
        $dataProvider = $request->except("_token");
        $type = "danger";
        $message ="Error al Insertar proveedor";
        if (Provider::create($dataProvider)) {
            $type = "success";
            $message ="Proveedor creada correctamente";
        }
        return redirect()->route('proveedores.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Provider::find($id);
        return view('admin.proveedor.ver',compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Provider::find($id);
        return view('admin.proveedor.editar',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorEditarRequest $request, $id)
    {
        $dataProvider = $request->except(["_token","_method"]);
        $type = "danger";
        $message ="Error al Editar proveedor";
        if (Provider::where("id",'=',$id)->update($dataProvider)) {
            $type = "success";
            $message ="Proveedor editada correctamente";
        }
        return redirect()->route('proveedores.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Provider::find($id);
        $proveedor->delete();
    }
}
