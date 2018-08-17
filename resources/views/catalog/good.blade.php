@extends('layouts.app')
@section('content')
    <?php
    use App\Category;
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
                    <h2>{{$product->name}}</h2>
                    <div class="content_half left">
                        <a  rel="lightbox" href="/images/product/image_01_l.jpg"><img src="/images/product/image_01.jpg" alt="yellow flowers" /></a>
                    </div>
                    <div class="content_half right">
                        <table>
                            <tr>
                                <td width="130">Price:</td>
                                <td width="84">${{$product->price}}</td>
                            </tr>
                            <tr>
                                <td>Availability:</td>
                                <td><strong>In Stock</strong></td>
                            </tr>
                            <tr><td>Quantity</td><td><input type="text" value="1" size="6" maxlength="2" /></td></tr>
                        </table>
                        <div class="cleaner h20"></div>
                        <a href="shoppingcart.html" class="button">Add to Cart</a>
                    </div>
                    <div class="cleaner h40"></div>

                    <h4>Описание товара</h4>
                    <p>{{$product->contentt}}<p>
                    <h3>Комментарии</h3>
                    <form>
                        <textarea style="width:100%;">Оставить комментарий</textarea>
                        <button type="submit" style="margin: 10px;">Отправить</button>
                    </form>


                    <div class="cleaner h40"></div>
                    <div class="blank_box">
                        <a href="#"><img src="/images/free_shipping.jpg" alt="Free Shipping" /></a>
                    </div>
                </div>
                <div class="cleaner"></div>
            </div> <!-- END of main -->
        </div> <!-- END of main wrapper -->




@endsection