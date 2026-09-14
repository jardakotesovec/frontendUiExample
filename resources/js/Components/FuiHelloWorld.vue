<template>
  <div>{{ fuiDataParsed.titleLabel }}</div>
  <ul>
    <li v-for="(item, index) in fuiDataParsed.itemsList" :key="index">
      {{ item }}
    </li>
  </ul>
</template>

<script setup>
const props = defineProps({ fuiData: { type: String, required: true } });

const fuiDataParsed = JSON.parse(props.fuiData);
</script>
<style scoped>
div {
  background-color: yellow;
}
</style>
