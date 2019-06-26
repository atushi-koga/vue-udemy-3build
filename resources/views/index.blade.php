<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
  <meta charset="utf-8">
  <meta name="referrer" content="never" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vue.js Poster Shop</title>
  <link rel="shortcut icon" type="image/x-icon" href="/public/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">

  <!-- Fonts -->
  {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

  <link rel="stylesheet" type="text/css" href="/style.css">
  {{--<link rel="stylesheet" href="{{ mix('/css/app.css') }}">--}}
</head>
<body>
<div class="content">
  <div id="app">
    {{--<div id="loading">Loading...</div>--}}
    <div class="header">
      <div class="container">
        <div class="title">
          {{--<img src="public/logo.png">--}}
          <h1>Vue.js Poster Shop</h1>
        </div>
        <form class="search-bar">
          <input type="text" placeholder="Search for posters" required="required" autocapitalize="off"
                 autocorrect="off">
          <input type="submit" value="Search" class="btn">
          {{--<button type="button" class="btn btn-primary">Search</button>--}}
        </form>
        <p>Try search terms <em>cat, dog, flower</em></p></div>
    </div>

    <div class="main container">
      <div class="products">
        <div class="search-results">
          Found 11 results for search term <em>cat</em>.
        </div>

        <!-- search result -->
        <div class="product">
          <div>
            <div class="product-image">
              {{--<img src="/public/images/cat1.jpg">--}}
            </div>
          </div>
          <div><h4 class="product-title">Calico Cat</h4>
            <p class="product-price"><strong>$19.95</strong></p>
            <button class="add-to-cart btn">Add to cart</button>
          </div>
        </div>
        <div id="product-list-bottom"><!----></div>
      </div>

      <!-- shopping cart -->
      <div class="cart">
        <h2>Shopping Cart</h2>
        <ul>
          <li class="cart-item">
            <div class="item-title">Calico Cat</div>
            <span class="item-qty">$19.95 x 1</span>
            <button class="btn">+</button>
            <button class="btn">-</button>
          </li>
        </ul>
        <div>
          <div class="cart-total">Total: $19.95</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>