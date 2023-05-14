<?php


// echo $rows;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include("../connectionPHP/connect.php");
    $sort = $_GET['sort'];
    if($sort == 1){ 
        $sql = "SELECT PRODUCT_ID, PRODUCT.NAME, PRODUCT.DESCRIPTION, PRODUCT.PRICE, PRODUCT.STOCK_AVAILABLE, PRODUCT.ALLERGY_INFORMATION, PRODUCT.IMAGE1, PRODUCT.IMAGE2, PRODUCT.IMAGE3, CATEGORY.CATEGORY_NAME FROM PRODUCT,CATEGORY, REVIEW WHERE PRODUCT.FK_CATEGORY_ID = CATEGORY.CATEGORY_ID AND PRODUCT.PRODUCT_ID = REVIEW.FK_PRODUCT_ID ORDER BY RATE";
        $arr = oci_parse($conn, $sql);
        oci_execute($arr);
        $rows = oci_fetch_all($arr, $a);
        echo json_encode($a);
    }
    else if($sort == 2){
        $sql = "SELECT PRODUCT_ID, PRODUCT.NAME, PRODUCT.DESCRIPTION, PRODUCT.PRICE, PRODUCT.STOCK_AVAILABLE, PRODUCT.ALLERGY_INFORMATION, PRODUCT.IMAGE1, PRODUCT.IMAGE2, PRODUCT.IMAGE3, CATEGORY.CATEGORY_NAME FROM PRODUCT,CATEGORY WHERE PRODUCT.FK_CATEGORY_ID = CATEGORY.CATEGORY_ID  ORDER BY PRODUCT.PRICE ASC";
        $arr = oci_parse($conn, $sql);
        oci_execute($arr);
        $rows = oci_fetch_all($arr, $a);
        echo json_encode($a);
    }
    else if($sort == 3){
        $sql = "SELECT PRODUCT_ID, PRODUCT.NAME, PRODUCT.DESCRIPTION, PRODUCT.PRICE, PRODUCT.STOCK_AVAILABLE, PRODUCT.ALLERGY_INFORMATION, PRODUCT.IMAGE1, PRODUCT.IMAGE2, PRODUCT.IMAGE3, CATEGORY.CATEGORY_NAME FROM PRODUCT,CATEGORY WHERE PRODUCT.FK_CATEGORY_ID = CATEGORY.CATEGORY_ID ORDER BY PRODUCT.PRICE DESC";
        $arr = oci_parse($conn, $sql);
        oci_execute($arr);
        $rows = oci_fetch_all($arr, $a);
        echo json_encode($a);
    }
    else{
        $sql = "SELECT PRODUCT_ID, PRODUCT.NAME, PRODUCT.DESCRIPTION, PRODUCT.PRICE, PRODUCT.STOCK_AVAILABLE, PRODUCT.ALLERGY_INFORMATION, PRODUCT.IMAGE1, PRODUCT.IMAGE2, PRODUCT.IMAGE3, CATEGORY.CATEGORY_NAME FROM PRODUCT,CATEGORY WHERE PRODUCT.FK_CATEGORY_ID = CATEGORY.CATEGORY_ID ORDER BY MANUFACTURE_DATE DESC";
        $arr = oci_parse($conn, $sql);
        oci_execute($arr);
        $rows = oci_fetch_all($arr, $a);
        echo json_encode($a);
    }
}

?>