<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head } from "@inertiajs/vue3";
import { Swiper, SwiperSlide } from "swiper/vue";
import { ref } from "vue";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { Autoplay, Pagination, Navigation } from "swiper/modules";
import Productslider from "@/Components/productslider.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const showingNavigationDropdown = ref(false);

const isOpen = ref(false);

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};

const modules = [Pagination, Navigation, Autoplay];
</script>

<template>
    <Head title="Home"></Head>
    <body class="h-screen bg-white">
        <header class="shadow-md">
            <nav
                class="flex justify-between items-center text-black w-[92%] mx-auto py-3 z-50 h-auto"
            >
                <div class="w-[20%] flex-none">
                    <ApplicationLogo
                        class="block h-9 fill-current text-gray-800"
                    />
                </div>
                <div
                    :class="isOpen ? 'top-[-100%] ' : 'top-[6%]'"
                    class="md:static absolute md:min-h-fit duration-500 bg-white min-h-[40vw] left-0 md:w-auto w-full flex items-center px-4 flex-1 z-0"
                >
                    <ul
                        class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-6"
                    >
                        <li
                            class="hover:text-slate-400 cursor-pointer active:border-b border-spacing-x-0 border-slate-400"
                        >
                            Home
                        </li>
                        <li
                            class="hover:text-slate-400 cursor-pointer active:border-b border-spacing-x-0 border-slate-400"
                        >
                            Product
                        </li>
                        <li
                            class="hover:text-slate-400 cursor-pointer active:border-b border-spacing-x-0 border-slate-400"
                        >
                            Contact
                        </li>
                        <li
                            class="hover:text-slate-400 cursor-pointer active:border-b border-spacing-x-0 border-slate-400"
                        >
                            About
                        </li>
                    </ul>
                </div>
                <div class="flex-none flex items-center gap-3">
                    <div class="relative w-64">
                        <input
                            type="text"
                            name="search"
                            id="search"
                            placeholder="What are you looking for?"
                            autocomplete="off"
                            class="pr-10 pl-2 border bg-gray-100 border-gray-300 rounded-lg p-1 w-full outline-none focus:border-gray-100 focus:ring-1 focus:ring-gray-100 transition-all duration-200 placeholder:text-xs"
                        />
                        <label
                            for="search"
                            class="fa-solid fa-magnifying-glass absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                        ></label>
                    </div>

                    <i
                        class="fas fa-shopping-cart text-gray-600 cursor-pointer text-sm"
                    ></i>
                    <i
                        class="fas fa-heart text-gray-600 cursor-pointer text-sm"
                    ></i>
                    <button
                        class="bg-slate-400 text-white rounded-full px-3 py-1"
                    >
                        Sign In
                    </button>
                    <i
                        :class="isOpen ? 'fas fa-bars' : 'fas fa-close'"
                        class="fas fa-bars text-3xl cursor-pointer md:hidden"
                        @click="toggleMenu"
                    ></i>
                </div>
            </nav>
        </header>
        <main>
            <slot />
            <div class="grid md:grid-cols-3 grid-cols-1 w-[95%] mx-auto pt-3">
                <div class="side bg-slate-50 px-3 py-4 border-r-2">
                    <ul class="flex flex-col left-3">
                        <li
                            class="flex justify-between items-center w-full md:py-3 border-b-2"
                        >
                            <span>Woman Fashion</span>
                            <span class="pb-1">
                                <i class="fas fa-chevron-right text-xs"></i
                            ></span>
                        </li>
                        <li
                            class="flex justify-between items-center w-full py-3 border-b-2"
                        >
                            <span>Men Fashion</span>
                            <span class="pb-1">
                                <i class="fas fa-chevron-right text-xs"></i
                            ></span>
                        </li>
                        <li
                            class="flex justify-between items-center w-full py-3 border-b-2"
                        >
                            <span>Elektronic</span>
                            <span class="pb-1">
                                <i class="fas fa-chevron-right text-xs"></i
                            ></span>
                        </li>
                    </ul>
                </div>
                <div class="md:col-span-2">
                    <div class="h-auto px-3 py-3 rounded-full shadow-sm">
                        <swiper
                            :modules="modules"
                            :loop="true"
                            :autoplay="{
                                delay: 8500,
                                disableOnInteraction: false,
                            }"
                            :pagination="{
                                clickable: true,
                            }"
                            :navigation="false"
                            class="rounded-md"
                        >
                            <swiper-slide class="">
                                <div
                                    class="bg-[url(storage/images/default2.png)] bg-cover bg-center w-full md:h-72 h-48 flex items-end justify-left text-white py-3 px-3"
                                >
                                    <div class="flex flex-col">
                                        <div
                                            class="md:text-2xl text-m font-bold"
                                        >
                                            Teks di Tengah
                                        </div>
                                        <div
                                            class="md:text-xl text-xs font-thin"
                                        >
                                            <span class="border-b-2">
                                                Shop Now
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </swiper-slide>
                            <swiper-slide class="">
                                <div
                                    class="bg-[url(storage/images/default.png)] bg-cover bg-center w-full md:h-72 h-48 flex items-end justify-left text-black py-3 px-3"
                                >
                                    <div class="flex flex-col">
                                        <div
                                            class="md:text-2xl text-md font-bold"
                                        >
                                            Teks di Tengah
                                        </div>
                                        <div
                                            class="md:text-xl text-xs font-thin"
                                        >
                                            Shop
                                        </div>
                                    </div>
                                </div>
                            </swiper-slide>
                            <swiper-slide class="">
                                <div
                                    class="bg-[url(storage/images/default.jpg)] bg-cover bg-center w-full md:h-72 h-48 flex items-end justify-left text-black py-3 px-3"
                                >
                                    <div class="flex flex-col">
                                        <div
                                            class="md:text-2xl text-md font-bold"
                                        >
                                            Teks di Tengah
                                        </div>
                                        <div
                                            class="md:text-xl text-xs font-thin"
                                        >
                                            Shop
                                        </div>
                                    </div>
                                </div>
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 w-[95%] mx-auto pt-3">
                <Productslider> </Productslider>
            </div>
        </main>
    </body>
    <!-- Page Content -->
</template>

<style scope>
.swiper {
    width: 100%;
    height: 100%;
}

.mySwiper {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
