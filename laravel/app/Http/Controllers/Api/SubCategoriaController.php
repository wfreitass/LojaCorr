<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoriaPostRequest;
use App\Http\Resources\SubCategoriaResource;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{

    /**
     *
     * @var SubCategoria
     */
    protected SubCategoria $subcategoria;

    /**
     *
     * @param SubCategoria $subcategoria
     * 
     */
    public function __construct(Subcategoria $subcategoria)
    {
        $this->subcategoria = $subcategoria;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubCategoriaResource::collection($this->subcategoria->all());
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
    public function store(SubCategoriaPostRequest $request)
    {
        if ($request->validated()) {
            $subcategoria = $this->subcategoria->create($request->all());
            return  response()->json(['data' => $subcategoria, 'message' => 'Categoria Criada com sucesso']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategoria = $this->subcategoria->with("categoria")->find($id);
        return $subcategoria ? new SubCategoriaResource($subcategoria) : response()->json(['data' => null, 'message' => 'Subcategoria não encontrada']);;
    
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
        $subcategoriaResponse = $this->subcategoria->findOrFail($id)->delete();
        return  response()->json(['data' => $subcategoriaResponse, 'message' => 'subcategoria deletada']);
    }
}
