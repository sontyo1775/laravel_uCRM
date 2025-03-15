<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Label from '@/Components/InputLabel.vue'
import Input from '@/Components/TextInput.vue'

const emitTest = (e)=> {
    console.log(e);
}
</script>

<template>
<GuestLayout>
    <Label value="件名">タイトル</Label>
    <!-- Vue 3 では v-model が modelValue プロパティを自動的に使用するようになっている -->
    <Input modelValue="初期値"
    @update:modelValue="emitTest"></Input>
</GuestLayout>
</template>

