@extends('layouts.layout')

@section('title', 'Ingresos')

@section('NavTitle', 'Control de Ingresos')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Detalles de Ingresos</small>
    </h2>
    <button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('income.create') }}">Nuevo Ingreso</a></button>
    <div class="container"><br>
    <table class="table">
        <thead>
            <tr class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Monto</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                @foreach ($categories as $category)                                    
                    <tr>
                    <th scope="row">{{$income->id}}</th>
                        <td>{{$income->description}}</td>
                        <td>{{$income->amount}}</td>
                        @if($income->category_id == $category->id)
                            <td>{{$category->name}}</td>
                        @endif
                        <td>{{$income->date}}</td>
                        <td class="text-center">
                        <a href="{{ route('income.edit', $income) }}" class="btn btn-warning text-black-50 text-center">
                            <i class="fas fa-edit"></i> 
                        </a>
                        <a class="btn btn-danger text-black-50 text-center" href="{{ route('income.destroy', $income) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-income').submit();">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                        <form id="delete-income" action="{{ route('income.destroy', $income) }}" method="POST" style="display: none;">
                                        @csrf @method('DELETE')
                        </form>                    
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    </div>
@endsection