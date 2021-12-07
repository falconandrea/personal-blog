<template>
    <div>
        <h3 class="mt-8 mb-2 text-xl">Cerca tra i post</h3>
        <form @submit.prevent="submitForm" class="flex flex-row">
            <input id="search-input" class="border-2 rounded-xl px-4 py-2" type="text" v-model="formData.search" placeholder="Laravel, Vue ..."/>
            <button class="px-4 text-white bg-blue-300 rounded-xl ml-2 hover:bg-blue-400" type="submit">
                Cerca
            </button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let formData = useForm({
    search: ''
})
let submitForm = () => {
    formData.get('/', formData);
}
</script>
