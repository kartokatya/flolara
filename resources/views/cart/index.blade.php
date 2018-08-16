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
                            $cat->categoryTree($categories,0);?>
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
                <h2>Shopping Cart</h2>
                <table width="700" border="0" cellpadding="5" cellspacing="0">
                    <tr bgcolor="#395015">
                        <th width="168" align="left">Item</th>
                        <th width="188" align="left">Name</th>
                        <th width="60" align="center">Quantity</th>
                        <th width="80" align="right">Price</th>
                        <th width="80" align="right">Total</th>
                        <th width="64"> </th>
                    </tr>
                    @foreach($cart as $val)
                        <tr bgcolor="#41581B">
                        <td><img src="images/product/01.jpg" alt="flower image 1" /></td>
                        <td>{{$val->product($val->product_id)->name}}</td>
                        <td align="center"><input name="quantity1" type="text" id="quantity1" value=" {{$val->quantity}}" size="6" maxlength="2" /> </td>
                        <td align="right">${{$val->product($val->product_id)->price}}</td>

                        <td align="right">${{$val->quantity*$val->product($val->product_id)->price}}</td>
                        <td align="center"> <a href="#"><img src="images/remove.png" alt="remove" /><br />Remove</a> </td>
                    </tr>
                    @endforeach
                </table>
                <div class="cleaner h20"></div>
                <div class="right"><a href="checkout.html" class="button">checkout</a></div>
                <div class="cleaner h20"></div>
                <div class="blank_box">
                    <a href="#"><img src="images/free_shipping.jpg" alt="Free Shipping" /></a>
                </div>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of main -->
    </div> <!-- END of main wrapper -->
    @endsection

