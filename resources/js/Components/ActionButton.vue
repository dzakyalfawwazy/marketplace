<template>
    <span class="grid grid-flow-row" v-if="variant !== 'delete'">
        <a
            :class="[
            'text-center px-2 py-1 text-xs font-normal rounded-lg shadow-md transition duration-300',
            variantClasses[variant] || variantClasses['primary']
            ]"
            :disabled="disabled" :href ="currentRoute+href"
        >
        <i :class="['fas',iconClasses[variant] || iconClasses['primary']]"></i>
            <slot />
        </a>

    </span>
<span class="grid grid-flow-row" v-if="variant === 'delete'">
  <button
    :class="[
      'text-center px-2 py-1 text-xs font-normal rounded-lg shadow-md transition duration-300',
      variantClasses[variant] || variantClasses['primary']
    ]"  @click="handleClick"
  >
  <i :class="['fas',iconClasses[variant] || iconClasses['primary']]"> </i>
    <slot />
  </button>

    </span>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { defineEmits } from 'vue';

defineProps({
  variant: {
    type: String,
    default: 'primary', // Default ke primary
  },
  href: {
    type: String,
    default: '#', // Default ke primary
  },
  disabled: {
    type: Boolean,
    default: false,
  }
});

const currentRoute = computed(() => usePage().url);;


const emit = defineEmits(['click']);

const handleClick = (event) => {
  emit('click', event);
};

// Class Tailwind untuk tiap varian tombol
const variantClasses = {
  primary: 'bg-blue-600 hover:bg-blue-700 text-white ',
  edit: 'bg-cyan-600 hover:bg-cyan-700 text-white ',
  secondary: 'bg-gray-600 hover:bg-gray-700 text-black',
  warning: 'bg-yellow-500 hover:bg-yellow-600 text-black ',
  delete: 'bg-red-600 hover:bg-red-700 text-white ',
  view: 'bg-green-500 hover:bg-green-600 text-white ',
};

const iconClasses = {
  primary: 'fa-check-circle',
  edit: 'fa-edit',
  secondary: 'fa-circle',
  warning: 'fa-exclamation-triangle',
  delete: 'fa-trash',
  view: 'fa-external-link',
};
</script>
