<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class SupplyController
{
    public function index(): void
    {
        $supplies = $this->getSupplies();

        Response::view('supplies/index', [
            'title' => 'Medical Supplies List',
            'supplies' => $supplies,
            'created' => ($_GET['created'] ?? '') === '1'
        ]);
    }

    public function create(): void
    {
        Response::view('supplies/create', [
            'title' => 'Add New Supply',
            'error' => null
        ]);
    }

    public function store(): void
    {
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $supplier = trim($_POST['supplier'] ?? '');
        $price = (int) ($_POST['price'] ?? 0);
        $quantity = (int) ($_POST['quantity'] ?? 0);

        if ($code === '' || $name === '' || $category === '' || $supplier === '' || $price <= 0 || $quantity < 0) {
            Response::view('supplies/create', [
                'title' => 'Add New Supply',
                'error' => 'Please fill in all fields correctly.'
            ], 422);
        }

        Response::redirect('/supplies?created=1');
    }

    private function getSupplies(): array
    {
        return require dirname(__DIR__) . '/Data/supplies.php';
    }
}
