<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaAgregarRequest;
use App\Http\Requests\CategoriaEditarRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categorias= Category::orderBy('id','desc')->get();
        return view('admin.categoria.categorias',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaAgregarRequest $request)
    {
        $dataCategory = $request->except("_token");
        $type = "danger";
        $message ="Error al Insertar categoria";
        if (Category::create($dataCategory)) {
            $type = "success";
            $message ="Categoría creada correctamente";
        }
        return redirect()->route('categorias.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $categoria = Category::find($id);
          return view('admin.categoria.ver',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
         $categoria = Category::find($id);
          return view('admin.categoria.editar',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaEditarRequest  $request, $id)
    {
        
        $dataCategory = $request->except(["_token","_method"]);
        $type = "danger";
        $message ="Error al Editar categoria";
        if (Category::where("id",'=',$id)->update($dataCategory)) {
            $type = "success";
            $message ="Categoría editada correctamente";
        }
        return redirect()->route('categorias.index')->with(['type'=>$type, 'message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category = Category::find($id);
        $category->delete();
    }


}
