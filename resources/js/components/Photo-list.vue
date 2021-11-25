<template>
    <isotope class="photos-box iso-call" :list="images" :options="option" v-images-loaded:on.progress="layout" ref="cpt">
        <!--  class types: latest random popular oldest -->
        <div class="photo-post latest random post-gal" v-for="photo in images" :key="photo.id">
            <img v-bind:src="'/albums' + changeStr(photo.url) + photo.file_name" alt="">
            <a class="hover-box image-popup px-2" v-bind:href="'/albums' + changeStrToBig(photo.url) + photo.file_name">
                <h2>{{ photo.photo_name }}</h2>
            </a>
            <div class="tags-block-list">
                <ul class="list-inline list-tags" v-if="photo.tags.length > 0">
                    <li v-for="tag in photo.tags" class="list-inline-item">
                        <a class="tag" v-bind:href="'/tag/' + tag.name ">#{{ tag.name }}</a>
                    </li>
                </ul>
                <div class="date-shot">
                    <i class="fas fa-clock"></i> {{ photo.date_exif}}
                </div>
            </div>
        </div>
    </isotope>
</template>

<script>

import isotope from 'vueisotope'
import imagesLoaded from 'vue-images-loaded'

export default {

    props: ['photos'],

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
            workInProgress: false

        }
    },

    updated() {
        this.popUpUpdate()
    },

    mounted() {
        window.onscroll = () => {
            let bottomOfWindow = Math.floor(document.documentElement.scrollTop + window.innerHeight) === Math.floor(document.documentElement.offsetHeight);

            if (bottomOfWindow && this.nextPage!== null) {
                this.workInProgress = true
                this.infiniteHandler()
            }
        };

        this.$root.$on('receivePhotosByTags',  (photos) => {
            this.images = photos.data
            this.nextPage = photos.next_page_url
            this.popUpUpdate()
            window.scrollTo(0, top)
        })
    },

    methods: {
        changeStr(data) {
            return data.replace('original', 'thumbnails/small')
        },

        changeStrToBig(data) {
            return data.replace('original', 'thumbnails/big')
        },

        infiniteHandler() {
            if (this.workInProgress === true) {
                axios.get(this.nextPage, {})
                    .then((response) => {
                        this.images = this.images.concat(response.data.data)
                        this.nextPage = response.data.next_page_url
                        setTimeout(function() {
                            this.workInProgress = false;
                        }, 4000);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },

        scroll() {

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
<style>

.tags-block-list {
    position: absolute;
    z-index: 10;
    top: 30px;
    left: 30px;
}
</style>
