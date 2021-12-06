<template>
    <Header />
    <main class="container flex flex-col lg:flex-row mx-auto pb-4">
       <slot />
       <Sidebar />
     </main>
    <Footer />
</template>

<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import Sidebar from './Sidebar.vue'
export default {
    components: {
        Header, Footer, Sidebar
    }
}
</script>
