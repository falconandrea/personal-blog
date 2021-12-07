<template>
  <div class="p-4 w-full lg:w-1/3">
    <h3 class="mt-4 mb-2 text-xl">About</h3>
    <p class="pt-2 text-gray-500">Ciao, mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack.<br>Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione.<br>Cercherò di documentare e annotare tutto il possibile.</p>
    <SearchForm />
    <h3 class="mt-8 mb-2 text-xl">Tags</h3>
    <ListTags :tags=tags></ListTags>
  </div>
</template>

<script>
import ListTags from '../ListTags.vue'
import SearchForm from '../SearchForm.vue'
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
