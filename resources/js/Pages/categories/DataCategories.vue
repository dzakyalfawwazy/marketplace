<script setup>
import ActionButton from '@/Components/ActionButton.vue';
import { router, useForm } from '@inertiajs/vue3';



defineProps({
    category: {
        type: Object, // Pastikan tipe data adalah array
        required: true, // Buat props wajib
    },
});


const handleClick = (id) => {
     if (confirm("Are you sure?")) {
        form.delete(route('admin.categories.destroy',id), {
                onSuccess: () =>  router.visit(route('admin.categories.index')),
            });
        };
};

const form = useForm({
    icon: '',
});


</script>
<template>


  <div class="max-w-xl">
    <h1 class="text-2xl font-bold mb-4">User List</h1>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-4 py-2 text-left border-b"> No</th>
          <th class="px-4 py-2 text-left border-b"> Name</th>
          <th class="px-4 py-2 text-left border-b"> Icon</th>
          <th class="px-4 py-2 text-left border-b"> Remarks</th>
          <th class="px-4 py-2 text-left border-b"> Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(d, index) in category" :key="category.id" class="hover:bg-gray-100">
          <td class="px-4 py-2 border-b">{{ index + 1 }} </td>
          <td class="px-4 py-2 border-b">{{ d.categoriesname }} </td>
          <td class="px-4 py-2 border-b text-center"><i :class="`fas ${d.icon}`"</i> </td>
          <td class="px-4 py-2 border-b">{{ d.remarks }} </td>
          <td>
            <div class="grid grid-cols-3 gap-3 space-x-1">
                <ActionButton variant="edit" :href="`/${d.id}/edit`"></ActionButton>
                <form @submit.prevent="submit">
                    <ActionButton  variant="delete" @click="handleClick(d.id)"  ></ActionButton>
                </form>
            </div>
         </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</template>

