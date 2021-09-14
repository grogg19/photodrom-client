<template>
    <div class="photos-box iso-call">
        <!--  class types: latest random popular oldest -->
            <div class="photo-post latest random post-gal" v-for="photo in photos.data">
                <img v-bind:src="'/albums/' + changeStr(photo.url) + photo.file_name" alt="">
                <a class="hover-box image-popup" v-bind:href="photo.url">
                    <h2>{{ photo.photo_name }}</h2>
                </a>
            </div>
    </div>
</template>

<script>
export default {

    props:['photos'],

    data() {

        return {
        }
    },
    mounted() {
    },

    methods: {
        changeStr(data) {
            return data.replace('original', 'thumbnails/small')
        }
    }
}
</script>
