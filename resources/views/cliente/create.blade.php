@extends('imaster')
@section('title', 'Registrar Cliente')

@section('content')

<body>
  <div class="container">
    <form method="post">
      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach

      @if (session('status'))
      <div class = "alert alert-success">
        {{ session ('status') }}
      </div>
      @endif

      <input type="hidden" name="_token" value="{!! csrf_token() !!}">

      <h3 align="center">REGISTRO DE CLIENTES</h3>
      <div class="form-group">
        <label>Cédula: </label>
        <input type="text" id="cedula" name="cedula" class="form-control" placeholder="Cédula Cliente">
      </div>

      <div class="form-group">
        <label>Primer Nombre: </label>
        <input type="text" id="primernombre" name="primer_nombre" class="form-control" placeholder="Nombre Cliente">
      </div>

      <div class="form-group">
        <label>Segundo Nombre: </label>
        <input type="text" id="segundonombre" pattern="[A-Za-z]+" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre Cliente">
      </div>


      <div class="form-group">
        <label>Primer Apellido: </label>
        <input type="text" id="primerapellido" name="primer_apellido" class="form-control" placeholder="Primer Apellido">
      </div>

      <div class="form-group">

        <label>Segundo Apellido: </label>
        <input type="text" id="segundoapellido" pattern="[A-Za-z]+" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido">
      </div>

      <div class="container">
        <label>Fecha Nacimiento: </label>
        <input type="date" id="fechanacimiento"  name="fechanacimiento"  max="2000-12-31" step="1">

        <label>Número Celular: </label>
        <input type="number" id="celular" name="celular" pattern="[0-9]+"  placeholder="Número Celular Cliente">

        <label>Teléfono: </label>
        <input type="number" id="telefono" name="telefono" pattern="[0-9]+"   placeholder="Teléfono Cliente">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Email address: </label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com">
      </div>

      <button type="submit" class="btn btn-primary">REGISTRAR</button>

    </form>
  </div>
</body>
@endsection
