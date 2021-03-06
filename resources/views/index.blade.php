@extends('layouts/menu')

@section('main')
    <h1>菜單管理</h1>
    <div style="margin:10px">
        <input type="text" id="keyword">
        <button onclick="search('{{ csrf_token() }}')">搜尋</button>
        <button onclick="reset()">清除</button>
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
                    @foreach($gratin as $key => $value)
                        <tr>
                            <td>{{ $value['Name'] }}</td>
                            <td>{{ $value['Price'] }}</td>
                            <td><a href="{{ route('edit', ['id' => $value['Id']]) }}">編輯</a></td>
                            <td><button onclick="destroy('{{ $value['Id'] }}', '{{ csrf_token() }}')">刪除</button></td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div id="curry">
            <table border="4">
                <tr>
                    <th>咖哩</th>
                </tr>
                    @foreach($curry as $key => $value)
                        <tr>
                            <td>{{ $value['Name'] }}</td>
                            <td>{{ $value['Price'] }}</td>
                            <td><a href="{{ route('edit', ['id' => $value['Id']]) }}">編輯</a></td>
                            <td><button onclick="destroy('{{ $value['Id'] }}', '{{ csrf_token() }}')">刪除</button></td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div id="beverage">
            <table border="4">
                <tr>
                    <th>飲品</th>
                </tr>
                    @foreach($beverage as $key => $value)
                        <tr>
                            <td>{{ $value['Name'] }}</td>
                            <td>{{ $value['Price'] }}</td>
                            <td><a href="{{ route('edit', ['id' => $value['Id']]) }}">編輯</a></td>
                            <td><button onclick="destroy('{{ $value['Id'] }}', '{{ csrf_token() }}')">刪除</button></td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div id="dessert">
            <table border="4">
                <tr>
                    <th>甜點</th>
                </tr>
                    @foreach($dessert as $key => $value)
                        <tr>
                            <td>{{ $value['Name'] }}</td>
                            <td>{{ $value['Price'] }}</td>
                            <td><a href="{{ route('edit', ['id' => $value['Id']]) }}">編輯</a></td>
                            <td><button onclick="destroy('{{ $value['Id'] }}', '{{ csrf_token() }}')">刪除</button></td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <div style="margin:10px">
        <a href="{{ route('create') }}">新增菜單</a>
    </div>
@endsection