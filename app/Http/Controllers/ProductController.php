<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;
use App\Models\Price;
use App\Models\Provider;
use App\Models\Warehouse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos= Product::orderBy('id','desc')->get();
        return view("admin.producto.productos",compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= Category::orderBy('id','desc')->get();
        $departamentos= Department::orderBy('id','desc')->get();
        $proveedores= Provider::orderBy('id','desc')->get();
        return view('admin.producto.agregar',compact(['categorias','departamentos','proveedores']));
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
            'nombre'=>'required|unique:products',
            'imagen'=>'required|image|mimes:jpeg,jpg,png',
            'descripcion'=>'max:500',
            'category_id'=>'required',
            'department_id'=>'required',
            'provider_id'=>'required',
            'mayoreo' =>'required',
            'menudeo' =>'required',
            'unitario' =>'required',
            'oferta' =>'required',
            'fecha_inicial' =>'required',
            'fecha_final' =>'required',
            'stock'=>'required|integer',
        ];

        $this->validate($request, $rules);
         $type = "danger";
        $message ="Error al Insertar Producto";
        $precio = new Price();
        $precio->mayoreo = $request->mayoreo;
        $precio->menudeo = $request->menudeo;
        $precio->unitario = $request->unitario;
        $precio->oferta = $request->oferta;
        $precio->fecha_inicial = $request->fecha_inicial;
        $precio->fecha_final = $request->fecha_final;


        if($idPrecio = Price::insertGetId(
            ['mayoreo' => $precio->mayoreo,
            'menudeo' => $precio->menudeo,
            'unitario' => $precio->unitario,
            'oferta' => $precio->oferta,
            'fecha_inicial' => $precio->fecha_inicial,
            'fecha_final' => $precio->fecha_final,
            ]
        )){
            $producto = new Product();

            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->department_id = $request->department_id;
            $producto->category_id = $request->category_id;
            $producto->price_id = $idPrecio;
            if ($request->file('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImage = time() . $imagen->getClientOriginalName();
                $producto->imagen= '/productos/images/' . $nombreImage;
                $imagen->move(public_path() . '/productos/images/', $nombreImage);
            }
            if($idProducto = Product::insertGetId(
            ['nombre' =>$producto->nombre,
            'imagen' => $producto->imagen,
            'descripcion' => $producto->descripcion,
            'department_id' => $producto->department_id,
            'category_id' => $producto->category_id,
            'price_id' => $producto->price_id,
            ]
            )){
                 $almacen = new Warehouse();
                $almacen->stock = $request->stock;
                $almacen->monto = $request->stock * $request->unitario;
                $almacen->fecha = $request->fecha;
                $almacen->product_id = $idProducto;
                $almacen->provider_id = $request->provider_id;
                 if(Warehouse::insertGetId(
                    ['stock' =>$almacen->stock,
                    'monto' => $almacen->monto,
                    'fecha' =>$almacen->fecha,
                    'product_id'=>$almacen->product_id,
                    'provider_id'=>$almacen->provider_id
                    ]
                    )){
                        $type = "success";
                        $message ="Producto creada correctamente";
                    }

            }

        }
        return redirect()->route('productos.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Product::find($id);
        return view('admin.producto.ver',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $producto = Product::find($id);
        $categorias= Category::orderBy('id','desc')->get();
        $departamentos= Department::orderBy('id','desc')->get();
        $proveedores= Provider::orderBy('id','desc')->get();
        return view('admin.producto.editar',compact(['categorias','departamentos','proveedores','producto']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'nombre'=>'required',
            'imagen'=>'image|mimes:jpeg,jpg,png',
            'descripcion'=>'max:500',
            'category_id'=>'required',
            'department_id'=>'required',

        ];

        $this->validate($request, $rules);
        $productoFind = Product::find($id);

        $dataProduct = $request->except(["_token","_method"]);
        if ($request->file('imagen')) {
              $image_path = public_path() . $productoFind->imagen;
              if (File::exists($image_path)) File::delete($image_path);
                $imagen = $request->file('imagen');
                $nombreImage = time() . $imagen->getClientOriginalName();
                $dataProduct["imagen"]= '/productos/images/' . $nombreImage;
                $imagen->move(public_path() . '/productos/images/', $nombreImage);
        }

        $type = "danger";
        $message ="Error al Editar datos del producto";

        if (Product::where("id",'=',$id)->update($dataProduct)) {
            $type = "success";
            $message ="Datos del producto editada correctamente";
        }
        return redirect()->route('productos.edit',$id)->with(['type'=>$type, 'message'=> $message]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Product::find($id);
        $image_path = public_path() . $producto->imagen;
        if (File::exists($image_path)) File::delete($image_path);
        $producto->delete();
    }

    public function updatePrice(Request $request, $id){
     $rules = [
            'mayoreo' =>'required',
            'menudeo' =>'required',
            'unitario' =>'required',
            'oferta' =>'required',
            'fecha_inicial' =>'required',
            'fecha_final' =>'required',

        ];

        $this->validate($request, $rules);
         $type = "danger";
        $message ="Error al actualizar precios del Producto";
         $dataPrice = $request->except(["_token","_method"]);
         if (Price::where("id",'=',$id)->update($dataPrice)) {
            $type = "success";
            $message ="Precio del producto editada correctamente";
        }
        return redirect()->route('productos.edit',$id)->with(['type'=>$type, 'message'=> $message]);
    }
}
