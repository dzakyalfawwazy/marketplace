<template>
  <button
    :class="[
      'px-2 py-1 text-xs font-normal text-white rounded-lg shadow-md transition duration-300',
      variantClasses[variant] || variantClasses['primary']
    ]"
    :disabled="disabled"
  >
    <slot />
  </button>
</template>

<script setup>
import { computed } from 'vue';

defineProps({
  variant: {
    type: String,
    default: 'primary', // Default ke primary
  },
  disabled: {
    type: Boolean,
    default: false,
  }
});

// Class Tailwind untuk tiap varian tombol
const variantClasses = {
  primary: 'bg-blue-600 hover:bg-blue-700',
  info: 'bg-cyan-600 hover:bg-cyan-700',
  secondary: 'bg-gray-600 hover:bg-gray-700',
  warning: 'bg-yellow-500 hover:bg-yellow-600 text-black',
  danger: 'bg-red-600 hover:bg-red-700',
};
</script>
