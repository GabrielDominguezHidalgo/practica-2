@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Create moneda</a>
            </div>
        </div>
    </div>
</div>

<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

{{--
@if(Session::get('op') !== null)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Moneda creada satisfactoriamente 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<table class="table table-hover">
    <thead>
        <tr>
            <th>#id</th>
            <th>nombreMoneda</th>
            <th>simboloMoneda</th>
            <th>paisMoneda</th>
            <th>valorMoneda</th>
            <th>fechaMoneda</th>
            <th>mostrar</th>
            <th>editar</th>
            <th>eliminar</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($monedas as $moneda)
        <tr>
            <td>{{ $moneda->id }}</td>
            <td>{{ $moneda->nombreMoneda }}</td>
            <td>{{ $moneda->simboloMoneda }}</td>
            <td>{{ $moneda->paisMoneda }}</td>
            <td>{{ $moneda->valorMoneda }}</td>
            <td>{{ $moneda->fechaMoneda }}</td>
            
          <!--  <td><a href="{{-- url('backend/moneda/create/' . $moneda->id) --}}">add</a></td>
            <td><a href="{{-- url('backend/moneda/' . $moneda->id . '/monedas') --}}">view</a></td> -->
            
            <td><a href="{{ url('backend/moneda/' . $moneda->id) }}">show</a></td>
            <td><a href="{{ url('backend/moneda/' . $moneda->id . '/edit') }}">edit</a></td>
            <td><a href="#" data-id="{{ $moneda->id }}" class="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/moneda') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection