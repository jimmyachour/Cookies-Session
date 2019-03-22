<?php

function addArticleInCart($idProduct)
{
    if (!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = [];

    }

    if (isset($_SESSION['cart'][$idProduct])) {

        $_SESSION['cart'][$idProduct] += 1;

    } else {

        $_SESSION['cart'][$idProduct] = 1;

    }

    countArticleInCart();
}

function countArticleInCart()
{
    $nbArticles = 0;

    foreach ($_SESSION['cart'] as $idProduct => $quantity)
    {
        $nbArticles += $quantity;
    }

    $_SESSION['nbArticles'] = $nbArticles;
}

function deleteArticleInCart($idProduct)
{
    if(isset($_SESSION['cart'])){

        foreach ($_SESSION['cart'] as $id => $qty)
        {

            if ( $id == $idProduct ){

                $_SESSION['nbArticles'] -= $qty;

                unset($_SESSION['cart'][$id]);

            }
        }
    }
}

function getProducts():array
{

    $products = [

        36 => ['name' => 'Chocolate chips', 'price' => 2.5],
        46 => ['name' => 'Pecan nuts', 'price' => 2.5],
        58 => ['name' => 'M&M\'s&copy; cookies', 'price' => 3.5],
        32 => ['name' => 'Chocolate cookie', 'price' => 3],

    ];

    $selectedProduct = [];

    foreach ($_SESSION['cart'] as $id => $quantity)
    {

        foreach ($products as $idProduct => $product)
        {

            if( $id == $idProduct){

                $product['qty'] = $quantity;
                $product['ttPrice'] = $product['price']*$quantity;
                $selectedProduct[$idProduct] = $product;

            }
        }
    }

    return $selectedProduct;

}

function getTotalCart()
{

    $ttCart = 0;
    $allProducts = getProducts();

    foreach ($allProducts as $product)
    {
        $ttCart += $product['ttPrice'];
    }

    return $ttCart;
}

function getAllTicket()
{
    $subTotal = getTotalCart();
    $shipping = 5;
    $totalCart = $subTotal + $shipping;


    $ticket = [

        'subTotal' => $subTotal,
        'shipping' => $shipping,
        'totalCart' => $totalCart,
    ];

    return $ticket;

}
