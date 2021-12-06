<template>
  <Link :href="`?tag=${tag.slug}`" v-html="tag.name" class="text-sm text-gray-500 px-2 py-1 rounded-xl bg-blue-100 hover:bg-blue-400 hover:text-white mr-2" :title="tag.name" />
</template>

<script>
export default {
  props: {
    tag: Object
  },
}
</script>
