<?php $this->view("includes/header", $data); ?>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-8 text-center">
            <h1 class="">Votre Panier</h1>
        </div>
    </div>
    <?php
    if (isset($_SESSION['idCommand'])) {
        echo "Votre numéro de commande : " . $_SESSION['idCommand'];
        unset($_SESSION['idCommand']);
    }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Numero de commande</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix($)</th>
                <th scope ="col"> Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $cart;
            ?>
        </tbody>
    </table>

    <?php
    if (isset($buttonValidate)) {
        echo $buttonValidate;
    }
    if (isset($button)) {
        echo $button;
    }
    ?>
</div>
<?php $this->view("includes/footer", $data); ?>