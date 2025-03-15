<script setup>
// add 20250312 No18
// import { Link } from '@inertiajs/vue3';

// add 20250312 No18
// add 20250312 No22 Linkコンポーネント
import {ref} from 'vue';
import { reactive } from 'vue'
// import { Inertia } from '@inertiajs/inertia'
import { Inertia } from '@inertiajs/inertia-vue3'
import { Link} from '@inertiajs/inertia-vue3'
// add 20250312 No22 Linkコンポーネント
// add 20250312 No22 Linkコンポーネント
// const newTitle = ref('');
// const newContent = ref('');
const form = reactive({
  title: null,
  content: null
})
// const submitFunction = () => {
//   Inertia.post('/inertia', form)
// }
const submitFunction = () => {
  form.post(route('/inertia'), {
    onSuccess: () => {},
    onError: errors => {},
  })
}
// add 20250312 No22 Linkコンポーネント


</script>
<template>
<h1>InertiaTestです</h1>
<a href="/">aタグ経由</a><br>
<Link href="/">Link経由</Link>

<!-- コントローラnameを指定 -->
 <div>
    <Link :href="route('inertia.index')">コントローラー</Link><br>
    <Link :href="route('inertia.show', {id: 1})">ルートパラメータ値１</Link>
 </div>
<!-- 8行開ける -->
 <div class="mb-8"></div>

 <!-- add 20250312 No22 Linkコンポーネント -->
<!-- <input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}<br>
<input type="text" name="newContent" v-model="newContent">{{ newContent }}

<Link as="button" method="post" :href="route('inertia.store')"
:data="{
    title: newTitle,
    content: newContent
 }"> DBテスト</Link> -->
 <form @submit.prevent="submitFunction" method="post">
    <input type="text" name="title" v-model="form.title"><br>
    <input type="text" name="content" v-model="form.content">
    <button>送信</button>
</form>
 <!-- add 20250312 No22 Linkコンポーネント -->

</template>
