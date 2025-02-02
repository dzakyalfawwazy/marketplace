<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectOption from '@/Components/SelectOption.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage, router } from '@inertiajs/vue3';

const props = defineProps({
    productsedit : Object,
    category : Object,
});


// console.log(props);

const form = useForm({
    nameproduct: props.productsedit.nameproduct,
    idcategory: props.productsedit.idcategory,
    description: props.productsedit.description,
});

const submit = () => {
    form.patch(route('admin.products.update',props.productsedit.id), {
        onSuccess: () =>  router.visit(route('admin.products.index')),
    });
};

</script>

<template>
    <section>
        <header>
            <p class="mt-1 text-sm text-gray-600">
                Update Kategori.
            </p>
        </header>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="categoriesname" value="Name" />

                <TextInput
                    id="categoriesname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nameproduct"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="idcategory" value="Category"/>

                <SelectOption :data="category" :id="'id'" :name="'categoriesname'" :selected="form.idcategory"  v-model="form.idcategory"  />
                <InputError class="mt-2" :message="form.errors.idcategory" />
            </div>
            <div>
                <InputLabel for="description" value="Description" />

                <TextArea
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="mt-4 flex items-center justify-end">

                <PrimaryButton
                    class="ms-4 gap-1"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                > <i class="fas fa-save"></i>
                    Simpan
                </PrimaryButton>
            </div>
        </form>
    </section>
</template>
