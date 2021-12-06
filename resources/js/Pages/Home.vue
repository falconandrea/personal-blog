<template>
  <ListPosts :posts="posts"></ListPosts>
</template>

<script>
import ListPosts from '../Shared/ListPosts.vue'
export default {
  components: {
    ListPosts
  },
  props: {
      posts: Object
  }
}
</script>
