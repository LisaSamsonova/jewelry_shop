@extends('header')

@section('content')
<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <div>
        <a class="navbar-brand" href="#">Ювелирный магазин</a>
    </div>
    <form action="{{ route('create') }}" method="GET">
        @csrf
        <button name="type" value="buyer" type="submit" class="btn btn-primary">Создать запись</button>
    </form>
    <form method="POST" action="{{ route('discount') }}">
        @csrf
        <input type="number" name="discount" min="0" max="100" step="1">
        <button type="submit" class="btn btn-primary">Сделать скидку</button>
    </form>
    <div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="{{ route('orders') }}">Заказы</a>
            <a class="nav-link active" aria-current="page" href="{{ route('buyers') }}">Покупатели</a>
            <a class="nav-link active" aria-current="page" href="{{ route('products') }}">Продукты</a>
            <a class="nav-link active" aria-current="page" href="{{ route('types') }}">Типы</a>
        </ul>
        </div>
    </div>
  </div>
</nav>
<main>
    @switch($type)
        @case('types')
            @include('types')
            @break
        @case('products')
            @include('products')
            @break
        @case('orders')
            @include('orders')
            @break
        @case('buyers')
            @include('buyers')
            @break
    @endswitch
</main>

@endsection