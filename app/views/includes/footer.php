<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Fixé en Bas</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        
        #content {
            flex: 1;
        }

        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
        }
        
        .footer p {
            font-size: 0.8rem;
            margin: 0;
        }
        
        .footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="content">
        <!-- Contenu de la page -->
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2024 Esperance Store</p>
                </div>
                <div class="col-md-6">
                    <p>
                        <a href="#">Politique de confidentialité</a> | 
                        <a href="#">Conditions d'utilisation</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
