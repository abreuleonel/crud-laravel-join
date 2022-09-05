
@extends('templates/template')

@section('content')
    <h1 class="text-center"> Produtos </h1> <hr />
    <div class="text-center">
        <a href="{{url('product/create')}}" class="btn btn-success"> Cadastrar Produto </a>
    </div>
    <hr />
    <div class="col-8 m-auto">
        @csrf
        <input type="hidden" id="location" value="/" />
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Inserido em</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $k => $v)
                    @php
                        $categoria = $v->find($v->id)->relCategories;
                    @endphp
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$categoria->nome}}</td>
                        <td>{{$v->nome_produto}}</td>
                        <td>R$ {{number_format($v->valor_produto,2,',','.')}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($v->created_at))}}</td>
                        <td> <a href="{{url("product/$v->id/edit")}}">Editar</a> </td>
                        <td> <a href="{{url("product/$v->id")}}" style="color:red;" class="del-product">Excluir</a> </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
    
