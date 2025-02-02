<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import EditProductsdetails from './EditProductsdetails.vue';
import InsertProductsdetails from './InsertProductsdetails.vue';
import DataProductsdetails from './DataProductsdetails.vue';

const currentRoute = computed(() => route().current());

defineProps({
    details : Object,
    detailsedit : Object,
    headers : Object,
});


</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Products
            </h2>
        </template>

        <div class="py-12">
        <div class="grid grid-cols-1 gap-3 sm:px-6 lg:px-12 ">


            <div class="" v-if="currentRoute==='admin.productsdetails.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <EditProductsdetails :productsedit="detailsedit" :headers ="headers"
                />
                </div>
            </div>

            <div class="" v-if="currentRoute!='admin.productsdetails.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <InsertProductsdetails :headers ="headers"
                />
                </div>
            </div>

            <div class="col-span-2"  v-if="currentRoute!='admin.productsdetails.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <DataProductsdetails :details="details"
                />
                </div>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>
