<template>
  <div class="flex flex-row">
    <template v-for="tag in tags" :key="tag.slug">
      <Tag :tag="tag"></Tag>
    </template>
  </div>
</template>

<script>
import Tag from './Tag.vue'
export default {
  components: {
    Tag,
  },
  props: {
    tags: Array
  }
}
</script>
