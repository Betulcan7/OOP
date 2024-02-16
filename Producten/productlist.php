<?php

class ProductList {
    private array $products = [];

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function displayProducts() {
        echo "<table border='1'>";
        echo "<tr><th>Naam product</th><th>Categorie</th><th>Verkoopprijs</th><th>Informatie</th></tr>";
        foreach ($this->products as $product) {
            echo "<tr>";
            echo "<td>{$product->getName()}</td>";
            echo "<td>{$product->getCategory()}</td>";
            echo "<td>{$product->getSalesPrice()}</td>";
            echo "<td>{$product->getInfo()}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
