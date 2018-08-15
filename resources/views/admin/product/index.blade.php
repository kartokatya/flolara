@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <h2>Товары</h2>
        <a href="{{Route('product.create')}}" class="btn btn-success" style="position:absolute;top:20px;right: 30px;">+Добавить товар</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Действие</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->short_text}}</td>
                    <td> <form method="post" action="/admin/product/{{$product->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </div>
                        </form></td>
                    <td><a href="{{Route('product.edit',['id'=>$product->id])}}" class="btn btn-warning">Редактировать</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
