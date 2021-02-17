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
        $results = $this->MenuModel->get();

        $gratin = array();
        $curry = array();
        $beverage = array();
        $dessert = array();

        foreach ($results as $result) {
            $Array['Id'] = $result->Id;
            $Array['Name'] = $result->Name;
            $Array['Price'] = $result->Price;
            switch ($result->MenuKindId) {
                case '1':
                    $Array['Kind'] = 'gratin';
                    $gratin[] = $Array;
                    break;
                case '2':
                    $Array['Kind'] = 'curry';
                    $curry[] = $Array;
                    break;
                case '3':
                    $Array['Kind'] = 'beverage';
                    $beverage[] = $Array;
                    break;
                case '4':
                    $Array['Kind'] = 'dessert';
                    $dessert[] = $Array;
                    break;
            }
            unset($Array);
        }
        // dd($gratin);

        return view('index', 
            [
                'gratin' => $gratin, 
                'curry' => $curry, 
                'beverage' => $beverage, 
                'dessert' => $dessert
            ]
        );
    }
}
