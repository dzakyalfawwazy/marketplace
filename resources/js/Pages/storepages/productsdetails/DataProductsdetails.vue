<script setup>
import ActionButton from '@/Components/ActionButton.vue';
import { router, useForm } from '@inertiajs/vue3';



defineProps({
    details: {
        type: Object, // Pastikan tipe data adalah array
        required: true, // Buat props wajib
    },
});


const handleClick = (id,id2) => {
     if (confirm("Are you sure?")) {
        form.delete(route('admin.productsdetails.destroy',[id2,id]), {
                onSuccess: () =>  router.visit(route('admin.productsdetails.index',id2)),
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
          <th class="px-4 py-2 text-left border-b"> Category</th>
          <th class="px-4 py-2 text-left border-b"> Berat</th>
          <th class="px-4 py-2 text-left border-b"> Ukuran</th>
          <th class="px-4 py-2 text-left border-b"> Warna</th>
          <th class="px-4 py-2 text-left border-b"> Harga Beli</th>
          <th class="px-4 py-2 text-left border-b"> Harga Jual</th>
          <th class="px-4 py-2 text-left border-b"> Description</th>
          <th class="px-4 py-2 text-left border-b"> </th>
          <th class="px-4 py-2 text-left border-b"> Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(d, index) in details" :key="details.id" class="hover:bg-gray-100">
          <td class="px-4 py-2 border-b">{{ index + 1 }} </td>
          <td class="px-4 py-2 border-b">{{ d.product.nameproduct }} </td>
          <td class="px-4 py-2 border-b">{{ d.product.category.categoriesname }} </td>
          <td class="px-4 py-2 border-b">{{ d.weight }} </td>
          <td class="px-4 py-2 border-b">{{ d.size }} </td>
          <td class="px-4 py-2 border-b">{{ d.color }} </td>
          <td class="px-4 py-2 border-b">{{ d.baseprice }} </td>
          <td class="px-4 py-2 border-b">{{ d.sellprice }} </td>
          <td class="px-4 py-2 border-b">{{ d.description }} </td>
          <td class="px-4 py-2 border-b"><img :src="`../../storage/${d.image}`"></img>
        </td>
          <td class="px-4 py-2 border-b">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4">
                <ActionButton variant="edit" :href="`/${d.id}/edit`"></ActionButton>
                <form @submit.prevent="submit">
                    <ActionButton  variant="delete" @click="handleClick(d.id, d.product.id)"  ></ActionButton>
                </form>
            </div>
         </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</template>

