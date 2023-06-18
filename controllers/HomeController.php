<?php

namespace controllers;

class HomeController
{
    public function index()
    {
        // Render the home page view
        require_once __DIR__ . '/../views/layout.php';

    }
}