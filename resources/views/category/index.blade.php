
@extends('templates/template')

@section('content')
    <h1 class="text-center"> Produtos </h1> <hr />
    <div class="text-center">
        <a href="{{url('category/create')}}" class="btn btn-primary"> Cadastrar Categoria </a>
    </div>
    <hr />
    <div class="col-8 m-auto">
        @csrf
        <input type="hidden" id="location" value="/category/list" />
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Inserido em</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $k => $v)
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->nome}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($v->created_at))}}</td>
                        <td> <a href="{{url("category/$v->id/edit")}}">Editar</a> </td>
                        <td> <a href="{{url("category/$v->id")}}" style="color:red;" class="del-product">Excluir</a> </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
    
