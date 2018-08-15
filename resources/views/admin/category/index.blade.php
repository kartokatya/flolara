@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <h2>Категории</h2>
        <a href="{{Route('category.create')}}" class="btn btn-success" style="position:absolute;top:20px;right: 30px;">+Добавить категорию</a>
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
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td> <form method="post" action="/admin/category/{{$category->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </div>
                        </form></td>
                    <td><a href="{{Route('category.edit',['id'=>$category->id])}}" class="btn btn-warning">Редактировать</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
