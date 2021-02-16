@extends('layouts/menu')

@section('main')
    <h1>菜單管理</h1>
    <div style="margin:10px">
        <input type="text">
        <button>搜尋</button>
        <button>清除</button>
    </div>
    <div style="margin:10px">
        <input type="checkbox" id="gratin">焗烤
        <input type="checkbox" id="curry">咖哩
        <input type="checkbox" id="beverage">飲品
        <input type="checkbox" id="dessert">甜點
    </div>
    <div style="margin:10px">
        <table border="4">
            <tr>
                <th>焗烤</th>
                <th>咖哩</th>
                <th>飲品</th>
                <th>甜點</th>
            </tr>
            <tr>
                <td>焗烤焗烤焗烤</td>
                <td>咖哩咖哩咖哩</td>
                <td>飲品飲品飲品</td>
                <td>甜點甜點甜點</td>
            </tr>
        </table>
    </div>
    <div style="margin:10px">
        <button>新增菜單</button>
    </div>
@endsection