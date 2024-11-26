<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peliculas;
use App\Models\generos;
use App\Models\directores;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Session;

class peliculascontroller extends Controller
{
    public function altapelicula()
    {
        if(Session::get('sesionidu'))
        {
            $todosgeneros = generos::orderby('tipo','asc')
                ->get();

            $todosdirectores = directores::orderby('nombre','asc')
                ->get();

            return view ('peliculas.altapeli')
            ->with('todosgeneros',$todosgeneros)
            ->with('todosdirectores',$todosdirectores);
        }
        else
        {
                Session::flash('mensaje', "Es necesario iniciar sesion");
                return redirect()->route('login');
        }
    }

    public function guardapelicula(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ó,é,ü,ñ,Ñ]+$/',
            'clasificacion'=>'required',
            'duracion'=>'regex:/^[0-9][:][0-5][0-9]$/',
            'costo'=>'regex:/^[0-9]+[.][0-9]{2}$/',
            'fecha_estreno'=>'required|date',
            'calificacion'=>'required',
            'descripcion'=>'required',
            'foto'=>'mimes:jpg,png,gif,jpeg',
            'guion'=>'mimes:pdf,docx',
        ]);

        $file = $request->file('foto');
        if ($file != '')
        {
            $fecha = date_create();
            $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
            \Storage::disk('local')->put($img, \File::get($file));
        }
        else
        {
            $img = 'sinfoto.PNG';
        }

        $nombreguion = '';
        $gui = $request->file('guion');
        if ($gui != '')
        {
            $fecha = date_create();
            $nombreguion = date_timestamp_get($fecha) . $gui->getClientOriginalName();
            \Storage::disk('local2')->put($nombreguion, \File::get($gui));
        }

        $insertapelicula =  \DB::insert("INSERT INTO peliculas
        (nombre,clasificacion,costo,fecha_estreno,duracion,calificacion,idg,idd,descripcion,foto,guion,created_at,updated_at,activo)
        VALUE ('$request->nombre','$request->clasificacion',$request->costo,'$request->fecha_estreno','$request->duracion',
        '$request->calificacion',$request->idg,$request->idd,'$request->descripcion','$img','$nombreguion',now(),now(),'$request->activo')");

        Session::flash('mensaje', "La pelicula  $request->nombre se ha guardado correctamente");

        return redirect()->route('reportepelicula');
    }

    public function reportepelicula()
    {
        if(Session::get('sesionidu'))
        {
            $consulta  = \DB::select("SELECT p.idp, p.nombre AS nompeli, g.tipo AS gene, p.clasificacion AS clasi,
            p.foto, p.costo AS cos, d.nombre AS nomdire, p.fecha_estreno AS fecha, p.calificacion AS cali, p.activo
            FROM peliculas AS p
            INNER JOIN generos AS g ON g.idg = p.idg
            INNER JOIN directores AS d ON d.idd = p.idd");
            //return $consulta;

            return view ('peliculas.reportepeli')
                ->with('consulta',$consulta);
        }
        else
        {
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');
        }
    }

    public function editapelicula($idp)
    {
        if(Session::get('sesionidu'))
        {
            $clave = Crypt::decrypt($idp);

            $infopelicula =  \DB::select("SELECT p.idp, p.nombre, g.tipo AS nomge, p.clasificacion, p.costo, p.duracion,
            p.foto, p.guion, d.nombre AS nomdire, p.fecha_estreno, p.calificacion, p.descripcion, p.idg, p.idd, p.activo
            FROM peliculas AS p
            INNER JOIN generos AS g ON g.idg = p.idg
            INNER JOIN directores AS d ON d.idd = p.idd
            WHERE idp = $clave");

            if($infopelicula[0]->guion !='')
            {
                $archivo = explode('.',$infopelicula[0]->guion);
                $extension = $archivo[1];
            }
            else
            {
                $extension = 'NA';
            }

            $generos = generos::where('idg','<>',$infopelicula[0]->idg)
                                ->orderby('tipo','Asc')
                                ->get();

            $directores = directores::where('idd','<>',$infopelicula[0]->idd)
                                ->orderby('nombre','Asc')
                                ->get();

            //return $infopelicula;

            return view('peliculas.editapeli')
                    ->with('infopelicula',$infopelicula[0])
                    ->with('generos',$generos)
                    ->with('directores',$directores)
                    ->with('extension',$extension);
        }
        else
        {
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');
        }
    }

    public function guardacambios(request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ó,é,ü,ñ,Ñ,0-9]+$/',
            'clasificacion'=>'required',
            'duracion'=>'regex:/^[0-9][:][0-5][0-9]$/',
            'costo'=>'regex:/^[0-9]+[.][0-9]{2}$/',
            'fecha_estreno'=>'required|date',
            'calificacion'=>'required',
            'descripcion'=>'required',
            'foto'=>'mimes:jpg,png,gif,jpeg',
            'guion'=>'mimes:pdf,docx',
        ]);

        $file = $request->file('foto');
        if ($file != '')
        {
            $fecha = date_create();
            $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
            \Storage::disk('local')->put($img, \File::get($file));
        }

        $nombreguion = '';
        $gui = $request->file('guion');
        if ($gui != '')
        {
            $fecha = date_create();
            $nombreguion = date_timestamp_get($fecha) . $gui->getClientOriginalName();
            \Storage::disk('local2')->put($nombreguion, \File::get($gui));
        }

        $peliculas = peliculas::find($request->idp);
        $peliculas->nombre = $request->nombre;
        $peliculas->clasificacion = $request->clasificacion;
        $peliculas->costo = $request->costo;
        $peliculas->fecha_estreno = $request->fecha_estreno;
        $peliculas->duracion = $request->duracion;
        $peliculas->idg = $request->idg;
        $peliculas->idd = $request->idd;
        $peliculas->calificacion = $request->calificacion;
        $peliculas->descripcion = $request->descripcion;
        if ($file != '')
        {
            $peliculas->foto = $img;
        }
        if ($gui != '')
        {
            $peliculas->guion = $nombreguion;
        }
        $peliculas->activo = $request->activo;
        $peliculas->save();

        //return $nombreguion;
        Session::flash('mensaje', "La película  $request->nombre se ha editado correctamente");
        return redirect()->route('reportepelicula');
    }

    public function desactivapelicula($idp)
    {
        $clave = Crypt::decrypt($idp);
        $peliculas = peliculas::find($clave);
        $peliculas->activo = 'No';
        $peliculas->save();

        Session::flash('mensaje', "La película de clave $clave ha sido desactivada");
        return redirect()->route('reportepelicula');
    }

    public function activapelicula($idp)
    {
        $clave = Crypt::decrypt($idp);
        $peliculas = peliculas::find($clave);
        $peliculas->activo = 'Si';
        $peliculas->save();

        Session::flash('mensaje', "La película de clave $clave ha sido activada");
        return redirect()->route('reportepelicula');
    }

    public function eliminapelicula($idp)
    {
        $clave = Crypt::decrypt($idp);
        $borrapelicula = \DB::delete("DELETE FROM peliculas WHERE idp = $clave");
        Session::flash('mensaje', "La película de clave $clave ha sido eliminada");
        return redirect()->route('reportepelicula');
    }
}
