<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class IndexController extends Controller
{
    public function index(){
        $pedidos = Order::where("estatus","=","1")->get();
        return view("admin.index",compact("pedidos"));
    }
}
