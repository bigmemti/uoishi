<template>
    <div class="min-h-screen flex flex-col justify-start items-center">
        <LandingHeader />
        <main>
            <section>
                <div class="flex flex-col-reverse mt-3 md:flex-row md:items-center">
                    <div class="mt-5 px-4 md:max-w-md">
                        <p> {{ $t('Welcome') }} </p>
                        <div class="flex justify-center items-center space-x-3 rtl:space-x-reverse mt-4">
                            <NuxtLink class="text-white bg-violet-600 text-xs p-3 md:text-base md:p-4 rounded-xl hover:bg-violet-500 border-2 border-transparent hover:border-violet-400" href="/dashboard">{{ $t('Dashboard') }}</NuxtLink>
                        </div>
                        <div class="flex justify-center items-center space-x-3 rtl:space-x-reverse mt-4">
                            <NuxtLink class="text-white bg-violet-600 text-xs p-3 md:text-base md:p-4 rounded-xl hover:bg-violet-500 border-2 border-transparent hover:border-violet-400" to="/login">{{ $t('Log in') }}</NuxtLink>
                            <NuxtLink class="text-white bg-violet-600 text-xs p-3 md:text-base md:p-4 rounded-xl hover:bg-violet-500 border-2 border-transparent hover:border-violet-400" href="/register">{{ $t('Register') }}</NuxtLink>
                        </div>
                    </div>
                    <div class="flex justify-center md:max-w-md">
                        <img class="w-[300px] md:w-[650px]" src="" alt="">
                    </div>
                </div>
            </section>
        </main>
        <footer class="grow-[2] flex flex-col justify-end self-stretch">
            <div class="bg-[#3C1787] text-center py-6 text-white">
                <span class="" >با افتخار نیرو گرفته از  
                    ©
                    <a href="https://github.com/bigmemti" target="_blank">
                        bigmemti 
                    </a>
                </span>
            </div>
        </footer>
    </div>
</template>
<script setup>

</script>
<style scoped>
</style>