<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import BackendLink from "@/Components/BackendLink.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
    status: "",
    begin_date: "",
    end_date: "",
});

const submit = () => {
    // console.log("form", form);
    form.post(route("tasks.store"));
    s;
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Criar Tarefa" />

        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Nova Tarefa
                </h2>
                <BackendLink :href="route('tasks.index')"> Voltar </BackendLink>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label
                                    for="title"
                                    class="mb-3 block text-base font-medium text-white"
                                >
                                    Título
                                </label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    placeholder="Título"
                                    v-model="form.title"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>
                            <div class="mb-5">
                                <label
                                    for="description"
                                    class="mb-3 block text-base font-medium text-white"
                                >
                                    Descrição
                                </label>
                                <input
                                    type="text"
                                    name="description"
                                    id="description"
                                    placeholder="Descrição"
                                    v-model="form.description"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>
                            <div class="mb-5">
                                <label
                                    for="status"
                                    class="mb-3 block text-base font-medium text-white"
                                >
                                    Status
                                </label>
                                <select
                                    name="status"
                                    id="status"
                                    v-model="form.status"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                >
                                    <option value="Pendente">Pendente</option>
                                    <option value="Concluída">Concluída</option>
                                    <option value="Cancelada">Cancelada</option>
                                </select>
                                
                            </div>
                            <div class="mb-5">
                                <label
                                    for="begin_date"
                                    class="mb-3 block text-base font-medium text-white"
                                >
                                    Data de Início
                                </label>
                                <input
                                    type="datetime-local"
                                    name="begin_date"
                                    id="begin_date"
                                    v-model="form.begin_date"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>
                            <div class="mb-5">
                                <label
                                    for="beend_dateggin_date"
                                    class="mb-3 block text-base font-medium text-white"
                                >
                                    Data de Término
                                </label>
                                <input
                                    type="datetime-local"
                                    name="end_date"
                                    id="end_date"
                                    v-model="form.end_date"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>

                            <button
                                class="px-4 py-2 bg-yellow-400"
                                type="submit"
                                @click="submit()"
                            >
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
