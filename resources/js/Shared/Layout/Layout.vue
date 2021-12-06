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
import Header from './Header.vue'
import Footer from './Footer.vue'
import Sidebar from './Sidebar.vue'
export default {
    components: {
        Header, Footer, Sidebar
    }
}
</script>
