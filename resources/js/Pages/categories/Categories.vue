<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InsertCategories from '../categories/InsertCategories.vue';
import DataCategories from './DataCategories.vue';
import { computed } from 'vue';
import EditCategories from './EditCategories.vue';

const currentRoute = computed(() => route().current());

defineProps({
    categories : Object,
    categoriesedit : Object,
});

</script>

<template>
{{ console.log(categoriesedit)
 }}
    <Head title="Profile" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Categories
            </h2>
        </template>

        <div class="py-12">
        <div class="grid grid-cols-2 gap-3 sm:px-6 lg:px-12 ">


            <div class="" v-if="currentRoute==='admin.categories.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <EditCategories :categoriesedit="categoriesedit"
                />
                </div>
            </div>

            <div class="" v-if="currentRoute!='admin.categories.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <InsertCategories
                class="max-w-xl"
                />
                </div>
            </div>

            <div class=""  v-if="currentRoute!='admin.categories.edit'">
                <div
                class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                <DataCategories :category="categories"
                />
                </div>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>
