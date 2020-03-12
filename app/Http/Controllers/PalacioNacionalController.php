<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ColeccionPalacio;
use DB;
use Crypt;
class PalacioNacionalController extends Controller
{
    public function __construct()
    {
        
      //  $this->middleware('auth');
     //   $this->middleware('inventario', ['only' => ['vercoleccioninah']]);
    }
    
   
    public function index()
    {
        
        $coleccion=ColeccionPalacio::orderBy('Ubicacion')->limit(100)->get();
        
        return response()->json($coleccion);
    }
    public function buscar(Request $request)
    {
        $resultado = DB::table('PalacioNacional')
        ->select('*')
        ->whereRaw("MATCH(Numero_de_inventario,Nombre_o_tema, Tipo_de_objeto, Descripcion, Ubicacion, Epoca , Tecnica_de_manufactura , Consecutivo_sala, Inscripciones,Titulo_descriptivo,Autor,Observaciones,Estado_de_conservacion)      
        AGAINST ('" . $request->q . "' IN natural language mode) ")->get();
        
        
        return response()->json($resultado);
    }
    public function ver($Numero_de_inventario)
    {
        $coleccionespacios=DB::table('PalacioNacional')->latest('Ubicacion')->groupBy('Ubicacion')->get();
        $coleccion=ColeccionPalacio::where('Numero_de_inventario', '=', $Numero_de_inventario)->firstOrFail();
        
        return view('palacionacional.ver')->with('pieza',$coleccion)->with('espacios',$coleccionespacios);;
    }
    public function siguiente($Numero_de_inventario)
    {
        
        $coleccion=ColeccionPalacio::orderBy('Ubicacion')->orderBy('Numero_de_inventario')->get();
        $bandera=0;
        $Numero_siguiente='';
        foreach ($coleccion as $key=>$pieza) {
            if($bandera==1){
                $Numero_siguiente=$pieza->Numero_de_inventario;
            break;
            }
            if($pieza->Numero_de_inventario==$Numero_de_inventario){
                $bandera=1;
            }
            else{
                $bandera=0;
            }
            
        }
        
        
        return redirect()->route('verpiezapalacio', $Numero_siguiente);
    }
    public function anterior($Numero_de_inventario)
    {
        //dd("Anterior");
        $coleccion=ColeccionPalacio::orderBy('Ubicacion','desc')->orderBy('Numero_de_inventario','desc')->get();
        $bandera=0;
        $Numero_siguiente='';
        foreach ($coleccion as $key=>$pieza) {
            if($bandera==1){
                $Numero_siguiente=$pieza->Numero_de_inventario;
            break;
            }
            if($pieza->Numero_de_inventario==$Numero_de_inventario){
                $bandera=1;
            }
            else{
                $bandera=0;
            }
            
        }
        
        
        return redirect()->route('verpiezapalacio', $Numero_siguiente);
    }
    public function editar($id){
       
        $coleccionespacios=DB::table('PalacioNacional')->latest('Ubicacion')->groupBy('Ubicacion')->get();
        $Numero_de_inventario=Crypt::decrypt($id); 
        $coleccion=ColeccionPalacio::where('Numero_de_inventario', '=', $Numero_de_inventario)->firstOrFail();
        return view('palacionacional.editar')->with('pieza',$coleccion)->with('espacios',$coleccionespacios);;
    }
    public function guardar(Request $request){
        
        $Numero_de_inventario=Crypt::decrypt($request->Id); 
        $pieza_aux=ColeccionPalacio::where('Numero_de_inventario', '=', $Numero_de_inventario)->firstOrFail();
        $pieza=ColeccionPalacio::findOrFail($pieza_aux->Id);
        if(strcmp($pieza->Nombre_o_tema, $request->Nombre_o_tema) !== 0){
           // dd("Nombre o tema cambio");
           if(!is_null($request->Nombre_o_tema)){
            $pieza->Nombre_o_tema=$request->Nombre_o_tema;
           } 
           
        }else{
            
        }
        if(strcmp($pieza->Tipo_de_objeto, $request->Tipo_de_objeto) !== 0){
            $pieza->Tipo_de_objeto=$request->Tipo_de_objeto;
        }
        if(strcmp($pieza->Epoca, $request->Epoca) !== 0){
            $pieza->Epoca=$request->Epoca;
        }
        if(strcmp($pieza->Tecnica_de_manufactura, $request->Tecnica_de_manufactura) !== 0){
            $pieza->Tecnica_de_manufactura=$request->Tecnica_de_manufactura;
        }
        if(strcmp($pieza->Estado_de_conservacion, $request->Estado_de_conservacion) !== 0){
            $pieza->Estado_de_conservacion=$request->Estado_de_conservacion;
        }
        if(strcmp($pieza->Descripcion, $request->Descripcion) !== 0){
            $pieza->Descripcion=$request->Descripcion;
        }
        if(strcmp($pieza->Ubicacion, $request->Ubicacion) !== 0){
            $pieza->Ubicacion=$request->Ubicacion;
        }
        if(strcmp($pieza->Consecutivo_sala, $request->Consecutivo_sala) !== 0){
            $pieza->Consecutivo_sala=$request->Consecutivo_sala;
        }
        if(strcmp($pieza->Alto, $request->Alto) !== 0){
            $pieza->Alto=$request->Alto;
        }
        if(strcmp($pieza->Largo, $request->Largo) !== 0){
            $pieza->Largo=$request->Largo;
        }
        if(strcmp($pieza->Profundidad, $request->Profundidad) !== 0){
            $pieza->Profundidad=$request->Profundidad;
        }
        if(strcmp($pieza->Avaluo, $request->Avaluo) !== 0){
            $pieza->Avaluo=$request->Avaluo;
        }
        if(strcmp($pieza->Inscripciones, $request->Inscripciones) !== 0){
            $pieza->Inscripciones=$request->Inscripciones;
        }
        if(strcmp($pieza->Titulo_descriptivo, $request->Titulo_descriptivo) !== 0){
            $pieza->Titulo_descriptivo=$request->Titulo_descriptivo;
        }
        if(strcmp($pieza->Autor, $request->Autor) !== 0){
            $pieza->Autor=$request->Autor;
        }
        if(strcmp($pieza->Observaciones, $request->Observaciones) !== 0){
            $pieza->Observaciones=$request->Observaciones;
        }
        





        if(!is_null($request->Verificado)){
            $pieza->Verificado=1;
        }else{
            $pieza->Verificado=null;
        }
        $pieza->save();


        return redirect()->route('verpiezapalacio', $pieza->Numero_de_inventario)->with('sucess','Se han guardado los cambios satisfactoriamente');
        //return view('palacionacional.ver')->with('pieza',$pieza)->with('sucess','Se han guardado los cambios satisfactoriamente');
    }
}
