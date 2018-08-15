@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <h2>Обновление товара</h2>

        <div class="table-responsive">
            <form method="post" action="">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="icon">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$product->slug}}">
                </div>
                <div class="form-group">
                    <label for="short_description">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="short_description">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="short_description">Image</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{$product->image}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control form-control-sm" name="category" value="{{$product->parent_id}}" >
                        <option value="">Выбрать категорию</option>
                        @foreach($categories as $item)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Родительская категория</label>
                    <select class="form-control form-control-sm" name="category" value="{{$product->category}}">
                        <option value="">Выбрать категорию</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{!! $product->description!!}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short text</label>
                    <textarea class="form-control" name="short_text" id="short_text" rows="3">{!! $product->short_text!!}</textarea>
                </div>

                 <div class="form-group">
                     <label for="exampleFormControlTextarea1">Content</label>
                     <textarea class="form-control" name="contentt" id="contentt" rows="3"></textarea>
                 </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="main" value="{!! $product->main!!}">
                    <label class="form-check-label" for="main">Выводить на главной</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

            </form>
        </div>
    </main>
@endsection