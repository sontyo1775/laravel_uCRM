<script setup>
import { getToday } from '@/common';
import { computed, onMounted, reactive, ref } from 'vue';

const props = defineProps({
    'customers': Array,
    'items': Array
})

// 合計の計算
const totalPrice = computed(()=> {
    let total = 0;

    itemList.value.forEach((item) => {
        total += item.price * item.quantity;
    })
    return total;
})
const itemList = ref([]);

const form = reactive({
    date: null,
    customer_id: null,
})
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

const quantity = [ "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"] // option用
</script>
<template>
 <input type="date" name="date" v-model="form.date">

 会員名<br>
 <select name="customer" v-model="form.customer_id">
   <option v-for="customer in customers" :value="customer.id" :key="customer.id">
  {{ customer.id }} : {{ customer.name }}
  </option>
 </select><br>
 <table>
 <thead>
    <tr>
        <th>id</th>
        <th>商品名</th>
        <th>金額</th>
        <th>数量</th>
        <th>小計</th>
    </tr>
 </thead>
  <tbody>
    <tr v-for="item in itemList" >
      <td>{{ item.id }}</td>
      <td>{{ item.name }}</td>
      <td>{{ item.price }}</td>
      <td>
        <select name="quantity" v-model="item.quantity">
          <option v-for="q in quantity" :value="q">{{ q }}</option>
        </select>
      </td>
      <td>
        {{ item.price * item.quantity }}
      </td>
    </tr>
  </tbody>
</table>
<br>
合計： {{ totalPrice }} 円
</template>

