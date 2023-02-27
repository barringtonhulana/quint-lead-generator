<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useDebouncedRef } from '../../../Helpers/debouncedRef';

defineProps({
    careers: Object,
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="bg-white shadow-md rounded-lg min-h-full w-3/4 mx-auto overflow-hidden">
            <ul role="list" class="divide-y divide-gray-200">
                <li v-for="user in careers.data" :key="user.id">
                    <Link :href="route('dashboard.show', user.id)" class="block hover:bg-gray-50">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="flex min-w-0 flex-1 items-center">
                            <div class="flex-shrink-0 text-quint-orange">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <p class="truncate text-sm font-medium text-quint-green">{{ user.first_name + ' ' +
                                        user.last_name }}</p>
                                    <div class="mt-2 flex flex-col text-sm text-gray-500">
                                        <div class="">
                                            <svg class="mr-1.5 h-5 w-5 text-gray-400 inline-block" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                                <path
                                                    d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                            </svg>
                                            <span class="truncate">{{ user.email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden text-sm text-gray-900 md:block">
                                    <p>Subscribed on <time datetime="2020-01-07">{{ user.created_at }}</time></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    </Link>
                </li>
            </ul>

            <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
                aria-label="Pagination">
                <div class="hidden sm:block text-sm text-gray-700">
                    <p>
                        Showing page
                        <span class="font-medium">{{ careers.current_page }}</span>
                        of
                        <span class="font-medium">{{ careers.last_page }}</span>
                    </p>
                    <p class="mt-2">
                        Total <span>{{ careers.total }}</span> results
                    </p>
                </div>
                <div class="flex flex-1 justify-between sm:justify-end">
                    <Link v-if="careers.prev_page_url" :href="careers.prev_page_url"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Previous
                    </Link>
                    <Link v-if="careers.next_page_url" :href="careers.next_page_url"
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Next
                    </Link>
                </div>
            </nav>
        </div>
    </AppLayout>
</template>
