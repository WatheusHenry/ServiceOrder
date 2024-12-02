<?php

namespace App\Repositories;

use App\Models\ServiceOrder;

class ServiceOrderRepository
{
    public function create(array $data)
    {
        $data['user_id'] = auth()->id(); 
        return ServiceOrder::create($data);
    }

    public function getAll()
    {
        return ServiceOrder::with(['product', 'user'])->get(); 
    }

    public function findById($id)
    {
        return ServiceOrder::with('product')->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $order = $this->findById($id);
        $order->update($data);

        return $order;
    }

    public function delete($id)
    {
        $order = $this->findById($id);
        $order->delete();

        return $order;
    }
}
