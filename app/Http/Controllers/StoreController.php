<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Cache\Console\ForgetCommand;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Método vista login

    public function login(){
        try {
            return view("login");
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
    
    //Al ser variables enviadas desde el form, utilizamos el request
    public function loginProc(Request $request){
        try {
            //recogemos los datos, teniendo exepciones, como el token que utiliza laravel y el método
            $userId = $request->except('_token', '_method');
            //Hacemos la consulta con la DB, la cual contará nuestros resultados como un boleano
            $userId = DB::table('tbl_usuario')->where('email_us', '=', $userId['email_us'])->where('pass_us', '=', $userId['pass_us'])->where('rol_us', '=', 'Admin')->count();
            //En caso de que nuestra consulta de como resultado 1, gracias a count haz...
            if ($userId == 1){
                //Establecemos sesión, PASO MUY IMPORTANTE YA QUE COMPROBAREMOS SIEMPRE LA SESIÓN
                $request->session()->put('email_session', $request->email_us);
                return redirect("adm-home");
            }else{
                //No establecemos sesión y lo devolvemos a login
                return redirect('adm-storeproject');
            }
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    //Método destrucción de sesión
    public function logout(Request $request){
        //Olvidamos la session
        $request->session()->forget('email_session');
        //Limpiamos todos los registros
        $request->session()->flush();
        return redirect('adm-storeproject');
    }

    //Método encargado de devolver la vista de home pero para los adms
    public function indexAdm(){
        try {
            //Inner join entre producto y marca
            $dbproducts = DB::table('tbl_producto')
                ->join('tbl_marca', 'tbl_producto.marca_prod_fk', '=', 'tbl_marca.id_mar')
                ->select('tbl_producto.*', 'tbl_marca.nombre_mar')
                ->get();
            return view("index-adm", compact("dbproducts"));
        } catch (\Throwable $e) {
            //Obtendremos el error en caso de
            return $e->getMessage();
        }
    }

    //Método que nos devolverá el indice con toda la información de la DB
    public function index(){
        //En esta variable almacenamos todos los datos recogidos de una tabla en concreto, también se pueden hacer inner joins
        //En caso de querer seleccionar campos en concretos, deberemos poner el ->select() después de la tabla
        //Y en este caso pasamos la variable que contiene los datos a la vista mediante compact
        try {
            $dbproducts = DB::table('tbl_producto')->get();
            return view("index", compact("dbproducts"));
        } catch (\Throwable $e) {
            //Obtendremos el error en caso de
            return $e->getMessage();
        }
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
