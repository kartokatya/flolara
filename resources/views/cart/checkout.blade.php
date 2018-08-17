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
                <h2>Оформление заказа</h2>

                <h3>BILLING DETAILS</h3>
                <form method="POST" action="">
                    {{csrf_field()}}
                <div class="content_half left form_field">
                    Имя:
                    <input name="name" type="text" id="fullname" maxlength="40" value="{{Auth::user()->name}}" />
                    Доставка:
                    <select name="delivery">
                        <option value="Курьером">Курьером</option>
                        <option value="Самовывоз">Самовывоз</option>
                    </select>
                    Способ оплаты:
                    <select name="payment">
                        <option value="Картой">Картой</option>
                        <option value="Наличными">Наличными курьеру</option>
                        <option value="Ерип">Ерип</option>

                    </select>
                </div>

                <div class="content_half right form_field">
                    Адрес:
                    <input name="adress" type="text" id="address" maxlength="40" />
                    Email:
                    <input name="email" type="text" id="email" maxlength="40" value="{{Auth::user()->email}}" />
                    Телефон:<br />
                    <input name="phone" type="text" id="phone" maxlength="40" />
                </div>

                <div class="cleaner h40"></div>

                <h3>SHOPPING CARD</h3>
                <h4>TOTAL: <strong>$560</strong></h4>

                    <button type="submit">Оформить заказ</button>
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

            <div class="cleaner"></div>
        </div> <!-- END of main -->
    </div> <!-- END of main wrapper -->
@endsection

