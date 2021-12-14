<template>
    <Head :title="$page.props.seo_title">
        <meta name="description" :content="$page.props.seo_description" head-key="description" />
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
