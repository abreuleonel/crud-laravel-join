<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\CategoriaProduto;

class CategoryController extends Controller
{
    private $objCategoriaProduto;

    public function __construct() 
    {
        $this->objCategoriaProduto = new CategoriaProduto();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->objCategoriaProduto->all();
        
        return view('category/index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->objCategoriaProduto->create([
            'nome' => $request->nome,
        ]);

        if($result) return redirect(to: '/category/list');
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
        $category = $this->objCategoriaProduto->find($id);

        return view('category/create', compact('category'));
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
        $this->objCategoriaProduto->where(['id' => $id])->update([
            'nome' => $request->nome
        ]);

        return redirect(to: '/category/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->objCategoriaProduto->destroy($id);
        return $status;
    }
}
