<template>
  <div class="p-4 w-full lg:w-2/3">
    <p v-if="search">Hai cercato: <i>{{ search }}</i></p>
    <template v-if="posts.length > 0">
      <template :key="post.id" v-for="post in posts">
        <ShortPost :post="post" />
      </template>
    </template>
    <p v-else class="mt-8">Non sono stati trovati post</p>
  </div>
</template>

<script>
import ShortPost from './ShortPost.vue'
export default {
  components: {
    ShortPost
  },
  props: {
    posts: [],
    search: null
  }
}
</script>
