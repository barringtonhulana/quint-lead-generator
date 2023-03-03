<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { inject, onMounted, ref, watch } from 'vue';

const loader = inject('loader');

const optInMarketing = ref(false);
const termsAndConditions = ref(false);
const acceptedTermsAndConditions = ref(false);

let form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    country: '',
    street_address: '',
    city: '',
    region: '',
    postal_code: '',
    phone_number: '',
    referred_via: '',
    opt_in_marketing: optInMarketing,
    accepted_terms_and_conditions: acceptedTermsAndConditions,
});

watch(optInMarketing, async (newData, oldData) => {
    if (newData != oldData) {
        form.opt_in_marketing = newData;
    }
})

watch(acceptedTermsAndConditions, async (newData, oldData) => {
    if (newData != oldData) {
        form.accepted_terms_and_conditions = newData;
    }
})


const optInMarketingToggle = () => {
    if (optInMarketing.value) {
        optInMarketing.value = false;
        let optInMarketingFormToggle = document.querySelector("#opt_in_marketing_form_toggle");
        optInMarketingFormToggle.classList.remove('bg-quint-green');
        optInMarketingFormToggle.classList.add('bg-gray-200');

        let optInMarketingFormToggleCircle = document.querySelector("#opt_in_marketing_form_toggle_circle");
        optInMarketingFormToggleCircle.classList.remove('translate-x-6');
        optInMarketingFormToggleCircle.classList.add('translate-x-0');
    } else {
        optInMarketing.value = true;
        let optInMarketingFormToggle = document.querySelector("#opt_in_marketing_form_toggle");
        optInMarketingFormToggle.classList.remove('bg-gray-200');
        optInMarketingFormToggle.classList.add('bg-quint-green');

        let optInMarketingFormToggleCircle = document.querySelector("#opt_in_marketing_form_toggle_circle");
        optInMarketingFormToggleCircle.classList.remove('translate-x-0');
        optInMarketingFormToggleCircle.classList.add('translate-x-6');
    }
}

const updateTermsAndConditionsForm = () => {
    if (termsAndConditions.value) {
        termsAndConditions.value = null;
        acceptedTermsAndConditions.value = false;
        let termsAndConditionsFormToggle = document.querySelector("#terms_and_conditions_form_toggle");
        termsAndConditionsFormToggle.classList.remove('bg-quint-green');
        termsAndConditionsFormToggle.classList.add('bg-gray-200');

        let termsAndConditionsFormToggleCircle = document.querySelector("#terms_and_conditions_form_toggle_circle");
        termsAndConditionsFormToggleCircle.classList.remove('translate-x-6');
        termsAndConditionsFormToggleCircle.classList.add('translate-x-0');
    } else {
        termsAndConditions.value = true;
    }
}

const acceptTermsAndConditions = () => {
    acceptedTermsAndConditions.value = true;
    let termsAndConditionsFormToggle = document.querySelector("#terms_and_conditions_form_toggle");
    termsAndConditionsFormToggle.classList.remove('bg-gray-200');
    termsAndConditionsFormToggle.classList.add('bg-quint-green');

    let termsAndConditionsFormToggleCircle = document.querySelector("#terms_and_conditions_form_toggle_circle");
    termsAndConditionsFormToggleCircle.classList.remove('translate-x-0');
    termsAndConditionsFormToggleCircle.classList.add('translate-x-6');

}

const submit = () => {
    form.post(route('career.store'), {
        preserveScroll: false,
        onSuccess: () => form.reset()
    });

    optInMarketingToggle();
    updateTermsAndConditionsForm();
}

</script>

