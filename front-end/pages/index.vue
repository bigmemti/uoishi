<template>
    <div class="min-h-screen flex flex-col justify-start items-center">
        <LandingHeader />
        <main class="grow flex items-center -mt-28">
            <section>
                <div class="flex flex-col-reverse mt-3 gap-8 md:flex-row md:items-center justify-center">
                    <div class="mt-5 px-4 md:max-w-md">
                        <p> {{ $t('Welcome') }} </p>
                        <div v-if="false" class="flex justify-center items-center space-x-3 rtl:space-x-reverse mt-4">
                            <UButton to="dashboard" :ui="{ rounded: 'rounded-xl'}" size="xl" :label="$t('Dashboard')"  />
                            </div>
                        <div v-else class="flex justify-center items-center space-x-3 rtl:space-x-reverse mt-4">
                            <UButton to="login" :ui="{ rounded: 'rounded-xl'}" size="xl" :label="$t('Log in')"  />
                            <UButton to="register" :ui="{ rounded: 'rounded-xl'}" size="xl" :label="$t('Register')"  />
                        </div>
                    </div>
                    <div class="flex justify-center md:max-w-md">
                        <img class="w-[300px] md:w-[650px]" src="/img/task.png">
                    </div>
                </div>
            </section>
        </main>
        <LandingFooter />
    </div>
</template>
<script setup>

</script>
<style scoped>
</style>