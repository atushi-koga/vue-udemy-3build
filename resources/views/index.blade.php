<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="referrer" content="never"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vue.js Poster Shop</title>
  <link rel="shortcut icon" type="image/x-icon" href="/public/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800" rel="stylesheet"
        type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">

  <!-- Fonts -->
  {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" type="text/css" href="/search.css">
  {{--<link rel="stylesheet" href="{{ mix('/css/app.css') }}">--}}
</head>
<body>
<div class="content">
  <div id="app" v-cloak>
    <div id="loading">Loading...</div>
    <div class="header">
      <div class="container">
        <div class="title">
          {{--<img src="public/logo.png">--}}
          <img src="/logo.png">
          <h1>Vue.js Poster Shop</h1>
        </div>
        <form class="search-bar" @submit.prevent="search">
          <input type="text" placeholder="Search for posters" v-model="searchWord" required="required"
                 autocapitalize="off" autocorrect="off">
          <button type="submit" class="btn btn-success">Search</button>
        </form>
        <p>Try search terms <em>cat, dog, flower</em></p>
      </div>
    </div>

    <div class="main container">
      <div v-if="loading" class="products">Loading...</div>
      <div v-else class="products">
        <div class="search-results">
          Found @{{ searchResult.length }} results for search term <em>@{{ lastSearchWord }}</em>.
        </div>

        <!-- search result -->
        <div class="product" v-for="item in products" :key="item.id">
          <div>
            <div class="product-image">
              <img :src="item.image_path">
            </div>
          </div>
          <div>
            <h4 class="product-title">@{{ item.name }}</h4>
            <p class="product-price"><strong>@{{ item.price | currency }}</strong></p>
            <button class="add-to-cart btn" @click="addItemToCart(item)">Add to cart</button>
          </div>
        </div>
      </div>
      <div id="product-list-bottom"></div>

      <!-- shopping cart -->
      <div class="cart">
        <h2>Shopping Cart</h2>
        <div v-if="cartItems.length === 0" class="empty-cart">
          No items in the cart
        </div>
        <transition-group tag="ul" name="fade">
          <li class="cart-item" v-for="cartItem in cartItems" :key="cartItem.id">
            <div class="item-title">@{{ cartItem.name }}</div>
            <span class="item-qty">@{{ cartItem.price | currency }} x @{{ cartItem.count }}</span>
            <button class="btn" @click="addItemOfCart(cartItem)">+</button>
            <button class="btn" @click="reduceItemOfCart(cartItem)">-</button>
          </li>
        </transition-group>
        <transition name="fade">
          <div v-if="cartItems.length">
            <div class="cart-total">Total: @{{ totalPrice | currency }}</div>
          </div>
        </transition>
      </div>
    </div>
  </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>