<template>
    <Head>
        <title>{{ post.seo_title }}</title>
        <meta name="description" :content="post.seo_description" head-key="description" />
    </Head>
    <div class="p-4 w-full lg:w-2/3 pt-8">
        <p><small>{{ post.format_date }}</small></p>
        <h1 class="text-gray-700 font-medium text-3xl py-4">{{ post.title }}</h1>
        <ListTags :tags="post.tags"></ListTags>
        <div v-highlight class="text-gray-500 py-4 container-post" v-html="post.text"></div>
    </div>
</template>

<script>
import 'vue-code-highlight/themes/prism-dark.css'
import ListTags from '../Shared/ListTags.vue'
export default {
  components: {
    ListTags
  },
  props: {
      post: Object
  }
}
</script>

<style>
  .container-post a {
    text-decoration: underline;
  }
  .container-post strong,
  .container-post b {
    font-weight: 500;
  }
</style>
