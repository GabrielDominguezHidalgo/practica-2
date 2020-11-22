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
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombreMoneda }}" class="btn btn-danger" id="enlaceBorrar">Delete moneda</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif
<form role="form" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post" id="editMonedaForm">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="nombreMoneda">Nombre de la Moneda</label>
            @error('nombreMoneda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="nombreMoneda" placeholder="nombre" name="nombreMoneda" value="{{ old('nombreMoneda', $moneda->nombreMoneda) }}">
        </div>
        <div class="form-group">
            <label for="simboloMoneda">Simbolo de la Moneda</label>
            @error('simboloMoneda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" maxlength="5" minlength="1" required class="form-control" id="simboloMoneda" placeholder="simbolo" name="simboloMoneda" value="{{ old('simboloMoneda', $moneda->simboloMoneda) }}">
        </div>
        <div class="form-group">
            <label for="paisMoneda">Pais de la Moneda</label>
            @error('paisMoneda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" maxlength="100" minlength="2" required class="form-control" id="paisMoneda" placeholder="pais" name="paisMoneda" value="{{ old('paisMoneda', $moneda->paisMoneda) }}">
        </div>
        <div class="form-group">
            <label for="valorMoneda">Valor de la Moneda (Basado en euros)</label>
            @error('valorMoneda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" step=".01" min="0" max="99999" required class="form-control" id="valorMoneda" placeholder="valor" name="valorMoneda" value="{{ old('valorMoneda', $moneda->valorMoneda) }}">
        </div>
        <div class="form-group">
            <label for="fechaMoneda">Fecha de la Moneda</label>
            @error('fechaMoneda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="date" required class="form-control" name="fechaMoneda" id="fechaMoneda" placeholder="fecha" value="{{ old('fechaMoneda', $moneda->fechaMoneda) }}"></input>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection