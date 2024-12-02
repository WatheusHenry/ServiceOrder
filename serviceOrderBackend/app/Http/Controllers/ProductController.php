<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'warranty_time' => 'required|integer',
            'status' => 'required|in:ativo,inativo',
        ]);


        return response()->json($this->productService->createProduct($data), 201);
    }

    public function index()
    {
        return response()->json($this->productService->listProducts());
    }

    public function show($id)
    {
        return response()->json($this->productService->getProduct($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'warranty_time' => 'integer',
            'status' => 'in:ativo,inativo',
        ]);

        return response()->json($this->productService->updateProduct($id, $data));
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return response()->json(['message' => 'Produto deletado com sucesso']);
    }
}
