<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/pagination";
import { Pagination } from "swiper/modules";

const modules = [Pagination];
</script>

<template>
    <swiper
        :slidesPerView="3"
        :spaceBetween="30"
        :pagination="{
            clickable: true,
        }"
        :modules="modules"
    >
        <swiper-slide>Slide 1</swiper-slide>
        <swiper-slide>Slide 2</swiper-slide
        ><swiper-slide>Slide 3</swiper-slide>
        <swiper-slide>Slide 4</swiper-slide
        ><swiper-slide>Slide 5</swiper-slide>
        <swiper-slide>Slide 6</swiper-slide
        ><swiper-slide>Slide 7</swiper-slide>
        <swiper-slide>Slide 8</swiper-slide><swiper-slide>Slide 9</swiper-slide>
    </swiper>
</template>
