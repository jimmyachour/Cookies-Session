<?php $title = 'Accueil Cookies Factory' ?>

<?php ob_start()?>

<section class="cookies container-fluid">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ( isset( $allProducts )){
                                foreach ($allProducts as $idProduct => $product)
                                {
                                ?>
                                <tr>
                                    <td><img class="img-cart" src="./assets/img/product-<?= $idProduct ?>.jpg"/></td>
                                    <td><?= $product['name'] ?></td>
                                    <td>In stock</td>
                                    <td><input class="form-control" type="text" value="<?= $product['qty'] ?>"/></td>
                                    <td class="text-right"><?= $product['ttPrice'] ?>€</td>
                                    <td class="text-right"><a href="index.php?action=delete&amp;productid=<?= $idProduct ?>"
                                                              class="btn btn-sm btn-danger trash-can">&#x1F5D1;<i
                                                    class="fa fa-trash"></i> </a></td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><?php if ( isset($ticket)){

                                    echo $ticket['subTotal'];

                                } else {

                                    echo '0 ';
                                }

                                ?>€</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right"><?php if ( isset($ticket)){

                                    echo $ticket['shipping'];

                                } else {

                                    echo '0 ';
                                }

                                ?>€</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>
                                    <?php if ( isset($ticket)){

                                        echo $ticket['totalCart'];

                                    } else {

                                        echo '0 ';
                                    }

                                    ?>€</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a class="btn btn-lg btn-block btn-cart-continue text-uppercase" href="index.php?action=home">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a class="btn btn-lg btn-block btn-cart-valid text-uppercase" href="index.php?action=validCart">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('inc/template.php');
var_dump($_SESSION);?>