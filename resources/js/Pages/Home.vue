<template>
  <ListPosts :posts="posts"></ListPosts>
</template>

<script>
import ListPosts from '../Shared/ListPosts.vue'
import { createSEOMeta } from '../utils/seo.js'
export default {
  components: {
    ListPosts
  },
  async asyncData({$axios}) {
    // Get posts
    const { data } = await $axios.get('posts')
    return {posts: data.data}
  },
  data() {
    return {
      posts: []
    }
  },
  head() {
    return {
      title: 'AndreaFalcon.Dev',
      meta: [
      ...createSEOMeta({
        description: 'Mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack. Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione.'
        })
      ],
    }
  }
}
</script>
