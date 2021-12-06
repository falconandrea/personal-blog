<template>
  <div class="w-full border-b-2 py-4">
    <p><small>{{ post.format_date }}</small></p>
    <h4 class="font-medium text-2xl py-1">
      <Link :href="`/post/${post.slug}`" title="" v-html="post.title" class="text-gray-700 hover:text-blue-400" />
    </h4>
    <ListTags :tags="post.tags"></ListTags>
    <p class="pt-2 text-gray-500">{{ post.intro }}</p>
  </div>
</template>

<script>
import ListTags from './ListTags.vue'
export default {
  components: {
    ListTags
  },
  props: {
    post: Object
  },
}
</script>
