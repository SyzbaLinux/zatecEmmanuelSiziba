<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <v-card width="600" class="mx-auto my-5 glass">
            <v-card-title class="my-5 text-center">Forgot your password?</v-card-title>


            <v-card-text>
                <div class="mb-4 ">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset
                    link that will allow you to choose a new one.
                </div>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">

                        <v-text-field
                            label="Enter your email"
                            type="email"
                            class="mb-3 mt-5"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                            :error-messages="form.errors.email"
                            clearable
                        />

                    <v-btn class="rounded" block size="x-large" type="submit" :loading="form.processing">
                        Email Password Reset Link
                    </v-btn>
                </form>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>
