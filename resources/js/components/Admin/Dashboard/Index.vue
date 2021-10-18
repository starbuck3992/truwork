<template>
    <AdminGalleryIndex></AdminGalleryIndex>
<!--    <form @submit.prevent="submit">-->
<!--        <input type="text" v-model="form.title">-->
<!--        <input type="text" v-model="form.category">-->
<!--        <input type="file" class="form-control" multiple accept="image/jpeg" @change="preview"/>-->
<!--        <div v-for="(image, key) in imagesPreview" :key="key">-->
<!--            <img :src="image.src" class="preview" style="width:600px;" alt=""/>-->
<!--            {{ image.file.name }}-->
<!--        </div>-->
<!--        <button>test</button>-->
<!--    </form>-->
</template>

<script>
import AdminGalleryIndex from "../Gallery/Index"

import {onMounted, reactive, ref} from 'vue'
import api from '../../../services/api';
import Form from "../../../utilities/form"

export default {
    components: {
        AdminGalleryIndex
    },
    // setup() {
    //     const imagesPreview = ref([])
    //
    //     onMounted(() => {
    //         api.getUser().then(
    //             response => console.log(response.data)
    //         )
    //     })
    //     const form = reactive(new Form({
    //             title: null,
    //             category: null,
    //             images: []
    //         }))
    //
    //     function preview(e) {
    //         let selectedFiles = e.target.files;
    //         for (let i = 0; i < selectedFiles.length; i++) {
    //             let img = {
    //                 src: URL.createObjectURL(selectedFiles[i]),
    //                 file: selectedFiles[i],
    //             }
    //             imagesPreview.value.push(img)
    //             form.images.push(selectedFiles[i])
    //         }
    //     }
    //
    //     async function submit(event) {
    //         await api.postGallery(form.objectToFormData())
    //             .then(() => {
    //                 form.onSuccess()
    //                 imagesPreview.value = []
    //                 event.target.reset();
    //             }).catch(error => {
    //                 console.log(error)
    //             })
    //     }
    //
    //     return {
    //         form,
    //         imagesPreview,
    //         preview,
    //         submit
    //     }
    // }
}
</script>
