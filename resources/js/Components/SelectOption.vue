<script setup>
import { ref } from 'vue';

const props = defineProps({
    data : Object,
    id : String,
    selected : String,
    name : String,
});

const data = ref(props.data);
const selectedOption = ref(props.selected || '');

</script>

<template>
    <select
      v-model="selectedOption"
      class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
    >
      <option v-for="(option, index) in data" :key="option[id]" :value="option[id]">
       {{ option[id] }} - {{ option[name] }}
      </option>
    </select>
</template>
