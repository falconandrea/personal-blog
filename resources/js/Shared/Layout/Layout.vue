<template>
    <Head>
        <title>Blog</title>
        <meta name="description" content="Mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack. Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione." head-key="description" />
    </Head>
    <Header />
    <main class="container flex flex-col lg:flex-row mx-auto pb-4">
       <slot />
       <Sidebar />
     </main>
    <Footer />
</template>

<script>
import Header from '@/Shared/Layout/Header.vue'
import Footer from '@/Shared/Layout/Footer.vue'
import Sidebar from '@/Shared/Layout/Sidebar.vue'
export default {
    components: {
        Header, Footer, Sidebar
    }
}
</script>
