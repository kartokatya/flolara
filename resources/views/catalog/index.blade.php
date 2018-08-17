@extends('layouts.app')
@section('content')
<?php
use App\Category;
use Illuminate\Support\Facades\Auth;
?>
    <div id="templatemo_main_wrapper">
        <div id="templatemo_main">
            <div id="sidebar" class="left">
                <div class="sidebar_box"><span class="bottom"></span>
                    <h3>Categories</h3>
                    <div class="content">
                        <ul class="sidebar_list">
                            <?php
                            $cat = new Category();
                            $cat->categoryTree($category,0);?>
                        </ul>
                    </div>
                </div>

                <div class="sidebar_box"><span class="bottom"></span>
                    <h3>Weekly Special</h3>
                    <div class="content special">
                        <img src="/images/templatemo_image_01.jpg" alt="Flowers" />
                        <a href="#">Citrus Burst Bouquet</a>
                        <p>
                            Price:
                            <span class="price normal_price">$160</span>&nbsp;&nbsp;
                            <span class="price special_price">$100</span>
                        </p>
                    </div>
                </div>
            </div>

            <div id="content" class="right">
                <h2>{{$thisCat->name}}</h2>
                <p>{{$thisCat->description}}</p>

                @foreach($thisCat->product as $product)
                    <div class="product_box">
                        <a href="{{Route('catalog.good',['slug'=>$product->slug])}}"><img src="/images/product/01.jpg" alt="floral set 1" /></a>
                        <h3>{{$product->name}}</h3>
                        <p class="product_price">{{$product->price}} руб.</p>
                        <p class="add_to_cart">

                            <a href="{{Route('catalog.good',['slug'=>$product->slug])}}">Detail</a>
                            <button data-token="{{ csrf_token() }}" data-id="{{$product->id}}"  class="add btn btn-default add_to_cart">Добавить в корзину</button>

                        </p>
                    </div>
                    @endforeach


                <div class="blank_box">
                    <a href="#" class="button left">Previous</a>
                    <a href="#" class="button right">Next Page</a>
                </div>
                <div class="cleaner h20"></div>

            </div>
            <div class="cleaner"></div>
        </div> <!-- END of main -->
    </div> <!-- END of main wrapper -->

@endsection