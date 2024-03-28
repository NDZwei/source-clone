<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

import Magnify from 'vue-material-design-icons/Magnify.vue';
import HeartOutline from 'vue-material-design-icons/HeartOutline.vue';
import HomeOutline from 'vue-material-design-icons/HomeOutline.vue';
import Compass from 'vue-material-design-icons/Compass.vue';
import SendOutline from 'vue-material-design-icons/SendOutline.vue';
import Plus from 'vue-material-design-icons/Plus.vue';
import AccountOutline from 'vue-material-design-icons/AccountOutline.vue';
import AccountPlusOutline from 'vue-material-design-icons/AccountPlusOutline.vue';
import ChevronLeft from 'vue-material-design-icons/ChevronLeft.vue';

let showCreatePost = ref(false);

</script>

<template>
    <div id="MainLayout" class="w-full h-screen">
        <div v-if="$page.url === '/'" id="TopNavHome"
            class="fixed z-30 md:hidden block w-full bg-white h-[61px] border-b Iborder-b-gray-300">
            <div class="flex items-center justify-between h-full">
                <Link href="/">
                <img class="w-[105px] ml-6 cursor-pointer" src="/insta-logo.png" alt="">
                </Link>

                <div class="flex items-center w-[50%]">
                    <div class="flex items-center w-full Ibg-gray-100 rounded-lg">
                        <Magnify class="pl-4" fillColor="#8E8E8E" size="27" />
                    </div> I
                </div>
            </div>
        </div>
    </div>
</template>
