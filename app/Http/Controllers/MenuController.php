<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{
    public function __construct(MenuModel $menuModel)
    {
        $this->MenuModel = $menuModel;
    }

    public function index()
    {
        return view('index');
    }
}