<template>
    <AppLayout title="Create Lead">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
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
                            <form @submit.prevent="submit" class="space-y-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <div class="mt-1">
                                        <input v-model="form.first_name" id="first_name" name="first_name" type="text"
                                            autocomplete="first_name"
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-quint-green focus:outline-none focus:ring-quint-green sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.first_name }"/>
                                        <div v-if="form.errors.first_name" class="mt-2 text-sm text-red-600">{{ form.errors.first_name }}</div>
                                    </div>
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input v-model="form.last_name" id="last_name" name="last_name" type="text"
                                            autocomplete="last_name"
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-quint-green focus:outline-none focus:ring-quint-green sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.last_name }"/>
                                        <div v-if="form.errors.last_name" class="mt-2 text-sm text-red-600">{{ form.errors.last_name }}</div>
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <div class="mt-1">
                                        <input v-model="form.email" id="email" name="email" type="email"
                                            autocomplete="email"
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-quint-green focus:outline-none focus:ring-quint-green sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.email }"/>
                                        <div v-if="form.errors.email" class="mt-2 text-sm text-red-600">{{ form.errors.email }}</div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Country</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <select v-model="form.country" id="country" name="country"
                                            autocomplete="country-name"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-quint-green focus:ring-quint-green sm:max-w-xs sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.country }">
                                            <option>South Africa</option>
                                            <option>United Kingdom</option>
                                            <option>United States</option>
                                            <option>Australia</option>
                                        </select>
                                        <div v-if="form.errors.country" class="mt-2 text-sm text-red-600">{{ form.errors.country }}</div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="street_address"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Street
                                        address</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input v-model="form.street_address" type="text" name="street_address"
                                            id="street_address" autocomplete="street_address"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-quint-green focus:ring-quint-green sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.street_address }"/>
                                        <div v-if="form.errors.street_address" class="mt-2 text-sm text-red-600">{{ form.errors.street_address }}</div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="city"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">City</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input v-model="form.city" type="text" name="city" id="city"
                                            autocomplete="address-level2"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-quint-green focus:ring-quint-green sm:max-w-xs sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.city }"/>
                                        <div v-if="form.errors.city" class="mt-2 text-sm text-red-600">{{ form.errors.city }}</div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="region"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">State /
                                        Province</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input v-model="form.region" type="text" name="region" id="region"
                                            autocomplete="address-level1"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-quint-green focus:ring-quint-green sm:max-w-xs sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.region }"/>
                                        <div v-if="form.errors.region" class="mt-2 text-sm text-red-600">{{ form.errors.region }}</div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="postal_code"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">ZIP / Postal
                                        code</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input v-model="form.postal_code" type="text" name="postal_code" id="postal_code"
                                            autocomplete="postal_code"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-quint-green focus:ring-quint-green sm:max-w-xs sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.postal_code }"/>
                                        <div v-if="form.errors.postal_code" class="mt-2 text-sm text-red-600">{{ form.errors.postal_code }}</div>
                                    </div>
                                </div>


                                <div>
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone
                                        number</label>
                                    <div class="mt-1">
                                        <input v-model="form.phone_number" id="phone_number" name="phone_number" type="tel"
                                            autocomplete="phone_number"
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-quint-green focus:outline-none focus:ring-quint-green sm:text-sm"
                                            :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.phone_number }"/>
                                        <div v-if="form.errors.phone_number" class="mt-2 text-sm text-red-600">{{ form.errors.phone_number }}</div>
                                    </div>
                                </div>

                                <div>
                                    <label for="referred_via" class="block text-sm font-medium text-gray-700">How did you
                                        find
                                        out about the company?</label>
                                    <select v-model="form.referred_via" id="referred_via" name="referred_via"
                                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-quint-green focus:outline-none focus:ring-quint-green sm:text-sm"
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.referred_via }">
                                        <option selected>Select an option</option>
                                        <option>Website</option>
                                        <option>LinkedIn</option>
                                        <option>Employee</option>
                                        <option>Other</option>
                                    </select>
                                    <div v-if="form.errors.referred_via" class="mt-2 text-sm text-red-600">{{ form.errors.referred_via }}</div>
                                </div>

                                <div class="">
                                    <div class="flex justify-between">
                                        <label for="opt_in_marketing"
                                        class="block text-sm font-medium text-gray-700">Opt-in on
                                        marketing, promotional, career emails?</label>
                                    <button type="button" @click="optInMarketingToggle()" id="opt_in_marketing_form_toggle"
                                        class="bg-gray-200 relative inline-flex h-5 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-quint-green focus:ring-offset-2"
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.opt_in_marketing }"
                                        role="switch" aria-checked="false">
                                        <span class="sr-only">Button to opt-in on marketing, promotional, career
                                            emails</span>
                                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                        <span aria-hidden="true" id="opt_in_marketing_form_toggle_circle"
                                            class="translate-x-0 pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                    </button>
                                    </div>
                                    <div v-if="form.errors.opt_in_marketing" class="mt-2 text-sm text-red-600">{{ form.errors.opt_in_marketing }}</div>
                                </div>

                                <div class="">
                                    <div class="flex justify-between">
                                        <label for="terms_and_conditions_form_toggle"
                                        class="block text-sm font-medium text-gray-700 mr-2">Accept terms
                                        and
                                        conditions?</label>
                                    <button type="button" @click="updateTermsAndConditionsForm()"
                                        id="terms_and_conditions_form_toggle"
                                        class="bg-gray-200 relative inline-flex h-5 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-quint-green focus:ring-offset-2"
                                        :class="{'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-50': form.errors.accepted_terms_and_conditions }"
                                        role="switch" aria-checked="false">
                                        <span class="sr-only">Button to open terms and conditions modal</span>
                                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                        <span aria-hidden="true" id="terms_and_conditions_form_toggle_circle"
                                            class="translate-x-0 pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                    </button>
                                    </div>
                                    <div v-if="form.errors.accepted_terms_and_conditions" class="mt-2 text-sm text-red-600">{{ form.errors.accepted_terms_and_conditions }}</div>
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
                                    <PrimaryButton :type="'submit'" class="flex w-full justify-center">Submit
                                    </PrimaryButton>
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
    </AppLayout>
</template>