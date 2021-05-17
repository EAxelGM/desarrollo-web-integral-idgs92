@extends('layouts.app')

@section('title')
  Alumnos
@endsection

@section('body')
  <h2 class="mb-4">Laravel 8 | Datatables Ejemplo</h2>
      
  <table class="table table-bordered yajra-datatable">
    <thead>
      <tr>
        <th>N°</th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Genero</th>
        <th>Fecha de Nacimiento</th>
        <th>E-Mail</th>
        <!-- <th>Contraseña</th> -->
        <th>Otros</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
@endsection
@section('scriptsExtra')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(function () {
      var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('alumnos-list') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'matricula', name: 'matricula'},
          {data: 'nombre', name: 'nombre'},
          {data: 'app', name: 'app'},
          {data: 'gen', name: 'gen'},
          {data: 'fn', name: 'fn'},
          {data: 'email', name: 'email'},
          /* {data: 'password', name: 'password'}, */
          {
            data: 'otros', 
            name: 'otros', 
            orderable: true, 
            searchable: true
          },
        ]
      });
    });
  </script>
@endsection
