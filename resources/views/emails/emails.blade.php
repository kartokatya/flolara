<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
Заказ от <b> {{$user->name}}</b>:
<p> Email:  {{$user->email}}</p>
<p> Адрес: {{$order->adress}} </p>
<p> Телефон: {{$order->phone}} </p>
<p> Доставка: {{$order->delivery}} </p>
<p> Оплата: {{$order->payment}} </p>

    <table width="850" cellpadding="5" cellspacing="0">
        <tr>
            <td width="350">Название</td>
            <td width="200">Цена, руб</td>
            <td width="100">Количество, шт</td>
            <td width="200">Цена*кол, руб</td>
        </tr>
@foreach($cart  as $product)
            <tr>
                <td width="350">{{$product->product($product->product_id)->name}}</td>
                <td width="200">{{$product->product($product->product_id)->price}}</td>
                <td width="100">{{$product->quantity}}</td>
                <td width="200">{{$product->quantity*$product->product($product->product_id)->price}}</td>
            </tr>
@endforeach
</table>
</body>
</html>
