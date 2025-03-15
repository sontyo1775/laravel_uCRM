<script setup>
</script>
<template>
    aaaaaa
    <!-- 20250315 add No28 フラッシュメッセージ -->
    <div v-if="$page.props.flash.message" class="bg-blue-300">
        {{ $page.props.flash.message }}
    </div>
</template>
