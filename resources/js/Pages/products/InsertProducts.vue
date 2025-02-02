<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectOption from '@/Components/SelectOption.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    category : Object,
});

const form = useForm({
    nameproduct: '',
    idcategory: '',
    description: '',
});

const submit = () => {
    form.post(route('admin.products.store'), {
        // onFinish: () => form.reset('categoriesname', 'remarks'),
    });
};

</script>

<template>
    <section>
        <header>
            <p class="mt-1 text-sm text-gray-600">
                Tambahkan Products
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

                <SelectOption :data="category" :id="'id'" :name="'categoriesname'"  v-model="form.idcategory"  />
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
