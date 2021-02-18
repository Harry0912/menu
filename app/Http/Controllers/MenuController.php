<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\MenuKindModel;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class MenuController extends Controller
{
    public function __construct(MenuModel $menuModel, MenuKindModel $menuKindModel)
    {
        $this->MenuModel = $menuModel;
        $this->MenuKindModel = $menuKindModel;
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

        return view('index', 
            [
                'gratin' => $gratin, 
                'curry' => $curry, 
                'beverage' => $beverage, 
                'dessert' => $dessert
            ]
        );
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreRequest $request)
    {
        $kind = $request->kind;
        $name = $request->name;
        $price = $request->price;

        $menuKindId = $this->MenuKindModel
            ->where('MenuKind', '=', $kind)
            ->first()->MenuKindId;

        $this->MenuModel->insert(
            [
                'Name' => $name,
                'Price' => $price,
                'MenuKindId' => $menuKindId
            ]
        );

    public function edit($id)
    {
        $data = $this->MenuModel
            ->where('Id', '=', $id)
            ->with('MenuKind')
            ->first();

        $id = $data->Id;
        $name = $data->Name;
        $price = $data->Price;
        $kind = $data->MenuKind->Kind;

        return view('edit', ['id'=>$id, 'name'=>$name, 'price'=>$price, 'kind'=>$kind]);
    }

    public function update(UpdateRequest $request)
    {
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;

        $data = $this->MenuModel
            ->where('Id', '=', $id)
            ->first();
        $data->Name = $name;
        $data->Price = $price;
        $data->save();
    }
}
