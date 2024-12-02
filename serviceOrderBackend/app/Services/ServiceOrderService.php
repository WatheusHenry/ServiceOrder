<?php

namespace App\Services;

use App\Repositories\ServiceOrderRepository;

class ServiceOrderService
{
    protected $serviceOrderRepository;

    public function __construct(ServiceOrderRepository $serviceOrderRepository)
    {
        $this->serviceOrderRepository = $serviceOrderRepository;
    }

    public function createOrder(array $data)
    {
        return $this->serviceOrderRepository->create($data);
    }

    public function listOrders()
    {
        return $this->serviceOrderRepository->getAll();
    }

    public function getOrder($id)
    {
        return $this->serviceOrderRepository->findById($id);
    }

    public function updateOrder($id, array $data)
    {
        return $this->serviceOrderRepository->update($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->serviceOrderRepository->delete($id);
    }
}
