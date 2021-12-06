<template>
  <ListPosts :posts="posts" :filters="filters"></ListPosts>
</template>

<script>
import ListPosts from '../Shared/ListPosts.vue'
export default {
  components: {
    ListPosts
  },
  props: {
      posts: Object,
      filters: Object
  }
}
</script>
