@extends('header')

@section('content')
    <form class="form" action="{{ isset($id) ? route('update') : route('create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">ФИО покупателя</label>
            <input name="name" style="margin-bottom: 10px" value="{{ isset($name) ? $name : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Фамилия И. О." required pattern="[А-ЯЁ][а-яё]+\s[А-ЯЁ]\.\s[А-ЯЁ]\." >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Номер телефона</label>
            <input name="phone" value="{{ isset($phone) ? $phone : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="89201111111" required pattern="^8\d{10}$" >
        </div>
        <input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}">
        <button name="type" value="buyers" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection