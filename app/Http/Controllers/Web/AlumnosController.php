<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class AlumnosController extends Controller
{
  
  public function index()
  {
    return view('alumnos.index');
  }
  
  public function store(Request $request)
  {
    $alumno = Alumnos::create([
      'matricula' => $request->matricula,
      'nombre' => $request->nombre,
      'app' => $request->app,
      'gen' => $request->gen,
      'fn' => $request->fn,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'activo' => 1,
    ]);

    return redirect()->back();
  }
  
  public function show(Alumnos $alumno)
  {
    return $alumno;
  }
  
  public function update(Request $request, Alumnos $alumno)
  {
    return $alumno;
  }
  
  public function destroy(Alumnos $alumno)
  {
    return 'entraste al borrar';
  }

  public function getAlumnos(Request $request){
    if ($request->ajax()) {
      $data = Alumnos::latest()->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('otros', function($row){
        return "
          <a href='".url('alumnos/')."'>Editar - ".$row->id."</a>
        ";
      })
      ->rawColumns(['otros'])
      ->make(true);
    }
  }

  public function getPdfAlumnos(){
    $alumnos = Alumnos::all();
    $pdf = PDF::loadView('pdf.alumnos', compact('alumnos'));
    return $pdf->download('pdf_alumnos.pdf');
  }
}
