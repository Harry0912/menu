@extends('layouts/menu')

<h1>新增菜單</h1>

<div style="margin:10px; display:flex">
    餐點種類 :
    <input type="radio" name="kind" id="gratin" value="gratin" checked>
    <label for="gratin">焗烤</label>
    <input type="radio" name="kind" id="curry" value="curry">
    <label for="gratin">咖哩</label>
    <input type="radio" name="kind" id="beverage" value="beverage">
    <label for="gratin">飲品</label>
    <input type="radio" name="kind" id="dessert" value="dessert">
    <label for="gratin">甜點</label>
</div>

<div style="margin:10px">
    餐點名稱 : <input type="text" id="name">
</div>

<div style="margin:10px">
    餐點價格 : <input type="text" id="price">
</div>

<div style="margin:10px">
    <button onclick="store()">新增菜單</button>
</div>

<input type="hidden" id="url" value="{{ route('store') }}">
<input type="hidden" id="csrf" value="{{ csrf_token() }}">