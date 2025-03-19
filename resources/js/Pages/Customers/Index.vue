<script setup>
// Dashbord.vue copy作成

import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import { Head } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/inertia-vue3'
// ページが読み込まれたとき表示する
import { onMounted } from 'vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    // リレーションだとObjectでしかできない
    customers: Object,
})
</script>

<template>
    <Head title="顧客一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                顧客一覧
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <!-- 20250316 add No42 TAILBLOCKS 追加ここから -->
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-8 mx-auto">
                                <!-- フラッシュメッセージ -->
                                <FlashMessage />
                                <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                                <!-- 20250317 add No45 商品登録 -->
                                <Link as="button" :href="route('customers.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">顧客登録</Link>
                                </div>

                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カナ</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                        <!-- <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="customer in customers.data" :key="customer.id">
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{customer.id}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{customer.name}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{customer.kana}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{customer.tel}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- // ページネーション追加 -->
                            <Pagination class="mt-6" :links="customers.links"></Pagination>
                        </section>
                        <!-- 20250316 add No42 TAILBLOCKS 追加ここまで -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
