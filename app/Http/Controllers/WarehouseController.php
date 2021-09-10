<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Warehouse::orderBy('id','desc')->get();
        return view("admin.almacen.almacenes",compact('almacenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse,$id)
    {
        $almacen = Warehouse::find($id);
        $proveedores = Provider::all();
        return view("admin.almacen.editar",compact(["proveedores","almacen"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'provider_id'=>'required',
            'stock'=>'required|integer',
        ];
        $this->validate($request, $rules);
        $dataAlmacen = $request->except(["_token","_method"]);
        $almacen = Warehouse::find($id);
        $productoPrecio = $almacen->product->price->unitario;
        $dataAlmacen["monto"]=$dataAlmacen["stock"] * $productoPrecio;
        $type = "danger";
        $message ="Error al Editar en almacen";
        if (Warehouse::where("id",'=',$id)->update($dataAlmacen)) {
            $type = "success";
            $message ="Almacen del producto editada correctamente";
        }
        return redirect()->route('almacenes.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacen = Warehouse::find($id);
        $producto = Product::find($almacen->product_id);
        $precio = Price::find($producto->price_id);
        $image_path = public_path() . $producto->imagen;
        if (File::exists($image_path)) File::delete($image_path);
        $producto->delete();
        $precio->delete();
        $almacen->delete();

    }
}
