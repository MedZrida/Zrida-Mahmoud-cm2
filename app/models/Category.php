<?php

class Category
{
    //inserer une categorie dans la bdd
    public function create($data)
    {
        $db = Database::getInstance();
        $arr['nameCategory'] = $data->data;

        if (!preg_match("/^[a-zA-Z ]+$/", trim($arr['nameCategory']))) {
            $_SESSION['error'] = "Veuillez entrer un nom de categorie valide.";
        }

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $query = "INSERT INTO category (nameCategory) VALUES (:nameCategory)";
            $check = $db->write($query, $arr);

            if ($check) {
                return true;
            }
        }
        return false;
    }

    //supprimer une categorie dans la bdd
    public function delete($idCategory)
    {
        $db = Database::getInstance();

        if (isset($idCategory)) {
            $check = $db->write("DELETE FROM category WHERE idCategory = $idCategory");

            if ($check) {
                return true;
            } else {
                $_SESSION['error'] = "Une erreur est survenue.";
            }
            return false;
        }
    }

    //mettre a jour une categorie dans la bdd
    public function updateCategory($idCategory, $nameCategory)
    {
        $db = Database::getInstance();

        if (isset($idCategory) && isset($nameCategory)) {
            $query = "UPDATE  category SET nameCategory = :nameCategory WHERE idCategory = :idCategory";
            $arr['idCategory'] = $idCategory;
            $arr['nameCategory'] = $nameCategory;

            $check = $db->write($query, $arr);

            if ($check) {
                return true;
            } else {
                $_SESSION['error'] = "Error";
            }
            return false;
        }
    }

    //selectionner toutes les categories de la bdd
    public function getAll()
    {
        $db = Database::getInstance();
        $data = $db->read("SELECT * FROM category ORDER BY idCategory DESC");
        return $data;
    }


    //affichage des categories
     
    public function makeTable($categories)
    {
        $tableHTML = "";
        if (is_array($categories)) {
            foreach ($categories as $category) {
                $args = $category->idCategory . ",'" . $category->nameCategory . "'";

                $tableHTML .= '<tr>
                            <th scope="row">' . $category->idCategory . '</th>
                            <td>' . $category->nameCategory . '</td>
                            <td><button class="btn btn-primary" onclick="displayEditForm(' . $args . ')">Modifier</button></td>
                            <td><button class="btn btn-warning" onclick="deleteCategory(' . $category->idCategory . ')">Supprimer</button></td>
                        </tr>';
            }
        }
        return $tableHTML;
    }
}
