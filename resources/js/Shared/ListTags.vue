<template>
  <div class="flex flex-wrap">
    <template v-for="tag in tags" :key="tag.slug">
      <Tag :tag="tag"></Tag>
    </template>
  </div>
</template>

<script>
import Tag from '@/Shared/Tag.vue'
export default {
  components: {
    Tag,
  },
  props: {
    tags: Array
  }
}
</script>
