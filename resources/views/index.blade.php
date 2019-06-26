<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
          <img src="/api/csrf">
          <h1>Vue.js Poster Shop</h1>
        </div>
        <form class="search-bar">
          <input type="text" placeholder="Search for posters" v-model="searchWord" required="required" autocapitalize="off" autocorrect="off">
          <button type="button" @click="search" value="Search" class="btn btn-success">Search</button>
        </form>
        <p>Try search terms <em>cat, dog, flower</em></p></div>
    </div>

    <div class="main container">
      <div v-if="loading">Loading...</div>
      <div v-else class="products">
        <div class="search-results">
          Found @{{ resultCount }} results for search term <em>@{{ searchedWord }}</em>.
        </div>

        <!-- search result -->
        <div class="product" v-for="item in searchResult" :key="item.id">
          <div>
            <div class="product-image">
              {{--<img src="/public/images/cat1.jpg">--}}
            </div>
          </div>
          <div><h4 class="product-title">@{{ item.name }}</h4>
            <p class="product-price"><strong>$@{{ item.price }}</strong></p>
            <button class="add-to-cart btn" @click="addItemToCart(item)">Add to cart</button>
          </div>
        </div>
        <div id="product-list-bottom"><!----></div>
      </div>

      <!-- shopping cart -->
      <div class="cart">
        <h2>Shopping Cart</h2>
        <ul v-for="cartItem in cartItems" :key="cartItem.id">
          <li class="cart-item">
            <div class="item-title">@{{ cartItem.name }}</div>
            <span class="item-qty">$@{{ cartItem.price }} x @{{ cartItem.count }}</span>
            <button class="btn" @click="addItemOfCart(cartItem)">+</button>
            <button class="btn" @click="reduceItemOfCart(cartItem)">-</button>
          </li>
        </ul>
        <div>
          <div class="cart-total">Total: $@{{ totalPrice }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>