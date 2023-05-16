@extends('header')

@section('content')
    <form class="form" action="{{ isset($id) ? route('update') : route('create') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Покупатель</label>
            <select name="buyer" id="inputState" class="form-control">
                @foreach ($buyers as $buyer)
                    <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Продукт</label>
            <select name="product" id="inputState" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Количество</label>
            <input name="amount" value="{{ isset($amount) ? $amount : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Количество" required pattern="[0-9]*" min="1" max="100" >
        </div>
        <input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}">
        <button name="type" value="orders" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection