@extends('templates/template')

@section('content')
    <h1 class="text-center"> @if(!isset($produto)) Cadastrar Produto @else Editar Produto @endif</h1> <hr />

    <div class="col-8 m-auto">
        @if(!isset($produto))
            <form name="formCad" id="formCad" method="post" action="{{url('product')}}">
        @else    
            <form name="formEdit" id="formEdit" method="post" action="{{url("product/$produto->id")}}">
            @method('PUT')
        @endif
            @csrf       

            <input type="text" name="nome_produto" id="nome_produto" class="form-control" value="{{$produto->nome_produto ?? ''}}" placeholder="Nome do Produto" /> <br />
            <select name="id_categoria" id="id_categoria" class="form-control"> 
                <option>Selecione</option>
                @foreach($categories as $k => $v)
                    <option value="{{$v->id}}" @if(isset($produto) && ($v->id === $produto->id_categoria)) selected="selected" @endif> {{$v->nome}} </option>
                @endforeach
            </select><br>
            <input type="text" name="valor_produto" id="valor_produto" class="form-control" value="{{$produto->valor_produto ?? ''}}" placeholder="Valor do Produto" /><br>
            <input type="submit" value="@if(!isset($produto)) Cadastrar @else Editar @endif" class="btn btn-primary">
        </form>
    </div>
@endsection