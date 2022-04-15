<template>
    <main>
      <!-- Hero card -->
      <div class="relative">
        <div class="relative bg-gray-900">
          <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="/storage/images/initialize/kitchen1.jpg" alt="" />
            <div class="absolute inset-0 bg-gray-900 mix-blend-multiply" aria-hidden="true" />
          </div>
          <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"><span class="bg-white p-4 rounded">{{ title }}</span></h1>
          </div>
        </div>  
      </div>
      <!-- More main page content here... -->
    </main>
</template>

<script>
import {watch,ref} from 'vue'
export default {
    props: {
      title : String,
    },
    setup (props) {
        const title = ref(props.title)
        watch(() => props.title, (first, second) => {
            title.value = props.title
        })

        return {
            title,
        }
    }
}
</script>

<style lang="scss" scoped>

</style>