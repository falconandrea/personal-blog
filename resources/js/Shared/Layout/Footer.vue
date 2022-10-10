<template>
  <footer class="bg-blue-100">
    <div class="container flex mx-auto p-4">
      <p class="w-8/12">
        <small>&copy; 2021 Falcon Andrea / Made with Laravel, InertiaJs and Tailwind.</small>
        <Iubenda v-if="showIubenda"/>
      </p>
      <p class="w-4/12 text-right">
        <a class="mr-4" href="https://www.linkedin.com/in/andrea-falcon-fullstack-developer/" title="Linkedin" target="_blank">
          <font-awesome-icon class="hover:text-blue-500" :icon="['fab', 'linkedin-in']" />
        </a>
        <a href="https://github.com/falconandrea" title="Github" target="_blank">
          <font-awesome-icon class="hover:text-blue-500" :icon="['fab', 'github']" />
        </a>
      </p>
    </div>
  </footer>
</template>

<script>
import Iubenda from '@/Shared/Iubenda.vue'
import { usePage } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Iubenda
    },
    data() {
      return {
          showIubenda: usePage().props.value.iubenda && usePage().props.value.iubenda != ''
      }
    }
}
</script>
