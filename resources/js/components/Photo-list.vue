<template>
    <isotope class="photos-box iso-call" :list="images" :options="option" v-images-loaded:on.progress="layout" ref="cpt">
        <!--  class types: latest random popular oldest -->
        <div class="photo-post latest random post-gal" v-for="photo in images" :key="photo.id">
            <img v-bind:src="'/albums' + changeStr(photo.url) + photo.file_name" alt="">
            <a class="hover-box image-popup" v-bind:href="'/albums' + changeStrToBig(photo.url) + photo.file_name">
                <h2>{{ photo.photo_name }}</h2>
            </a>
        </div>
    </isotope>
</template>

<script>

import isotope from 'vueisotope'
import imagesLoaded from 'vue-images-loaded'

export default {

    props:['photos'],

    components: {
        'isotope': isotope,
    },

    directives: {
        imagesLoaded,
    },



    data() {
        return {
            selected: null,
            images: this.photos.data,
            option: {
                //sortBy : null,
            },
            nextPage: this.photos.next_page_url,

        }
    },

    updated() {
        this.popUpUpdate()
    },

    mounted() {
        this.scroll();
    },

    methods: {
        changeStr(data) {
            return data.replace('original', 'thumbnails/small')
        },

        changeStrToBig(data) {
            return data.replace('original', 'thumbnails/big')
        },

        infiniteHandler() {

            axios.get(this.nextPage, {})
                .then((response) => {
                    this.images = this.images.concat(response.data.data)
                    this.nextPage = response.data.next_page_url
                })
                .catch(error => {
                    console.log(error);
                })
        },

        scroll() {
            window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow && this.nextPage!== null) {
                    this.infiniteHandler()
                }
            };
        },
        layout () {
            this.$refs.cpt.layout('masonry');
        },

        popUpUpdate() {
            $('a.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }


    }
}
</script>
