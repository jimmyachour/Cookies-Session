<?php

function checkUsername($userInput)
{
    $validUserName = ['Jimmy','Florent', 'Admin'];

    if (in_array($userInput, $validUserName)){

        $_SESSION['user'] = $userInput;
        $_SESSION['statusLog'] = 1;

        return true;

    } else {

        return false;

    }
}

function destroyUserSession()
{
    unset($_SESSION['user']);
    unset($_SESSION['statusLog']);
    unset($_SESSION['cart']);
    unset($_SESSION['nbArticles']);
}



