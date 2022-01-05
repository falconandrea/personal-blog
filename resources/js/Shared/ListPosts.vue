<template>
  <div class="p-4 w-full lg:w-2/3">
    <h1 class="mt-4 mb-2 text-xl" v-if="!filters.search && !filters.tag">Ultimi post</h1>
    <h1 class="mt-4 mb-2 text-xl" v-if="filters.search">Hai cercato: <i>{{ filters.search }}</i></h1>
    <h1 class="mt-4 mb-2 text-xl" v-if="filters.tag">Contenuti relativi al tag: <i>{{ filters.tag }}</i></h1>
    <template v-if="posts.data.length > 0">
        <template :key="post.id" v-for="post in posts.data">
            <ShortPost :post="post" />
        </template>
        <template v-if="posts.links.length > 3">
            <div class="flex justify-center mt-4 w-full">
                <div v-for="link in posts.links" :key="link.label">
                    <Link
                        :href="link.url"
                        v-html="link.label"
                        v-if="link.url"
                        class="mx-4"
                        :class="{ 'font-bold underline': link.active }" />
                </div>
            </div>
        </template>
    </template>
    <p v-else class="mt-8">Non sono stati trovati post</p>
  </div>
</template>

<script>
import ShortPost from './ShortPost.vue'
export default {
    components: {
        ShortPost
    },
    props: {
        posts: Object,
        filters: Object
    }
}
</script>
