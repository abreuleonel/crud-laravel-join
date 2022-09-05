@extends('templates/template')

@section('content')
    <h1 class="text-center"> @if(!isset($category)) Cadastrar Categoria @else Editar Categoria @endif </h1> <hr />

    <div class="col-8 m-auto">
        @if(!isset($category))
            <form name="formCad" id="formCad" method="post" action="{{url('category')}}">
        @else
            <form name="formEdit" id="formEdit" method="post" action="{{url("category/$category->id")}}">
            @method('PUT')
        @endif
            @csrf       

            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Categoria" value="{{$category->nome ?? ''}}" /> <br />
            
            <input type="submit" value="@if(!isset($category)) Cadastrar @else Editar  @endif" class="btn btn-primary">
        </form>
    </div>
@endsection