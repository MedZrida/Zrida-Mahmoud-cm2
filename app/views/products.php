<?php $this->view("includes/header", $data); ?>
<div class="row justify-content-center">
    <div class="col-6 text-center">
        <h2>Les Produits</h2>
    </div>
</div>
<div class="container">
    <div class="row my-5 justify-content-center">
        <?php
        echo $htmlProducts;
        ?>
    </div>
</div>
<?php $this->view("includes/footer", $data); ?>