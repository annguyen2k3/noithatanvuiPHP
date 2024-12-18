<?php $navigates = [
    [
        'id' => 1,
        'name' => 'Trang chủ',
        'link' => ''
    ],
    [
        'id' => 2,
        'name' => 'Danh mục',
        'link' => 'categories'
    ],
    [
        'id' => 3,
        'name' => 'Sản phẩm',
        'link' => 'products'
    ],
    [
        'id' => 4,
        'name' => 'Tài khoản',
        'link' => 'accounts'
    ],
    [
        'id' => 5,
        'name' => 'vouchers',
        'link' => 'vouchers'
    ],
    [
        'id' => 6,
        'name' => 'Đánh giá',
        'link' => 'reviews'
    ],
    [
        'id' => 7,
        'name' => 'Đơn hàng',
        'link' => 'bills'
    ],
] ?>
<nav class="bg-gray-800 sticky top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/admin">
                        <img class="h-10 rounded-md" src="/asset/images/logo-anvui.jpg" alt="Your Company">
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <?php
                        foreach ($navigates as $navigate) {
                            extract($navigate);
                            $isActive = isset($_GET['act']) && $_GET['act'] == $link ? 'bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
                            ?>
                            <a href="/admin?act=<?= $link ?>"
                                class="<?= $isActive ?> text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">
                                <?= $name ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <p class="text-white">
                        <?= $_SESSION['user']['full_name'] ?>
                    </p>
                    <div class="relative ml-3 flex gap-4 items-center">
                        <div>
                            <button type="button"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="/asset/images/<?= $_SESSION['user']['avatar'] ? $_SESSION['user']['avatar'] : 'avatar-default.jpg' ?>"
                                    alt="">
                            </button>
                        </div>
                        <form action="/?act=logout" method="POST">
                            <button name="logout" type="submit" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 3.25a.75.75 0 0 1 0 1.5a7.25 7.25 0 0 0 0 14.5a.75.75 0 0 1 0 1.5a8.75 8.75 0 1 1 0-17.5Z" />
                                    <path fill="currentColor"
                                        d="M16.47 9.53a.75.75 0 0 1 1.06-1.06l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H10a.75.75 0 0 1 0-1.5h8.19l-1.72-1.72Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="admin" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Trang chủ</a>
            <a href="/admin?act=categories"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Danh
                mục</a>
            <a href="/admin?act=products"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Sản
                phẩm</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Đơn
                hàng</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">/asset/images/
                        <?= $_SESSION['user']['avatar'] ? $_SESSION['user']['avatar'] : 'avatar-default.jpg' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>