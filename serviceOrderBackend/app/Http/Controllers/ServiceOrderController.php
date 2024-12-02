<?php

namespace App\Http\Controllers;

use App\Services\ServiceOrderService;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    protected $serviceOrderService;

    public function __construct(ServiceOrderService $serviceOrderService)
    {
        $this->serviceOrderService = $serviceOrderService;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'open_date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'customer_cpf' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'customer_complaint' => 'nullable|string',
            'technical_solution' => 'nullable|string',
        ]);

        return response()->json($this->serviceOrderService->createOrder($data), 201);
    }

    public function index()
    {
        return response()->json($this->serviceOrderService->listOrders());
    }

    public function show($id)
    {
        return response()->json($this->serviceOrderService->getOrder($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'open_date' => 'date',
            'customer_name' => 'string|max:255',
            'customer_cpf' => 'cpf',
            'product_id' => 'exists:products,id',
            'customer_complaint' => 'nullable|string',
            'technical_solution' => 'nullable|string',
        ]);

        return response()->json($this->serviceOrderService->updateOrder($id, $data));
    }

    public function destroy($id)
    {
        $this->serviceOrderService->deleteOrder($id);

        return response()->json(['message' => 'Ordem de serviço deletada com sucesso']);
    }
}
