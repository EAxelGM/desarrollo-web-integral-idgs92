@extends('layouts.app')

@section('title')
  Alumnos
@endsection

@section('body')
  <h2 class="mb-4">Laravel 8 | Datatables Ejemplo</h2>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-primary my-4 mx-3" data-toggle="modal" data-target="#createNew">
    Create New User
  </button>
  <a href="{{ route('alumnos-pdf') }}" class="btn btn-outline-warning my-4 mx-3" target="_blank">
    Descargar Reporte
  </a>

  <!-- Modal Create -->
  <div class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('/alumnos') }}" method="POST">
          <div class="modal-body">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Matricula</label>
                  <input type="number" class="form-control" name="matricula" placeholder="Ingrese una matricula">
                  <small class="form-text text-muted">Ejemplo: 221810731</small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Ingrese un Email">
                  <small class="form-text text-muted">Ejemplo: al221810731@gmail.com</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre(s)">
                  <small class="form-text text-muted">Ejemplo: Edgar Axel</small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" name="app" placeholder="Ingrese Apellidos">
                  <small class="form-text text-muted">Ejemplo: Gonzalez Martinez</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Genero</label>
                  <select name="gen" class="form-control">
                    <option value="" disabled selected>Selecciona un Genero</option>
                    <option value="Masculino">Hombre</option>
                    <option value="Femenino">Mujer</option>
                  </select>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Fecha de Nacimiento</label>
                  <input type="date" class="form-control" name="fn">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Contraseña</label>
                  <input type="text" class="form-control" name="password" placeholder="Ingrese una contraseña segura">
                  <small class="form-text text-muted"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>


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
