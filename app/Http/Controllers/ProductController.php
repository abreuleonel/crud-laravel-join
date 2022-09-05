<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Produto;
use App\Models\Models\CategoriaProduto;

class ProductController extends Controller
{
    private $objProduto;
    private $objCategoriaProduto;

    public function __construct() {
        $this->objProduto = new Produto();
        $this->objCategoriaProduto = new CategoriaProduto();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->objProduto->all();
        
        return view('product/index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->objCategoriaProduto->all();
        return view('product/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->objProduto->create([
            'id_categoria' => $request->id_categoria,
            'nome_produto' => $request->nome_produto,
            'valor_produto' => $request->valor_produto
        ]);

        if($result) return redirect(to: '/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->objProduto->find($id);
        $categories = $this->objCategoriaProduto->all();

        return view('product/create', compact('produto', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objProduto->where(['id' => $id])->update([
            'id_categoria' => $request->id_categoria,
            'nome_produto' => $request->nome_produto,
            'valor_produto' => $request->valor_produto
        ]);

        return redirect(to: '/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->objProduto->destroy($id);
        return $status;
    }
}
