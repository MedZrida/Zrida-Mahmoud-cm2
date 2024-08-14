<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esperance Store - <?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= ASSETS ?>css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <?php if (isset($css)) : ?>
        <link rel="stylesheet" href="<?= ASSETS . $css ?>">
    <?php endif; ?>
</head>

<body style="overflow-x:hidden;">

    <!-- Header -->
    <div class="footer-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= ROOT ?>home">
                    <img src="../public/assets/img/logo.jpg" alt="Esperance Store" style="height: 80px;"> <!-- Utilisation du chemin relatif -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT ?>products">Nos Produits</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (isset($data['userData'])) : ?>
                            <li class="nav-item">
                                <a href="<?= ROOT ?>profil" class="nav-link"><?= $data['userData']->pseudoMember ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT ?>logout">Se déconnecter</a>
                            </li>
                        <?php else :; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT ?>login">Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT ?>signUp">S'inscrire</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a class="btn btn-primary" href="<?= ROOT ?>Cart"><i class="bi bi-cart3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <?php if ((isset($data['userData'])) && ($data['userData']->isAdmin)) : ?>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="admin">Interface Admin</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin" aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAdmin">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= ROOT ?>admin/categories">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= ROOT ?>admin/products">Produits</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= ROOT ?>admin/commands">Commandes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= ROOT ?>admin/users">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-pprn3073KE6tl6fi6i9eKS36l5FL9/zj5PaXtk1qq2rdskqtxz+EZtqCG6Drz8UY" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9AHRBfZZl/eOGJHAtzHE2i0O7/Qmhl0J6EwtG6bCMUj6M/7K4eX5sW9" crossorigin="anonymous"></script>
</body>

</html>
