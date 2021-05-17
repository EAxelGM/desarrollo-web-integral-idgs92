<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use DataTables;

class AlumnosController extends Controller
{
  
  public function index()
  {
    return view('alumnos.index');
  }
  
  public function create()
  {
    //
  }
  
  public function store(Request $request)
  {
    //
  }
  
  public function show(Alumnos $alumnos)
  {
    //
  }
  
  public function edit(Alumnos $alumnos)
  {
    //
  }
  
  public function update(Request $request, Alumnos $alumnos)
  {
    //
  }
  
  public function destroy(Alumnos $alumnos)
  {
    //
  }

  public function getAlumnos(Request $request){
    if ($request->ajax()) {
      $data = Alumnos::latest()->get();
      return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('otros', function($row){
            return "<a href='".url('alumnos')."'>Editar - ".$row->id."</a>";
        })
        ->rawColumns(['otros'])
        ->make(true);
    }

  }
}
