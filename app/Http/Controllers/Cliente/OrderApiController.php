<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
class OrderApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Order::where('user_id','=',Auth::id())->orderByDesc('id')->get();
        return view("cliente.pedido.pedidos",compact("pedidos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cliente.pedido.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            'ruta'=>'required',
        ];
        $date = Carbon::now();
        $this->validate($request, $rules);
        $dataPedido = $request->except("_token");
        $dataPedido["fecha"]=$date;
        $dataPedido["estatus"]="0";
        $dataPedido["user_id"]=Auth::id();
        $type = "danger";
        $message ="Error al Insertar pedido";
        if (Order::create($dataPedido)) {
            $type = "success";
            $message ="Pedido creada correctamente";
        }
        return redirect()->route('apipedidos.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function agregarproductos($id){
        $idPedido = $id;
        $productosPedido= Order::find($id);

        return view('cliente.pedido.agregarproductos',compact(['idPedido','productosPedido']));
    }

    public function agregarproductospedido(Request $request){

        if($request->ajax()){
            $almacen= Warehouse::where('product_id','=',$request->product_id)->get();
            $pedido= Order::find($request->order_id);
            $dataStock["stock"] = $almacen[0]->stock - $request->cantidad;
            $dataStock["monto"] = $almacen[0]->monto - $request->monto;
            $editarPedidoProducto = $pedido->products->where('id','=',$request->product_id);
            if(count($editarPedidoProducto) > 0){
                $editarPedidoProducto[0]->pivot->cantidad = $editarPedidoProducto[0]->pivot->cantidad + $request->cantidad;
                $editarPedidoProducto[0]->pivot->monto = $editarPedidoProducto[0]->pivot->monto + $request->monto;
                //return response()->json($editarPedidoProducto[0]->pivot->cantidad);
                $editarPedidoProducto[0]->pivot->save();
                Warehouse::where("product_id",'=',$request->product_id)->update($dataStock);
                return response()->json("producto en pedido y actualizado");
            }else{
                $pedido->products()->attach($request->product_id,['cantidad'=>$request->cantidad, 'monto'=>$request->monto]);
                Warehouse::where("product_id",'=',$request->product_id)->update($dataStock);
                return response()->json("Producto agregado al pedido");
            }
        }
    }

    public function terminarpedido($id){
        $idPedido= $id;
        $pedido= Order::find($id);
        $pdf = PDF::loadview('pdf.pedido',compact(['pedido','idPedido']));
        $dataPedido["estatus"]= "1";
        Order::where("id",'=',$id)->update($dataPedido);
        //$pdf->download("pedido-lista.pdf");
        //return redirect()->route('apipedidos.index');
        return $pdf->download("pedido-lista.pdf");
    }

    public function quitarProducto($idPedido,$idProducto){
            $almacen= Warehouse::where('product_id','=',$idProducto)->get();
            $pedido= Order::find($idPedido);
            $editarPedidoProducto = $pedido->products->where('id','=',$idProducto);
            $dataStock["stock"] = $almacen[0]->stock + 1;
            $dataStock["monto"] = $almacen[0]->monto + $editarPedidoProducto[0]->pivot->monto;

                if(count($editarPedidoProducto) > 0){
                    if($editarPedidoProducto[0]->pivot->cantidad >1){
                        $editarPedidoProducto[0]->pivot->cantidad = $editarPedidoProducto[0]->pivot->cantidad - 1;
                        $editarPedidoProducto[0]->pivot->monto = $editarPedidoProducto[0]->pivot->monto - $editarPedidoProducto[0]->price->unitario;
                        //return response()->json($editarPedidoProducto[0]->pivot->cantidad);
                        $editarPedidoProducto[0]->pivot->save();
                        Warehouse::where("product_id",'=',$idProducto)->update($dataStock);
                        return back();

                    }else if($editarPedidoProducto[0]->pivot->cantidad == 1){
                         $editarPedidoProducto[0]->pivot->cantidad = $editarPedidoProducto[0]->pivot->cantidad - 1;
                        $editarPedidoProducto[0]->pivot->monto = $editarPedidoProducto[0]->pivot->monto - $editarPedidoProducto[0]->price->unitario;
                        //return response()->json($editarPedidoProducto[0]->pivot->cantidad);
                        $editarPedidoProducto[0]->pivot->save();
                        Warehouse::where("product_id",'=',$idProducto)->update($dataStock);
                        $editarPedidoProducto[0]->pivot->delete();
                        return back();

                    }
                }

    }
}
