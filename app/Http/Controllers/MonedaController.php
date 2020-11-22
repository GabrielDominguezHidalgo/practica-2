<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonedaCreateRequest;
use App\Http\Requests\MonedaEditRequest;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MonedaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monedas = Moneda::all();
        /*$query = $request->get('query');
        echo $query;
        $query = $request->query('query');
        echo $query;*/
        //$response = ['op' => 'create', 'r' => 1, 'id' => 1];
        //$request->session()->flash('op', 'create');
        //$request->session()->flash('id', '1');
        return view('backend.moneda.index', ['monedas' => $monedas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.moneda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonedaCreateRequest $request)
    {
        $moneda = new Moneda($request->validated());
        try {
            $result = $moneda->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($moneda->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $moneda->id];
            return redirect('backend/moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $moneda)
    {
        //$moneda = moneda::find($id);
        return view('backend.moneda.show', ['moneda' => $moneda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $moneda)
    {
        return view('backend.moneda.edit', ['moneda' => $moneda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function update(MonedaEditRequest $request, Moneda $moneda)
    {
        // 1º Resquest (reglas simples)
        // 2º reglas programar
        // 3º relgas SQL ->
        try {
            $result = $moneda->update($request->validated());
        } catch (\Exception $e) {
            $result = 0;
        }
        /*$moneda->fill($request->all());
        $result = $moneda->save();*/
        if($result) {
            $response = ['op' => 'update',
                        'r' => $result,
                        'id' => $moneda->id];
            return redirect('backend/moneda')->with($response);
        } else {
            return back()->withInput()->withErrors(['nombreMoneda' => 'El nombre de la moneda ya existe']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $moneda)
    {
        $id = $moneda->id;
        try {
            $result = $moneda->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        //$result = moneda::destroy($moneda->id);
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/moneda')->with($response);
    }
    
    function sesion() {
        //Facades -> Facade\Request
        //Request, -> laravel los inyecta
        //request() -> $request
        //mucho caminos
        $incrementar = request()->get('incrementar');
        $suma = 0;
        if(request()->session()->exists('sumacontinua')) {
            $suma = request()->session()->get('sumacontinua');
        }
        $leer = Session::get('flash');
        $leer2 = request()->session()->get('flash');
        $suma = $suma + $incrementar;
        if($incrementar == 11) {
            request()->session()->flash('flash', $incrementar);
        }
        if($incrementar == 12) {
            request()->session()->reflash();
        }
        request()->session()->put('sumacontinua', $suma);
        return view('sesion', ['incrementar' => $incrementar, 'suma' => $suma]);
    }
}