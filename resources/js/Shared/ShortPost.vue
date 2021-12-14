<template>
  <div class="w-full border-b-2 py-4">
    <h4 class="font-medium text-2xl">
      <Link :href="`/post/${post.slug}`" title="" v-html="post.title" class="text-gray-700 hover:text-blue-400" />
    </h4>
    <p class="pt-1 pb-2"><small>{{ post.format_date }}</small></p>
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
