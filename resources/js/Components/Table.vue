<template>
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
      <thead class="bg-gray-200">
        <tr>
          <th v-for="(header, index) in headers" :key="index" class="px-4 py-2 text-left border-b">
            {{ header }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(row, rowIndex) in data" :key="rowIndex" class="hover:bg-gray-100">
          <td v-for="(value, key) in row" :key="key" class="px-4 py-2 border-b">
            <slot :name="key" :row="row">{{ value }}</slot>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
defineProps({
  headers: Array, // Contoh: ['Name', 'Email', 'Role']
  data: Array     // Contoh: [{ name: 'Jack', email: 'jack@email.com', role: 'Admin' }]
});
</script>

<style scoped>
th {
  font-weight: bold;
  text-transform: uppercase;
  font-size: 14px;
}
</style>
