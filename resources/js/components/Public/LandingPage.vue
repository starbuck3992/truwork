<template>
    <div class="min-h-screen max-w-screen overflow-x-hidden overflow-y-hidden">
        <body class="mybody" >
            <Menu></Menu>
            <router-view></router-view>
        </body>
        <Footer></Footer>
    </div>
</template>

<script>
import Menu from './Menu.vue'
import Footer from './Footer.vue'
export default {
    components: {
        Menu,Footer
    }
}
</script>
