<script setup>
// Dashbord.vue copy作成

import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import { Head } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/inertia-vue3'
// フラッシュメッセージ
defineProps({
    items: Array
})
</script>

<template>
    <Head title="商品一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                商品一覧
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
                                <Link as="button" :href="route('items.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品登録</Link>
                                <!-- <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button> -->
                                </div>
                                <!-- <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Pricing</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                                </div> -->
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">価格</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                        <!-- <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items" :key="item.id">
                                        <td class="px-4 py-3 border-b-2 border-gray-200">
                                            <!-- リンク先追加 -->
                                            <Link class="text-blue-400" :href="route('items.show', {item: item.id})">{{ item.id }}</Link>
                                        </td>
                                        <!-- <td class="px-4 py-3 border-b-2 border-gray-200">{{item.id}}</td> -->
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{item.name}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{item.price}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">
                                            <span v-if="item.is_selling === 1">販売中</span>
                                            <span v-if="item.is_selling === 0">販売停止中</span>
                                        </td>
                                        <!-- <td class="px-4 py-3 text-lg text-gray-900">Free</td> -->
                                        <!-- <td class="w-10 text-center"> -->
                                        <!-- <input name="plan" type="radio"> -->
                                        <!-- </td> -->
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <!-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                                </div> -->
                            </div>
                        </section>
                        <!-- 20250316 add No42 TAILBLOCKS 追加ここまで -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
