<?php

namespace App\Http\Controllers\Admin;

class PanelController
{
    public function index()
    {
        return view('admin/welcome');
    }
}
