<script setup>
// 20250313 追加　No24 form作成
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

defineProps({
  errors: Object,
})
const form = reactive({
    title: null,
    content: null,
})

const submitFunction = () => {
    Inertia.post('/inertia', form);
}

// 20250313 追加　No24 form作成
</script>
<template>
<form @submit.prevent="submitFunction" method="post">
    <input type="text" name="title" v-model="form.title"><br>
    <div v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content">
    <div v-if="errors.content">{{ errors.content }}</div>

    <button>送信</button>
</form>
</template>
