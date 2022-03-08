<?php
session_start();
include("productfetch.php");
function addProduct($pname,$category,$price,$quantity,$name,$email,$image){
    $product =new Product();
    $product->createProduct($pname,$category,$price,$quantity,$name,$email,$image);
    $product->addProduct($product);
}
function displayProduct()
{
    
  $p_list=new Product();
    $list=$p_list->getProductList();
    $_SESSION['p_disp']="<div class='table-responsive'>
    <table class='table table-striped table-sm'>
      <thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Product Name</th>
          <th scope='col'>Product Category</th>
          <th scope='col'>Product Price</th>
          <th scope='col'>Product Quantity</th>
          <th scope='col'>Name</th>
          <th scope='col'>Email</th>
          <th scope='col'>Product Image</th>
        </tr>
      </thead>
      <tbody>";

        foreach($list as $key=>$p)
        {
            $_SESSION['p_disp'].="<tr><form action='' method='post'>
                <td>".$p['product_id']."</td>
                <td>".$p['product_name']."</td>
                <td>".$p['product_category']."</td>
                <td>".$p['product_price']."</td>
                <td>".$p['product_quantity']."</td>
                <td>".$p['name']."</td>
                <td>".$p['email']."</td>
                <td>".$p['product_image']."</td>
                <td><input style='display:none' name='id' value='".$p['product_id']."'><button name='action' value='edit'>EDIT</button><button name='action' value='delete'>DELETE&nbsp;</button></td></form>
          </tr>";
        }

        $_SESSION['p_disp'].="</tbody></table>";

}
function getProductList()
{
    $product=new Product();
    return $product->getProductList();

}
function deleteProduct($id)
{
    $product=new Product();
    $product->deleteProduct($id);
    displayProduct();
}

function getProductDetail($id)
{
    $product=new Product();
    return $product->getProductDetail($id);

}
function updateProduct($id,$pname,$category,$price,$quantity,$name,$email)
{
    $product=new Product();
    if($pname!="" && $price!="" && $quantity!="" && $category!="" && $name!="" && $email!="")
    $product->updateProduct($id,$name,$category,$price,$quantity,$name,$email);
    
    
}
?>