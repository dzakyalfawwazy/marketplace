<script setup>
import ActionButton from '@/Components/ActionButton.vue';
import { router, useForm } from '@inertiajs/vue3';



defineProps({
    products: {
        type: Object, // Pastikan tipe data adalah array
        required: true, // Buat props wajib
    },
});


const handleClick = (id) => {
     if (confirm("Are you sure?")) {
        form.delete(route('admin.products.destroy',id), {
                onSuccess: () =>  router.visit(route('admin.products.index')),
            });
        };
};

const form = useForm({
    icon: '',
});


</script>
<template>

  <div class="max-auto">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-4 py-2 text-left border-b"> No</th>
          <th class="px-4 py-2 text-left border-b"> Name</th>
          <th class="px-4 py-2 text-left border-b"> Categories</th>
          <th class="px-4 py-2 text-left border-b"> Remarks</th>
          <th class="px-4 py-2 text-left border-b"> Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(d, index) in products" :key="products.id" class="hover:bg-gray-100">
          <td class="px-4 py-2 border-b">{{ index + 1 }} </td>
          <td class="px-4 py-2 border-b">{{ d.nameproduct }} </td>
          <td class="px-4 py-2 border-b">{{ d.category.categoriesname }} </td>
          <td class="px-4 py-2 border-b">{{ d.description }} </td>
          <td class="px-4 py-2 border-b grid md:grid-cols-2 sm:grid-cols-1 xl:grid-cols-3 gap-4">
                <ActionButton variant="view" :href="`/../${d.id}/productsdetails`"></ActionButton>
                <ActionButton variant="edit" :href="`/${d.id}/edit`"></ActionButton>
                <form @submit.prevent="submit">
                    <ActionButton  variant="delete" @click="handleClick(d.id)"  ></ActionButton>
                </form>
         </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</template>

