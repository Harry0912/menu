@extends('layouts/menu')

@section('main')
    <h1>菜單管理</h1>
    <div style="margin:10px">
        <input type="text">
        <button>搜尋</button>
        <button>清除</button>
    </div>
    <div style="margin:10px">
        <input type="checkbox" name="kind" value="#gratin" checked>焗烤
        <input type="checkbox" name="kind" value="#curry" checked>咖哩
        <input type="checkbox" name="kind" value="#beverage" checked>飲品
        <input type="checkbox" name="kind" value="#dessert" checked>甜點
    </div>
    <div style="margin:10px; display:flex">
        <div id="gratin">
            <table border="4">
                <tr>
                    <th>焗烤</th>
                </tr>
                <tr>
                    <td>焗烤焗烤焗烤</td>
                </tr>
            </table>
        </div>
        <div id="curry">
            <table border="4">
                <tr>
                    <th>咖哩</th>
                </tr>
                <tr>
                    <td>咖哩咖哩咖哩</td>
                </tr>
            </table>
        </div>
        <div id="beverage">
            <table border="4">
                <tr>
                    <th>飲品</th>
                </tr>
                <tr>
                    <td>飲品飲品飲品</td>
                </tr>
            </table>
        </div>
        <div id="dessert">
            <table border="4">
                <tr>
                    <th>甜點</th>
                </tr>
                <tr>
                    <td>甜點甜點甜點</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin:10px">
        <button>新增菜單</button>
    </div>
@endsection