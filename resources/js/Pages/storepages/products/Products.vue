<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";
import InsertProducts from "./InsertProducts.vue";
import EditProducts from "./EditProducts.vue";
import DataProducts from "./DataProducts.vue";

const currentRoute = computed(() => route().current());

defineProps({
    products: Object,
    productsedit: Object,
    category: Object,
});
</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="grid grid-cols-3 gap-3 sm:px-6 lg:px-12">
                <div class="" v-if="currentRoute === 'store.products.edit'">
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <EditProducts
                            :productsedit="productsedit"
                            :category="category"
                        />
                    </div>
                </div>

                <div class="" v-if="currentRoute != 'store.products.edit'">
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <InsertProducts :category="category" />
                    </div>
                </div>

                <div
                    class="col-span-2"
                    v-if="currentRoute != 'store.products.edit'"
                >
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <DataProducts :products="products" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
