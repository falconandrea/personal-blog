<template>
    <a :href="iubendaLink" id="iubendalink" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe" title="Privacy Policy ">Privacy Policy</a>
</template>

<script>
(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);

import { usePage } from '@inertiajs/inertia-vue3'
export default {
    computed: {
        iubendaLink () {
            return 'https://www.iubenda.com/privacy-policy/' + usePage().props.value.iubenda
        }
    }
}
</script>

<style scoped>
#iubendalink{
    display: inline-block !important;
}
</style>
