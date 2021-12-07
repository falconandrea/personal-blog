<template>
    <Head>
        <title>Home</title>
        <meta name="description" content="Mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack. Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione." head-key="description" />
    </Head>
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
