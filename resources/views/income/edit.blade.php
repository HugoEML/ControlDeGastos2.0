@extends('layouts.layout')

@section('title', 'Editar Ingresos')

@section('NavTitle', 'Editar Ingreso')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Editar Ingresos</small>
    </h2>
    <div class="container">
        <form class="form-group" method="POST" action="{{ route('income.update', $income) }}">
            @csrf @method('PATCH')
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Descripción:</label>
                <div class="col-sm-10">
                <input name="description" type="text" class="form-control" value="{{old('description', $income->description)}}">
                </div>
            </div>  
            <div class="form-group row">
                <label for="amount" class="col-sm-2 col-form-label">Monto:</label>
                <div class="col-sm-10">
                    <input name="amount" type="text" class="form-control" value="{{old('amount', $income->amount)}}">
                </div>
            </div> 
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Categoría:</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>                
            </div>  
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-10">
                    <input name="date" type="date" class="form-control" value="{{old('date', $income->date)}}">
                </div>
            </div>
            <a href="{{ route('income.index') }}" class="btn btn-outline-dark">Cancelar</a> 
            <button type="submit" class="btn btn-outline-primary">Guardar</button> 
        </form>
    </div>
@endsection