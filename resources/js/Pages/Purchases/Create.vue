<script setup>
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import { Head } from '@inertiajs/vue3';
import { computed, onMounted, reactive, ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3'
// import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { getToday } from '@/common';
// バリデーション追加
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
// モーダルを使用
import MicroModal from '@/Components/MicroModal.vue';
// import { data } from 'autoprefixer';
// defineProps({
//     errors: Object
// })
const props = defineProps({
    // 'customers': Array,
    'items': Array,
    errors: Object
})

const form = reactive({
    date: null,
    customer_id: null,
    // 20240329 add No76 保存処理
    status: true,
    items: [],
})
// const storeItems = () => {
//     Inertia.post('/items', form);
// }
const itemList = ref([]);
onMounted(()=> {
    form.date = getToday(),
    // 新しい配列を作成
    props.items.forEach(item => {
        itemList.value.push({
            id: item.id,
            price: item.price,
            name: item.name,
            quantity: 0,
        })

    })
})
// 合計の計算
const totalPrice = computed(()=> {
    let total = 0;

    itemList.value.forEach((item) => {
        total += item.price * item.quantity;
    })
    return total;
})
const quantity = [ "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"] // option用
// form送信処理
const storePurchase = ()=>{
    itemList.value.forEach((item) => {
        if(item.quantity > 0){
            form.items.push({
                id: item.id,
                quantity: item.quantity,
            })
        }
    })
    Inertia.post(route('purchases.store'), form);
}

const setCustomerId = (id) =>{
    form.customer_id = id
}

</script>

<template>
    <Head title="購入画面A" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                購入画面A
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <BreezeValidationErrors :errors="errors" />
                        <section class="text-gray-600 body-font relative">
                        <!-- 20250317 add No46 新規作成画面 -->
                         <form @submit.prevent="storePurchase">
                            <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="date" class="leading-7 text-sm text-gray-600">日付</label>
                                    <input type="date" id="date" name="date" v-model="form.date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <!-- モーダル使用 -->
                                     <!-- <MicroModal /> -->
                                    <label for="customer" class="leading-7 text-sm text-gray-600">会員名</label>
                                    <!-- <select id="customer" name="customer" v-model="form.customer_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option v-for="customer in customers" :value="customer.id" :key="customer.id">
                                        {{ customer.id }} : {{ customer.name }}
                                        </option>
                                    </select> -->
                                    <MicroModal @update:customerId="setCustomerId" />
                                    </div>
                                </div>
                                <div class="w-full mt-4 mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">金額</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">数量</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">小計</th>
                                        <!-- <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in itemList" :key="item.id">
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{item.id}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{item.name}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">{{item.price}}</td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200">
                                            <!-- <span v-if="item.is_selling === 1">販売中</span>
                                            <span v-if="item.is_selling === 0">販売停止中</span> -->
                                            <select name="quantity" v-model="item.quantity">
                                            <option v-for="q in quantity" :value="q">{{ q }}</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3 border-b-2 border-gray-200"> {{ item.price * item.quantity }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="p-2 w-full">
                                <!-- <div class="relative"> -->
                                <div>
                                    <label for="price" class="leading-7 text-sm text-gray-600">合計金額</label><br>
                                    <div  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        合計： {{ totalPrice }} 円<br>
                                    </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
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
