<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;

class HomeController
{
    public function index(): void
    {
        Response::view('home', [
            'title' => 'Mini Medical Supplies Routing App',
            'message' => 'Welcome to the Medical Supplies Management System.'
        ]);
    }

    public function goHome(): void
    {
        Response::redirect('/');
    }
}
