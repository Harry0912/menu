@extends('layouts/menu')

<h1>菜單編輯</h1>

<div style="margin:10px">
    餐點類型 : {{ $kind }}
</div>

<div style="margin:10px">
    餐點名稱 : <input type="text" id="name" value="{{ $name }}">
</div>

<div style="margin:10px">
    餐點價格 : <input type="text" id="price" value="{{ $price }}">
</div>

<div style="margin:10px">
    <button onclick="update()">更新菜單</button>
</div>

<input type="hidden" id="id" value="{{ $id }}">
<input type="hidden" id="url" value="{{ route('update') }}">
<input type="hidden" id="csrf" value="{{ csrf_token() }}">