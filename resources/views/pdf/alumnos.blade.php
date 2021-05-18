<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte</title>
</head>
<body>
  <center>
    <h1>Reportes de Alumnos</h1>
  </center>
  <br><br>
  <table border="1">
    <thead>
      <tr>
        <th>N°</th> 
        <th>Matricula</th> 
        <th>Nombre</th> 
        <th>Genero</th> 
        <th>Fecha N.</th> 
        <th>Email</th> 
        <th>Activo</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($alumnos as $alumno)
        <tr>
          <td>{{$alumno->id}}</td>
          <td>{{$alumno->matricula}}</td>
          <td>{{$alumno->nombre}} {{$alumno->app}}</td>
          <td>{{$alumno->gen}}</td>
          <td>{{$alumno->fn}}</td>
          <td>{{$alumno->email}}</td>
          <td>{{$alumno->activo==1 ? 'Activo' : 'No Activo'}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>