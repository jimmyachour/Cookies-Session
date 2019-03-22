<?php

require('./controller/factoryController.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'home') {

        index();

    } elseif ($_GET['action'] == 'login') {

        if(isset($_SESSION['user'])){

            index();

        } else {

            login();
        }

    } elseif ($_GET['action'] == 'checkUser') {

        checkUser($_POST['loginname']);

    } elseif ($_GET['action'] == 'logout') {

        logout();

    } elseif ($_GET['action'] == 'cart') {

        if (isset($_SESSION['user'])) {

            cart();

        } else {

            login();
        }

    } elseif ($_GET['action'] == 'addCart') {

        addCart($_GET['add_to_cart']);

    } elseif ($_GET['action'] == 'delete') {

        deleteProduct($_GET['productid']);

    }  else {

        page404();

    }

} else {

    index();

}