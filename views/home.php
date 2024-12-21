<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nội thất An Vui</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/asset/css/style.css" />
</head>

<body>
    <div class="bg-gray-100">
        <?php include('partials/header.php') ?>
        <div class="my-10 max-w-7xl mx-auto relative isolate rounded-xl">
            <img src="/asset/images/banner.png" alt="Banner Image" class="w-full h-auto rounded-xl object-cover">
        </div>

        <div class="bg-rose-700 mt-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-16">
                    <h2 class="text-3xl font-bold text-white">Sản phẩm bán chạy</h2>
                    <?php include('components/selling.php') ?>
                </div>
            </div>
        </div>
        <!-- component -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-16 px-2 max-w-screen-2xl mx-auto">
            <?php
            foreach ($vouchers as $voucher) {
                extract($voucher);
                ?>
                <div class="container mx-auto first:hidden last:hidden lg:first:block xl:last:block">
                    <div
                        class="bg-gradient-to-br from-green-700 to-green-600/80 text-gray-100 text-center py-6 px-5 rounded-lg shadow-md relative">
                        <h3 class="font-semibold mb-4">Giảm
                            <?= $discount ?>% cho khi thanh toán hóa đơn.
                        </h3>
                        <div class="text-sm flex items-center justify-center space-x-2 mb-2">
                            <span id="cpnCode" class="border-dashed border text-gray-100 px-4 py-2 rounded-l uppercase">
                                <?= $code ?>
                            </span>
                        </div>
                        <p class="text-xs">Từ
                            <?= $start ?> || đến
                            <?= $end ?>
                        </p>
                        <div
                            class="w-12 h-12 bg-gray-100 rounded-full absolute top-1/2 transform -translate-y-1/2 left-0 -ml-6">
                        </div>
                        <div
                            class="w-12 h-12 bg-gray-100 rounded-full absolute top-1/2 transform -translate-y-1/2 right-0 -mr-6">
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div>
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-4">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 my-10">Sản phẩm gợi ý</h2>
                <div class="mt-6 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
                    <?php include('components/product.php') ?>
                </div>
                <div class="flex justify-center mt-24 decoration-indigo-500 underline underline-offset-2">
                    <a href="?limit=<?= $page + 1 ?>" class="font-semibold py-1 px-6 rounded">Tải thêm</a>
                </div>
            </div>
        </div>
        
        <?php include('partials/footer.php') ?>
        <script src="/asset/js/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                keyboard: {
                    enabled: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>
    </div>
</body>

</html>