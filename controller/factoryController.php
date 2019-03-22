<?php

require('./model/factoryManager.php');
require('./model/cartManager.php');
session_start();

function index()
{
    require('./view/home.php');
}

function login()
{

    require('./view/login.php');

}

function logout()
{
    destroyUserSession();
    require('./view/home.php');

}

function cart()
{
    if(isset($_SESSION['cart'])){

        $allProducts = getProducts();
        $ticket = getAllTicket();

        require('./view/cart.php');

    } else {

        require('./view/home.php');
    }
}

function checkUser($userInput)
{

    if( checkUsername($userInput) ){

        $alert ='<div class="alert alert-primary" role="alert">Ravie de vous revoir ' . $_SESSION['user'] . '</div>';
        require('./view/home.php');

    } else {

        $alert ='<div class="alert alert-danger" role="alert">Désolé mais vous n\'êtes enregistré</div>';
        require('./view/login.php');

    }

}

function addCart($idProduct)
{
    addArticleInCart($idProduct);
    require('./view/home.php');

}

function deleteProduct($idProduct)
{

    deleteArticleInCart($idProduct);
    if($_SESSION['nbArticles'] == 0){

        unset($_SESSION['nbArticles']);
        header('Location: index.php');

    } else {

        header('Location: index.php?action=cart');

    }

}

function page404()
{
    require('./view/404.php');
}