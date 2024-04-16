@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">BIOQUIMICOS</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Carnet de Identidad:</strong> {{ $Bioquimico->ci }}</p>
            <p><strong>Direccion:</strong> {{ $Bioquimico->nombre }}</p>
            <p><strong>Nombre:</strong> {{ $Bioquimico->nombre }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $Bioquimico->fechaNacimiento }}</p>
            <p><strong>Sexo:</strong> {{ $Bioquimico->sexo }}</p>
            <p><strong>Telefono:</strong> {{ $Bioquimico->telefono }}</p>
            <p><strong>Especialidad:</strong> {{ $Bioquimico->tipoSeguro->descripcion }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('bioquimicos.edit', $Bioquimico) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('bioquimicos.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
