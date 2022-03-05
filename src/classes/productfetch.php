<?php
include("DB.php");
class Product extends DB{
    public string $pname;
    public string $category;
    public int $price;
    public int $quantity;
    public string $name;
    public string $email;
    

    public function createProduct($pname,$category,$price,$quantity,$name,$email){
        $this->pname=$pname;
        $this->category=$category;
        $this->price=$price;
        $this->quantity=$quantity;
        $this->name=$name;
        $this->email=$email;

    }
    public function addProduct(Product $product){
        DB::getInstance()->exec("INSERT INTO products(product_name,product_category,product_price,product_quantity,name,email)
        VALUES('$product->pname','$product->category','$product->price','$product->quantity','$product->name','$product->email');");
    }
    
    public function getProductList()
       {
            $stmt = DB::getInstance()->prepare("SELECT * from products;");
           
            $stmt->execute();
       
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
       } 


       public function deleteProduct($id)
       {
            DB::getInstance()->exec("DELETE FROM products where product_id=$id");

       }

       public function getProductDetail($p_id)
       {
            $stmt = DB::getInstance()->prepare("SELECT * from products where product_id=$p_id;");
           
            $stmt->execute();
       
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
       }

       public function updateProduct($p_id,$p_name,$p_category,$p_price,$p_quantity,$name,$email)
       {
        DB::getInstance()->exec("UPDATE products SET name='$name',product_name='$p_name',email='$email',product_price='$p_price',product_category='$p_category',product_quantity='$p_quantity' WHERE product_id=$p_id");

       }

    }
?>