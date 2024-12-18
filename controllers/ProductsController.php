<?php
function controller_product(Req $req)
{
    $id = $_GET['id'];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;   
    if (!$id) error();
    $categories = $req->categoriesService->getAll();
    $category = $req->categoriesService->findOne($id);
    $products_page = $req->productsService->getProductsByCategory($id, $page);
    $products = $products_page['products'];
    return view("products", [
        'typeProduct' => $category,
        "categories" => $categories,
        "products" => $products,
        'products_page' => $products_page,
    ]);
}

function controller_detail_product(Req $req)
{
    $categories = $req->categoriesService->getAll();
    $id = $_GET["id"];
    if (!$id) error();
    $productDetail = $req->productsService->getProductsDetail($id);
    if (!$productDetail) error();
    if (isset($_POST['add-cart'])) {
        $user = $_SESSION['user'];
        if (!$user) header('location: ?act=login');
        $amount = $_POST['amount'];
        $idProduct = $_POST['product-detail'];
        $idCart = $_SESSION['user']['id_cart'];
        $productCart = $req->cartsService->addCart($idProduct, $idCart, $amount);
        if (!$productCart) header("location: ?" . $_SERVER['QUERY_STRING']);
        if ($productCart) {
            $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
            header("location: ?" . $_SERVER['QUERY_STRING']);
        }
    }
    $review = false;
    if (isset($_GET['review'])) {
        $idReview = $_GET['review'];
        $idUser = $_SESSION['user']['id'];
        $productIds = $req->billsService->checkReview($idReview, $idUser);
        if ($productIds) {
            foreach ($productIds as $productId) {
                extract(array: $productId);
                if ($id_product == $id && $status == 5) {
                    $review = true;
                }
            }
        }
    }
    return view("detailProduct", ["categories" => $categories, "productDetail" => $productDetail, 'isReview' => $review]);
}


