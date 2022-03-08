<?php
include("DB.php");
class Product extends DB{
    public string $pname;
    public string $category;
    public int $price;
    public int $quantity;
    public string $name;
    public string $email;
    public  $image;
    

    public function createProduct($pname,$category,$price,$quantity,$name,$email,$image){
        $this->pname=$pname;
        $this->category=$category;
        $this->price=$price;
        $this->quantity=$quantity;
        $this->name=$name;
        $this->email=$email;
        $this->image=$image;

    }
    public function addProduct(Product $product){
        DB::getInstance()->exec("INSERT INTO products(product_name,product_category,product_price,product_quantity,name,email,product_image)
        VALUES('$product->pname','$product->category','$product->price','$product->quantity','$product->name','$product->email','$product->image');");
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

       public function getProductDetail($id)
       {
            $stmt = DB::getInstance()->prepare("SELECT * from products where product_id=$id;");
           
            $stmt->execute();
       
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
       }

       public function updateProduct($id,$name,$pname,$category,$price,$quantity,$email)
       {
        DB::getInstance()->exec("UPDATE products SET name='$name',product_name='$pname',email='$email',product_price='$price',product_category='$category',product_quantity='$quantity' WHERE product_id=$id");

       }

    }
?>