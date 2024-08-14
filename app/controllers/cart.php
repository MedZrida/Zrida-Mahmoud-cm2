<?php

require_once('../app/core/controller.php');

class Cart extends Controller
{
    // Index: Charge le model User et la view cart
    public function index()
    {
        $user = $this->loadModel('User');
        $userData = $user->checkLogin(['admin', 'customer']);

        if (is_object($userData)) {
            $data['userData'] = $userData;
        }

        $html = '<tr><td colspan="5" class="text-center">Vous n\'avez aucun produit dans votre panier</td></tr>';
        $buttonValidate = null;
        $button = '<button class="btn btn-primary"><a href="' . ROOT . 'products">Voir les produits</a></button>';

        if (isset($_SESSION['cart'])) {
            $cart = $this->loadModel('CartModel');
            $html = $cart->makeHTMLCart($_SESSION['cart']);
            $buttonValidate = '<button class="btn btn-primary"><a href="' . ROOT . 'cart/pay">Payer</a></button>';
            $button = '<button class="btn btn-danger"><a href="' . ROOT . 'cart/deleteCart">Supprimer le panier</a></button>';
        }

        $data['button'] = $button;
        $data['buttonValidate'] = $buttonValidate;
        $data['cart'] = $html;
        $data['pageTitle'] = "Panier";
        $this->view('cart', $data);
    }

    // Ajouter un produit au panier
    public function addCart($idProduct)
    {
        $user = $this->loadModel('User');
        $userData = $user->checkLogin(['admin', 'customer']);

        if (is_object($userData)) {
            $data['userData'] = $userData;
        }

        $productModel = $this->loadModel('Product');
        $product = $productModel->getOneProduct($idProduct);
        $cart = $this->loadModel('CartModel');
        $cart->addToCart($product[0]);
        header("location:" . ROOT . "cart");
    }

    // Supprimer le panier
    public function deleteCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        header("location:" . ROOT . "cart");
    }

    // Supprimer un produit du panier
    public function deleteProduct($idProduct)
    {
        if (isset($_SESSION['cart'])) {
            $index = array_search($idProduct, $_SESSION['cart']['idProduct']);
            if ($index !== false) {
                array_splice($_SESSION['cart']['idProduct'], $index, 1);
                array_splice($_SESSION['cart']['name'], $index, 1);
                array_splice($_SESSION['cart']['quantity'], $index, 1);
                array_splice($_SESSION['cart']['price'], $index, 1);
            }
        }
        header("location:" . ROOT . "cart");
    }

    public function pay()
    {
        $user = $this->loadModel('User');
        $userData = $user->checkLogin(['admin', 'customer']);
        
        if (is_object($userData)) {
            $data['userData'] = $userData;
        }
        
        // Initialize the cart model
        $cartModel = $this->loadModel('CartModel');
        
        // Calculate the total amount
        $totalAmount = $cartModel->calculateTotalAmount($_SESSION['cart']);
        $data['amount'] = $totalAmount;
        
        // Prepare the cart data
        $data['cart'] = $cartModel->makeHTMLCart($_SESSION['cart']);
        
        // Load the view with data
        $this->view('paypal_payment', $data);
    }
    
}
