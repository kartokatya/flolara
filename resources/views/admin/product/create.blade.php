@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <h2>Добавление товара</h2>

        <div class="table-responsive">
            <form method="post" action="">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="icon">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="form-group">
                    <label for="short_description">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="short_description">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="short_description">Image</label>
                    <input type="text" class="form-control"  name="image">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control form-control-sm" name="category" >
                        <option value="">Выбрать категорию</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="short_text">Short text</label>
                    <textarea class="form-control" name="short_text"  rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="contentt">Content</label>
                    <textarea class="form-control" name="contentt"  rows="3"></textarea>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="main" value="true">
                    <label class="form-check-label" for="main">Выводить на главной</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

            </form>
            @if (count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </main>


@endsection