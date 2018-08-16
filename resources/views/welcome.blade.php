@extends('layouts.app')
@section('content')
    <?php
    use App\Category;
    ?>
<div id="templatemo_main_wrapper">
    @yield('content')
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
                    <img src="images/templatemo_image_01.jpg" alt="Flowers" />
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
            <h2>Welcome to Floral Shop</h2>
            <p>Floral Shop is free website template by templatemo. Sed in suscipit risus, eget consectetur justo. Praesent lacinia, nisi quis commodo consectetur, diam magna laoreet felis, a pulvinar mauris enim in felis. Phasellus in mauris velit. In pellentesque massa in nisl auctor pellentesque. Donec fermentum convallis purus, id luctus nulla tempus in. Aliquam diam nibh, consectetur quis fringilla facilisis, egestas sed odio. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>

            @foreach($products as $product)
                <div class="product_box">
                    <a href="{{Route('catalog.good',['slug'=>$product->slug])}}"><img src="images/product/04.jpg" alt="floral set 1" /></a>
                    <h3>{{$product->name}}</h3>
                    <input type="hidden" id="pro_id" value="{{$product->id}}">
                    <p class="product_price">{{$product->price}} руб.</p>
                    <p class="add_to_cart">
                        <a href="{{Route('catalog.good',['slug'=>$product->slug])}}">Detail</a>
                        <button class="btn btn-default add_to_cart" id="addCart">Добавить в корзину</button>
                    </p>
                </div>
            @endforeach


        </div>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
</div> <!-- END of main wrapper -->
@endsection