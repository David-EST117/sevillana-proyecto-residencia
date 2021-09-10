<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::all();


        return view("admin.cliente.clientes",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cliente.agregar");
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
            'name'=>'required|string',
            'apellidoP'=>'required|string',
            'apellidoM'=>'string',
            'direccion'=>'required',
            'telefono'=>'required',
             'email' => ['required', 'string', 'email', 'max:35', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $this->validate($request, $rules);
        $date = Carbon::now();
        $user = new User();
        $user->name = $request->name;
        $user->apellidoP = $request->apellidoP;
        $user->apellidoM = $request->apellidoM;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->tipo= $request->tipo;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);

         $type = "danger";
        $message ="Error al crear cliente";
        if($cliente = User::create([
                'name' => $user->name,
                'apellidoP' => $user->apellidoP,
                'apellidoM' =>$user->apellidoM,
                'direccion' =>$user->direccion,
                'telefono' => $user->telefono,
                'tipo' =>$user->tipo ,
                'email' =>  $user->email,
                'created_at'=>$date->format('Y-m-d'),
                'password' => $user->password
            ])){
            $cliente->assignRole('cliente');
            $type = "success";
            $message ="Cliente creado correctamente";
        }



        return redirect()->route('clientes.index')->with(['type'=>$type, 'message'=> $message]);

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
        $cliente = User::find($id);
        return view('admin.cliente.ver',compact('cliente'));
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
}
