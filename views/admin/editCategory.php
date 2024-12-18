<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Sửa danh mục</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="isolate bg-white px-6 lg:px-8">
                    <div id="alert-border-2"
                        class="<?= $error ? 'flex' : 'hidden' ?> items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            <?= $error ?>
                        </div>
                    </div>
                    <form action="/admin?act=update-category" method="POST" enctype="multipart/form-data"
                        class="mx-auto mt-16 max-w-xl sm:mt-20">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Tên danh
                                    mục</label>
                                <div class="mt-2.5">
                                    <input required maxlength="30" value="<?= $category['name_category'] ?>" type="text"
                                        name="name" id="name"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <input value="<?= $category['id'] ?>" type="hidden" name="id">
                                </div>
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Hình
                                    ảnh</label>
                                <div class="mt-2.5">
                                    <input type="file" name="image"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="border-2 rounded-[14px] border-red-600">
                                <img src="/asset/images/<?= $category['image'] ?>" alt=""
                                    class="h-40 rounded-xl w-full">
                                <!-- fix -->
                                <input type="hidden" value="<?= $category['image'] ?>" name="image-old">
                            </div>
                            <div class="flex items-center justify-center border rounded-[14px] border-indigo-600">
                                <p class="font-semibold text-3xl">?</p>
                                <img id="image" src="" alt="" class="h-40 rounded-xl w-full hidden">
                            </div>
                        </div>
                        <div class="mt-10 grid grid-cols-4 gap-5">
                            <button name="update" type="submit"
                                class="col-span-2 block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cập
                                nhật</button>
                            <button type="reset"
                                class="block w-full rounded-md border border-red-600 text-red-600 px-3.5 py-2.5 text-center text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Nhập
                                lại</button>
                            <a href="/admin?act=categories"
                                class="block w-full rounded-md border border-indigo-600 text-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Danh
                                sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script>
            const inputFile = document.querySelector("input[name='image']");
            const image = document.getElementById('image');
            inputFile.onchange = (e) => {
                image.style.display = 'block';
                image.previousElementSibling.style.display = 'none';
                let file = e.target.files[0];
                const url = URL.createObjectURL(file);
                image.src = url;
            }
        </script>
    </div>
</body>

</html>