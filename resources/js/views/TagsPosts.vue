<template>
<posts-list :url="`/api/etiquetas/${this.tag}`"/>
</template>

<script>
export default {
  props: ['tag']
}
</script>
