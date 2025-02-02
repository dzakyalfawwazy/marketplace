<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const form = useForm({
    categoriesname: '',
    icon: '',
    remarks: '',
});

const submit = () => {
    form.post(route('admin.categories.store'), {
        // onFinish: () => form.reset('categoriesname', 'remarks'),
    });
};

</script>

<template>
    <section>
        <header>
            <p class="mt-1 text-sm text-gray-600">
                Tambahkan Kategori
            </p>
        </header>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="categoriesname" value="Name" />

                <TextInput
                    id="categoriesname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.categoriesname"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="icon" value="Icon" />
                Lihat Icon di <a target=_blank class="text-emerald-600" href="https://fontawesome.com/v4/cheatsheet/">Font Awesome</a>

                <TextInput
                    id="icon"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.icon"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.icon" />
            </div>
            <div>
                <InputLabel for="remarks" value="Remarks" />

                <TextArea
                    id="remarks"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.remarks"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.remarks" />
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
