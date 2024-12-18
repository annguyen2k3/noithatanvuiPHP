<?php
function controller_home(Req $req)
{
    $page = isset($_GET['limit']) ? $_GET['limit'] : 1;
    $categories = $req->categoriesService->getAll();
    $products = $req->productsService->getProductsLimit($page);
    $productsSelling = $req->productsService->getSelling();
    $vouchers = $req->vouchersService->getVouchersNew();
    return view("home", [
        "categories" => $categories,
        "productsSelling" => $productsSelling,
        "products" => $products,
        'vouchers' => $vouchers,
        'page' => $page
    ]);
}

