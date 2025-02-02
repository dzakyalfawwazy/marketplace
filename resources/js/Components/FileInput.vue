<script setup>
import { ref } from "vue";
import { defineEmits } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const emit = defineEmits(["img"]);

const previewImg = ref(null);
const overSizeImg = ref(false);
const imageSelected = (e) => {
    previewImg.value = URL.createObjectURL(e.target.files[0]);
    overSizeImg.value = e.target.files[0].size > 3145728;
    emit("img", e.target.files[0]);
};
</script>

<template>
    <div>
        <span
            class="block text-sm font-medium text-slate-700"
            :class="{ '!text-red-500': overSizeImg }"
        >
            {{ overSizeImg ? "Size more than 3 Mb" : "" }}
        </span>
        <label
            for="image"
            class="block rounded-md mt-1 bg-slate-300 h-32 overflow-hidden cursor-pointer border-slate-300 border"
        >
            <img
                :src="previewImg ?? '/storage/images/default.jpg'"
                class="object-cover object-center w-full h-full"
            />
        </label>
        <input
            type="file"
            id="image"
            @input="imageSelected"
            accept=".png,.jpeg,.jpg,.webp"
            class="hidden"
        />
    </div>
</template>
