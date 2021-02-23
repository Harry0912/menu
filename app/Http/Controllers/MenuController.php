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

    public function show($results)
    {
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

        return array('gratin'=>$gratin, 'curry'=>$curry, 'beverage'=>$beverage, 'dessert'=>$dessert);
    }

    public function index()
    {
        $results = $this->MenuModel->get();

        $data = $this->show($results);

        return view('index', 
            [
                'gratin' => $data['gratin'], 
                'curry' => $data['curry'], 
                'beverage' => $data['beverage'], 
                'dessert' => $data['dessert']
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
    }

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

    public function destroy($id)
    {
        $this->MenuModel
            ->where('Id', '=', $id)
            ->first()
            ->delete();
    }

    public function search($keyword)
    {
        $results = $this->MenuModel
            ->where('Name', 'like', '%'.$keyword.'%')
            ->get();

        $data = $this->show($results);

        return view('index', 
            [
                'gratin' => $data['gratin'], 
                'curry' => $data['curry'], 
                'beverage' => $data['beverage'], 
                'dessert' => $data['dessert']
            ]
        );
    }
}