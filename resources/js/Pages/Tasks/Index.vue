<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import BackendLink from "@/Components/BackendLink.vue";
import Calendar from "@/Components/Calendar.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

const props = defineProps({
    tasks: {
        type: Array,
        required: true,
    }
});

const showModal = ref(false);
const modalId = ref(null);
const modalTitle = ref("Título da Tarefa");
const modalDescription = ref("Descrição da Tarefa");
const modalStart = ref(null);
const modalEnd = ref(null);
const modalStatus = ref(null);

const openModal = ({ id, title, description, start_date, end_date, status }) => {
    modalId.value = id;
    modalTitle.value = title;
    modalDescription.value = description;
    modalStart.value = start_date;
    modalEnd.value = end_date;
    modalStatus.value = status;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Agendas" />

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Tarefas
                </h2>
                <BackendLink :href="route('tasks.create')">
                    Criar Tarefa
                </BackendLink>
            </div>
        </template>

        <Modal :show="showModal" @close="closeModal">
            <template v-slot:header>
                <div class="flex flex-col items-start gap-4">
                    <span>{{ modalId }}</span>
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Titulo da Tarefa -  {{ modalTitle }}
                    </h2>
                </div>
            </template>

            <div class="flex flex-col items-start gap-4 px-6">
                <p class="text-light text-white">Descrição: {{ modalDescription }}</p>
                <p class="text-light text-white">Data Início: {{ modalStart }}</p>
                <p class="text-light text-white">Data Fim: {{ modalEnd }}</p>
                <p class="text-light text-white">Status: {{ modalStatus }}</p>
            </div>
                <BackendLink class="" :href="route('tasks.create')">
                    Editar Tarefa
                </BackendLink>
        </Modal>

        <!--
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Lista de Tarefas
                    </div>

                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-2">
                        <div class="bg-red-500 p-6 text-center" v-for="task in tasks" :key="task.id">
                            <span>{{ task.id }}</span>
                            <h1>{{ task.title }}</h1>
                            <p>{{ task.description }}</p>
                            <p>{{ task.start_date }}</p>
                            <p>{{ task.end_date }}</p>
                            <p>{{ task.status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        -->

        <div class="my-12">
            <Calendar :tasks="props.tasks" @eventClick="openModal" />
        </div>
    </AuthenticatedLayout>
</template>
