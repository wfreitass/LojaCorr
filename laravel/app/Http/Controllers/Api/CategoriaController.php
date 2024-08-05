<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaPostRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     *
     * @var Categoria
     */
    protected Categoria $categoria;

    /**
     *
     * @param Categoria $categoria
     * 
     */
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriaResource::collection($this->categoria->with("subcategorias")->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaPostRequest $request)
    {
        if ($request->validated()) {
            $categoria = $this->categoria->create($request->all());
            return  response()->json(['data' => $categoria, 'message' => 'Categoria Criada com sucesso'],201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = $this->categoria->with("subcategorias")->find($id);
        return $categoria ? new CategoriaResource($categoria) : response()->json(['data' => null, 'message' => 'categoria não encontrada']);;
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoriaResponse = $this->categoria->findOrFail($id)->delete();
        return  response()->json(['data' => $categoriaResponse, 'message' => 'Categoria deletada']);
    }
}
