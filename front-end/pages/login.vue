<template>
    <AuthCard>
        <template #logo>
            <NuxtLink to="/">
                <Banner />
            </NuxtLink>
        </template>

        <!-- Session Status -->

        <UForm class="py-4">

            <UFormGroup :label="$t('Email')" required >
                <UInput id="email" class="my-4" type="email" name="email" required autofocus />
            </UFormGroup>
            
            <UFormGroup :label="$t('Password')" required>
                <UInput id="email" class="my-4" type="password" name="password" required autofocus autocomplete="current-password" />
            </UFormGroup> 

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <UCheckbox id="remember_me" type="checkbox" class="rounded" name="remember"/>
                    <span class="ltr:ml-2 rtl:mr-2 text-sm text-gray-600">{{ $t('Remember me') }} </span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <UButton variant="link" href="">
                    {{ $t('Forgot your password?') }} 
                </UButton>

                <UButton class="ltr:ml-3 rtl:mr-3 text-xs py-2 px-4">
                        {{ $t('Log in') }} 
                </UButton>
            </div>
        </UForm>
    </AuthCard>
</template>

<script setup>
    definePageMeta({
        layout : 'guest'
    });
</script>

<style scoped></style>