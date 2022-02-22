<template>
  <div class="p-4 w-full lg:w-1/3">
    <h3 class="mt-4 mb-2 text-xl">About</h3>
    <p class="pt-2 text-gray-500">Ciao,<br>mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack.<br>Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione.<br>Cercherò di documentare e annotare tutto il possibile.</p>
    <p class="pt-2 text-gray-500">Il codice di questo blog che sto sviluppando lo trovate nella repo <a class="underline" href="https://github.com/falconandrea/personal-blog" title="" target="_blank">personal-blog</a> sul mio profilo GitHub.</p>
    <SearchForm />
    <h3 class="mt-8 mb-2 text-xl">Tags</h3>
    <ListTags :tags=tags></ListTags>
  </div>
</template>

<script>
import ListTags from '@/Shared/ListTags.vue'
import SearchForm from '@/Shared/SearchForm.vue'
import { usePage } from '@inertiajs/inertia-vue3'
export default {
  components: {
    ListTags, SearchForm
  },
  data() {
      return {
          tags: usePage().props.value.tags
      }
  }
}
</script>
