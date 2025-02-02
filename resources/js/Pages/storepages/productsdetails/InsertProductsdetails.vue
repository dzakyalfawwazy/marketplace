<script setup>
import FileInput from "@/Components/FileInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SelectOption from "@/Components/SelectOption.vue";
import TextArea from "@/Components/TextArea.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    headers: Object,
});

const form = useForm({
    weight: "",
    size: "",
    idproduct: props.headers.id,
    nameproduct: props.headers.nameproduct,
    color: "",
    image: "",
    baseprice: "",
    sellprice: "",
    description: "",
});

const submit = () => {
    form.post(route("admin.productsdetails.store", props.headers.id), {
        // onFinish: () => form.reset('categoriesname', 'remarks'),
    });
};
</script>

<template>
    <section>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-4 col-start-2">
                <header>
                    <p class="mt-1 text-sm text-gray-600">Tambahkan Products</p>
                </header>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="nameproduct" value="Nama Product" />

                        <TextInput
                            id="nameproduct"
                            type="text"
                            disabled="disabled"
                            class="mt-1 block w-full"
                            v-model="form.nameproduct"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.nameproduct"
                        />
                    </div>
                    <div>
                        <InputLabel for="Weight" value="Berat" />

                        <TextInput
                            id="weight"
                            type="number"
                            class="mt-1 block w-full text-end"
                            v-model="form.weight"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.weight"
                        />
                    </div>
                    <div>
                        <InputLabel for="size" value="Size" />

                        <TextInput
                            id="size"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.size"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError class="mt-2" :message="form.errors.size" />
                    </div>
                    <div>
                        <InputLabel for="color" value="Warna" />

                        <TextInput
                            id="color"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.color"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError class="mt-2" :message="form.errors.color" />
                    </div>
                    <div>
                        <InputLabel for="baseprice" value="Harga Beli" />

                        <TextInput
                            id="baseprice"
                            type="number"
                            class="mt-1 block w-full text-end"
                            v-model="form.baseprice"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.baseprice"
                        />
                    </div>
                    <div>
                        <InputLabel for="sellprice" value="Harga Jual" />

                        <TextInput
                            id="sellprice"
                            type="number"
                            class="mt-1 block w-full text-end"
                            v-model="form.sellprice"
                            required
                            autofocus
                            autocomplete="off"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.sellprice"
                        />
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

                        <InputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>

                    <div>
                        <InputLabel for="image" value="Gambar" />
                        <FileInput
                            autocomplete="off"
                            v-model="form.image"
                            @img="(e) => (form.image = e)"
                        />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            class="ms-4 gap-1"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            <i class="fas fa-save"></i>
                            Simpan
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
