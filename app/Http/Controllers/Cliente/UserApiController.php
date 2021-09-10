<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::where('id','=',$id)->get();
        return view("cliente.dato.editar",compact("user"));
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
        $rules = [
            'name'=>'required|string',
            'apellidoP'=>'required|string',
            'apellidoM'=>'string',
            'direccion'=>'required',
            'telefono'=>'required',

        ];

        $this->validate($request, $rules);
        $date = Carbon::now();
        $user = new User();
        $user->name = $request->name;
        $user->apellidoP = $request->apellidoP;
        $user->apellidoM = $request->apellidoM;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
         $type = "danger";
        $message ="Error al actualizar los datos";
        if($request->password == ""){
             if(User::where('id','=',$id)->update([
                'name' => $user->name,
                'apellidoP' => $user->apellidoP,
                'apellidoM' =>$user->apellidoM,
                'direccion' =>$user->direccion,
                'telefono' => $user->telefono
            ])){
            $type = "success";
            $message ="Actualizado correctamente";
        }
        }else{
            $user->password =  bcrypt($request->password);
             if(User::where('id','=',$id)->update([
                'name' => $user->name,
                'apellidoP' => $user->apellidoP,
                'apellidoM' =>$user->apellidoM,
                'direccion' =>$user->direccion,
                'telefono' => $user->telefono,
                'password' => $user->password
            ])){
            $type = "success";
            $message ="Actualizado correctamente";
        }

        }


        return back()->with(['type'=>$type, 'message'=> $message]);
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
}
