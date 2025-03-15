<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    blogs: Array
})
</script>
<template>
    aaaaaa
    <!-- 20250315 add No28 フラッシュメッセージ -->
    <div v-if="$page.props.flash.message" class="bg-blue-300">
        {{ $page.props.flash.message }}
    </div>
    <!-- 202515 add TBL内容をリスト表示 -->
      <div>
        <ul>
            <li v-for="blog in blogs" :key="blog.id">
                件名：<Link class="text-blue-400" :href="route('inertia.show', {id: blog.id})">{{blog.title}}</Link>
                本文：{{ blog.content }}
            </li>
        </ul>
      </div>
</template>
