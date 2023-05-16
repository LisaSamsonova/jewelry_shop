@extends('header')

@section('content')
    <form class="form" action="{{ isset($id) ? route('update') : route('create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Название типа</label>
            <input name="title" value="{{ isset($title) ? $title : '' }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название" required >
        </div>
        <input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}">
        <button name="type" value="types" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection