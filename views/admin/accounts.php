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
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Quản lý tài khoản</h1>
                <div class="flex gap-4">
                    <form action="">
                        <input type="hidden" name='act' value="accounts" class="bg-gray-100 rounded-md px-2 py-2"
                            placeholder="Tìn kiếm danh nục">
                        <input type="search" name='q' class="bg-gray-100 rounded-md px-2 py-2"
                            placeholder="Tìn kiếm tài khoản">
                        <button type="submit"
                            class="text-white bg-sky-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Tìm</button>
                    </form>
                </div>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form action="?act=delete-account" method="POST">
                    <div class="flex mb-4">
                        <a href="/admin?act=add-account"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Thêm
                            tài khoản</a>
                        <button type="button" id="delete-many"
                            class="text-white bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cấm</button>
                        <button type="submit" name="delete-many"
                            class="hidden text-white bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cấm</button>
                        <a href="?act=bin-accounts"
                            class="text-white bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Thùng
                            rác</a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500  ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2  border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tên
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tell
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white hover:bg-gray-50 ">
                                    <td class="w-4 p-4">
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $user['full_name'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $user['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $user['tell'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= getRole($user['role']) ?>
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <a href="/admin?act=detail-account&id=<?= $user['id'] ?>"
                                            class="font-medium text-blue-600  hover:underline">Chi tiết</a>
                                    </td>
                                </tr>
                                <?php
                                foreach ($accounts as $account) {
                                    extract($account);
                                    ?>
                                    <tr class="bg-white hover:bg-gray-50 ">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input value="<?= $id ?>" name="user-id[]" id="checkbox-<?= $id ?>"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500  ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2  border-gray-600">
                                                <label for="checkbox-<?= $id ?>" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <?= $role != 2 ? $id : 'Root' ?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?= $full_name ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $email ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $tell ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= getRole($role) ?>
                                        </td>
                                        <td class="flex items-center px-6 py-4">
                                            <a href="/admin?act=detail-account&id=<?= $id ?>"
                                                class="font-medium text-blue-600  hover:underline">Chi tiết</a>
                                            <button type="button" id="delete" data-id="<?= $id ?>"
                                                class="font-medium text-red-600 hover:underline ms-3">Cấm</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div id="overlay" class="hidden relative z-10 ease-out duration-300 opacity-0" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div id="content"
                        class="ease-out duration-300 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Cấm
                                            tài khoản</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Bạn có chắc chắn muốn cấm tài khoản này ?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <a id="agree"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Cấm</a>
                                <button id="cancel" type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <script>
            const checkboxAll = document.getElementById("checkbox-all-search");
            const overlay = document.getElementById("overlay");
            const content = document.getElementById("content");
            const cancel = document.getElementById("cancel");
            const agree = document.getElementById("agree");
            const checkboxCategories = document.querySelectorAll("input[name='user-id[]']");
            const btnDelete = document.querySelector("#delete-many");
            checkboxAll.onchange = () => checkboxCategories.forEach(ele => ele.checked = checkboxAll.checked);
            const btnDeletes = document.querySelectorAll('#delete')
            const btnDeleteHidden = document.querySelector("button[name='delete-many']");
            btnDeletes.forEach(item => {
                item.onclick = (e) => {
                    const link = "?act=delete-account&id=" + e.target.dataset.id;
                    agree.href = link;
                    overlay.classList.remove('hidden')
                    overlay.classList.toggle('opacity-0')
                    content.classList.toggle('opacity-0');
                    content.classList.toggle('translate-y-4');
                    content.classList.toggle('sm:translate-y-0');
                    content.classList.toggle('sm:scale-95');
                    content.classList.toggle('opacity-100');
                    content.classList.toggle('translate-y-0');
                    content.classList.toggle('sm:scale-100');
                }
            })
            btnDelete.onclick = () => {
                let isCheck = false;
                checkboxCategories.forEach(ele => {
                    if (ele.checked) isCheck = true;
                });
                if (!isCheck) return;
                agree.onclick = () => {
                    btnDeleteHidden.click()
                };
                overlay.classList.remove('hidden')
                overlay.classList.toggle('opacity-0')
                content.classList.toggle('opacity-0');
                content.classList.toggle('translate-y-4');
                content.classList.toggle('sm:translate-y-0');
                content.classList.toggle('sm:scale-95');
                content.classList.toggle('opacity-100');
                content.classList.toggle('translate-y-0');
                content.classList.toggle('sm:scale-100');
            }
            cancel.onclick = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('opacity-0')
                content.classList.toggle('opacity-0');
                content.classList.toggle('translate-y-4');
                content.classList.toggle('sm:translate-y-0');
                content.classList.toggle('sm:scale-95');
                content.classList.toggle('opacity-100');
                content.classList.toggle('translate-y-0');
                content.classList.toggle('sm:scale-100');
            }
        </script>
    </div>
</body>

</html>