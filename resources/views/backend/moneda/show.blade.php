@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Create moneda</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombreMoneda }}" class="btn btn-danger" id="enlaceBorrar">Delete moneda</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$moneda->nombreMoneda}}</td>
        </tr>
        <tr>
            <td>Simbolo</td>
            <td>{{$moneda->simboloMoneda}}</td>
        </tr>
        <tr>
            <td>Pais</td>
            <td>{{$moneda->paisMoneda}}</td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>{{$moneda->valorMoneda}}</td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>{{$moneda->fechaMoneda}}</td>
        </tr>
    </tbody>
</table>
@endsection