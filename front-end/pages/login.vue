<template>
    <authCard>
        <template #logo>
            <NuxtLink to="/">
                <h1 class="banner">
                        uoishi
                </h1>
            </NuxtLink>
        </template>

        <!-- Session Status -->
        <!-- <x-auth-session-status class="mb-4" status="session('status')" /> -->

        <UForm class="py-4">

            <!-- Email Address -->
            <UFormGroup :label="$t('Email')" required >
                <UInput id="email" class="my-4" type="email" name="email" required autofocus />
            </UFormGroup>
            
            
            
            <!-- Password -->
            <UFormGroup :label="$t('Password')" required>
                <UInput id="email" class="my-4" type="password" nam
                e="password" required autofocus autocomplete="current-password" />
            </UFormGroup> 

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <UCheckbox id="remember_me" type="checkbox" class="rounded" name="remember"/>
                    <span class="ltr:ml-2 rtl:mr-2 text-sm text-gray-600">{{ $t('Remember me') }} </span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ $t('Forgot your password?') }} 
                </a>

                <UButton class="ltr:ml-3 rtl:mr-3 text-xs py-2 px-4">
                        {{ $t('Log in') }} 
                </UButton>
            </div>
        </UForm>
    </authCard>
</template>
<script setup>
    definePageMeta({
        layout : 'guest'
    });
</script>
<style scoped>
    .banner{
        font-family : Freestyle Script;
        font-size : 5rem;
        text-align : center;
        color : #3C1787;
    }
</style>