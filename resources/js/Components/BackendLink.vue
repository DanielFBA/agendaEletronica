<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});

const classes = ["rounded-md px-4 py-2 bg-indigo-600 text-white font-semibold"];
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
