<template>
    <AuthCard>
        <template #logo>
            <NuxtLink to="/">
                <Banner />
            </NuxtLink>
        </template>

        <UForm class="py-4">

            <UFormGroup :label="$t('Name')" required >
                <UInput id="name" class="my-4" type="name" name="name" required autofocus/>
            </UFormGroup>

            <UFormGroup :label="$t('Email')" required >
                <UInput id="email" class="my-4" type="email" name="email" required/>
            </UFormGroup>

            <UFormGroup :label="$t('Password')" required >
                <UInput id="password" class="my-4" type="password" name="password" required/>
            </UFormGroup>

            <UFormGroup :label="$t('Confirm Password')" required >
                <UInput id="password_confirmation" class="my-4" type="password" name="password_confirmation" required/>
            </UFormGroup>

            <div class="flex items-center justify-end mt-4">
                <UButton variant="link" to="/login">
                    {{ $t('Already registered?') }} 
                </UButton>

                <UButton type="submit" class="ltr:ml-3 rtl:mr-3 text-xs py-2 px-4">
                        {{ $t('Register') }} 
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