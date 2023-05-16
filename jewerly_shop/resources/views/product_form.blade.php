@extends('header')

@section('content')
    <form class="form" action="{{ isset($id) ? route('update') : route('create') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Наименование изделия</label>
            <input name="title" value="{{ isset($title) ? $title : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Наименование" required >
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Цена Р.</label>
            <input name="price" value="{{ isset($price) ? $price : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Цена" required pattern="[0-9]*" min="1" max="1000000" >
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">Описание</label>
            <input name="discription" value="{{ isset($description) ? $description : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Какое-то описание" required >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Тип изделия</label>
            <select name="tipe" id="inputState" class="form-control">
                @foreach ($types as $tipe)
                    <option value="{{ $tipe->id }}">{{ $tipe->title }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}">
        <button name="type" value="products" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection