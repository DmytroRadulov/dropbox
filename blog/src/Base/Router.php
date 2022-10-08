<?php

namespace web\Base;

use web\Controllers\PageController;

class Router
{
    public function route(): callable
    {
        $controller = new PageController();

        if ($_SERVER['REQUEST_URI'] == '/contact') {
            return [$controller, 'contact'];

        }
        throw new \Error('Not found');
    }
}