<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import { Head } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'


defineProps({
    item: Object,
})

// 削除処理
const deleteItem = (id) => {
    Inertia.delete(route('items.destroy', {item: id}), {
        onBefore: ()=> confirm('本当に削除しますか？。')
    });
}
</script>

<template>
    <Head title="商品詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                商品詳細
            </h2>
        </template>

        <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <!-- 20250317 add No46 新規作成画面 -->
                        <form @submit.prevent="storeItems">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                <div id="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    {{ item.name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                <div id="memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out  whitespace-pre-wrap ">
                                                    {{ item.memo }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="price" class="leading-7 text-sm text-gray-600">商品価格</label>
                                                <div id="price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    {{ item.price }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ステータス追加 -->
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="status" class="leading-7 text-sm text-gray-600">商品名</label>
                                                <div id="status" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <span v-if="item.is_selling === 1">販売中</span>
                                                    <span v-if="item.is_selling === 0">販売停止中</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <Link as="button" :href="route('items.edit', {item: item.id})" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                        </div>
                                        <div class="mt-20 p-2 w-full">
                                            <button @click="deleteItem(item.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>
