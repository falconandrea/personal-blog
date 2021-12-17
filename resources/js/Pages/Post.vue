<template>
    <Head :title="$page.props.seo_title">
        <meta name="description" :content="$page.props.seo_description" head-key="description" />
    </Head>
    <div class="p-4 w-full lg:w-2/3 pt-8">
        <h1 class="text-gray-700 font-medium text-3xl">{{ post.title }}</h1>
        <p class="pb-2"><small>{{ post.format_date }}</small></p>
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
    font-weight: 700;
  }
  .container-post pre {
      border: none;
      box-shadow: none;
      text-shadow: none;
  }
  .container-post pre code {
      text-shadow: none;
  }
  .container-post p{
      margin-top: 1rem;
  }
</style>
