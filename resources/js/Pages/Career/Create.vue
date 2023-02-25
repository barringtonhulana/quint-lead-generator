<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { inject, onMounted, ref } from 'vue';
import ApplicationMarkVue from '../../Components/ApplicationMark.vue';

const loader = inject('loader');

const optInMarketing = ref(false);
const termsAndConditions = ref(null);
const acceptedTermsAndConditions = ref(false);


function optInMarketingToggle() {
    if (optInMarketing.value) {
        optInMarketing.value = false;
        let optInMarketingFormToggle = document.querySelector("#optInMarketingFormToggle");
        optInMarketingFormToggle.classList.remove('bg-indigo-600');
        optInMarketingFormToggle.classList.add('bg-gray-200');

        let optInMarketingFormToggleCircle = document.querySelector("#optInMarketingFormToggleCircle");
        optInMarketingFormToggleCircle.classList.remove('translate-x-6');
        optInMarketingFormToggleCircle.classList.add('translate-x-0');
    } else {
        optInMarketing.value = true;
        let optInMarketingFormToggle = document.querySelector("#optInMarketingFormToggle");
        optInMarketingFormToggle.classList.remove('bg-gray-200');
        optInMarketingFormToggle.classList.add('bg-indigo-600');

        let optInMarketingFormToggleCircle = document.querySelector("#optInMarketingFormToggleCircle");
        optInMarketingFormToggleCircle.classList.remove('translate-x-0');
        optInMarketingFormToggleCircle.classList.add('translate-x-6');
    }
}

function updateTermsAndConditionsForm() {
    if (termsAndConditions.value) {
        termsAndConditions.value = null;
        acceptedTermsAndConditions.value = false;
        let termsAndConditionsFormToggle = document.querySelector("#termsAndConditionsFormToggle");
        termsAndConditionsFormToggle.classList.remove('bg-indigo-600');
        termsAndConditionsFormToggle.classList.add('bg-gray-200');

        let termsAndConditionsFormToggleCircle = document.querySelector("#termsAndConditionsFormToggleCircle");
        termsAndConditionsFormToggleCircle.classList.remove('translate-x-6');
        termsAndConditionsFormToggleCircle.classList.add('translate-x-0');
    } else {
        termsAndConditions.value = true;
    }
}

function acceptTermsAndConditions() {
    acceptedTermsAndConditions.value = true;
    let termsAndConditionsFormToggle = document.querySelector("#termsAndConditionsFormToggle");
    termsAndConditionsFormToggle.classList.remove('bg-gray-200');
    termsAndConditionsFormToggle.classList.add('bg-indigo-600');

    let termsAndConditionsFormToggleCircle = document.querySelector("#termsAndConditionsFormToggleCircle");
    termsAndConditionsFormToggleCircle.classList.remove('translate-x-0');
    termsAndConditionsFormToggleCircle.classList.add('translate-x-6');

}

</script>

<template>
    <AppLayout title="Create Lead">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Careers
            </h2>
        </template>

        <div class="bg-white shadow-md rounded-lg flex min-h-full w-3/4 mx-auto overflow-hidden">
            <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <ApplicationMark class="h-16 w-auto" />
                        <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Are you a high performer and
                            looking for a career in tech?</h2>
                        <p class="mt-2 text-sm text-gray-600">
                            If so, we want to hear from you.
                        </p>
                    </div>

                    <div class="mt-8">
                        <div class="mt-6">
                            <form action="#" method="POST" class="space-y-6">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <div class="mt-1">
                                        <input id="firstName" name="firstName" type="text" autocomplete="firstName"
                                            required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input id="lastName" name="lastName" type="text" autocomplete="lastName" required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <div class="mt-1">
                                        <input id="email" name="email" type="email" autocomplete="email" required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Country</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <select id="country" name="country" autocomplete="country-name"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                            <option>South Africa</option>
                                            <option>United Kingdom</option>
                                            <option>United States</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="streetAddress"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Street
                                        address</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="streetAddress" id="streetAddress"
                                            autocomplete="streetAddress"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="city"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">City</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="city" id="city" autocomplete="address-level2"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="region"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">State /
                                        Province</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="region" id="region" autocomplete="address-level1"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="postalCode"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">ZIP / Postal
                                        code</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="postalCode" id="postalCode" autocomplete="postalCode"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    </div>
                                </div>


                                <div>
                                    <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone
                                        number</label>
                                    <div class="mt-1">
                                        <input id="phoneNumber" name="phoneNumber" type="tel" autocomplete="phoneNumber"
                                            required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="referredVia" class="block text-sm font-medium text-gray-700">How did you
                                        find
                                        out about the company?</label>
                                    <select id="referredVia" name="referredVia"
                                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option selected>Select an option</option>
                                        <option>Website</option>
                                        <option>LinkedIn</option>
                                        <option>Employee</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="flex justify-between">
                                    <label for="optInMarketingFormToggle" class="block text-sm font-medium text-gray-700">Opt-in on
                                        marketing, promotional, career emails?</label>
                                    <button type="button" @click="optInMarketingToggle()" id="optInMarketingFormToggle"
                                        class="bg-gray-200 relative inline-flex h-5 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        role="switch" aria-checked="false">
                                        <span class="sr-only">Button to opt-in on marketing, promotional, career
                                            emails</span>
                                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                        <span aria-hidden="true" id="optInMarketingFormToggleCircle"
                                            class="translate-x-0 pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                    </button>
                                </div>

                                <div class="flex justify-between">
                                    <label for="termsAndConditionsFormToggle" class="block text-sm font-medium text-gray-700 mr-2">Accept terms
                                        and
                                        conditions?</label>
                                    <button type="button" @click="updateTermsAndConditionsForm()"
                                        id="termsAndConditionsFormToggle"
                                        class="bg-gray-200 relative inline-flex h-5 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        role="switch" aria-checked="false">
                                        <span class="sr-only">Button to open terms and conditions modal</span>
                                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                        <span aria-hidden="true" id="termsAndConditionsFormToggleCircle"
                                            class="translate-x-0 pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                    </button>
                                </div>

                                <ConfirmationModal :show="termsAndConditions && !acceptedTermsAndConditions"
                                    @close="updateTermsAndConditionsForm()">
                                    <template #title>
                                        Terms and Conditions
                                    </template>

                                    <template #content>
                                        Do you accept company terms?
                                    </template>

                                    <template #footer>
                                        <PrimaryButton @click="acceptTermsAndConditions()" class="mr-4">Accept
                                        </PrimaryButton>
                                        <SecondaryButton @click="updateTermsAndConditionsForm()">
                                            Cancel
                                        </SecondaryButton>
                                    </template>
                                </ConfirmationModal>

                                <div>
                                    <button type="submit"
                                        class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative hidden w-0 flex-1 lg:block">
                <img class="absolute inset-0 h-full w-full object-cover"
                    src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                alt="">
        </div>
    </div>
</AppLayout></template>