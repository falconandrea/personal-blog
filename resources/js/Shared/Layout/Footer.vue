<template>
  <footer class="bg-blue-100">
    <div class="container flex mx-auto p-4">
      <p class="w-8/12">
        <small>&copy; 2021 Falcon Andrea / Made with Laravel, InertiaJs and Tailwind.</small>
        /
        <Iubenda />
        /
        <Link href="/cookie-policy" title="Cookie policy" class="text-sm ml-1 underline">Cookie Policy</Link>
      </p>
      <p class="w-4/12 text-right">
        <a class="mr-4" href="https://www.linkedin.com/in/andrea-falcon-fullstack-developer/" title="Facebook" target="_blank">
          <font-awesome-icon class="hover:text-blue-500" :icon="['fab', 'linkedin-in']" />
        </a>
        <a href="https://github.com/falconandrea" title="Github" target="_blank">
          <font-awesome-icon class="hover:text-blue-500" :icon="['fab', 'github']" />
        </a>
      </p>
    </div>
  </footer>
  <CookieBanner />
</template>

<script>
import CookieBanner from '../CookieBanner.vue'
import Iubenda from '../Iubenda.vue'
export default {
    components: {
        CookieBanner, Iubenda
    }
}
</script>
