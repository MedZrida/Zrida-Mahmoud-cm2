<?php

class CartModel
{
    // Ajoute un produit dans le panier
    public function addToCart($product)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart']['name'] = array();
            $_SESSION['cart']['idProduct'] = array();
            $_SESSION['cart']['quantity'] = array();
            $_SESSION['cart']['price'] = array();
        }

        $_SESSION['cart']['name'][] = $product->nameProduct;
        $_SESSION['cart']['idProduct'][] = $product->idProduct;
        $_SESSION['cart']['quantity'][] = 1;
        $_SESSION['cart']['price'][] = $product->priceProduct;
    }

    // Supprime le panier
    public function deleteCart()
    {
        unset($_SESSION['cart']);
    }

    // Crée une table HTML pour le panier
    public function makeHTMLCart($cart)
    {
        $html = "";
        if (is_array($cart) && isset($cart['idProduct'])) {
            $num_items = count($cart['idProduct']);
            for ($i = 0; $i < $num_items; $i++) {
                $html .= '<tr>
                            <th scope="row">' . ($i + 1) . '</th>
                            <td>' . htmlspecialchars($cart['name'][$i]) . '</td>
                            <td>' . htmlspecialchars($cart['quantity'][$i]) . '</td>
                            <td>' . htmlspecialchars($cart['price'][$i]) . '</td>
                            <td>
                                <button class="btn btn-danger">
                                    <a href="' . ROOT . 'cart/deleteProduct/' . $cart['idProduct'][$i] . '">Delete</a>
                                </button>
                            </td>
                          </tr>';
            }
        }
        return $html;
    }

    // Calcule le montant total du panier
    public function calculateTotalAmount($cart)
    {
        $totalAmount = 0;
    
        if (isset($cart['price']) && isset($cart['quantity'])) {
            $num_items = count($cart['price']);
            for ($i = 0; $i < $num_items; $i++) {
                $totalAmount += $cart['price'][$i] * $cart['quantity'][$i];
            }
        }
    
        return $totalAmount;
    }
}
