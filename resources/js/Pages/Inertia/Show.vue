<script setup>
import { Inertia } from '@inertiajs/inertia'

defineProps({
    id: String,
    blog: Object
})
// 20250315 add No31 削除処理
const deleteConfirm = (id) => {
    // console.log(id);
    Inertia.delete(`/inertia/${id}`, {
        onBefore: ()=> confirm('本当に削除しますか？。')
    });
}
</script>

<template>
<p>パラメータ表示：{{ id }}</p>
<p>{{ blog.title }}</p>
<button @click="deleteConfirm(blog.id)">削除</button>
</template>
