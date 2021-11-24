<template>
    <isotope class="photos-box iso-call" :list="images" :options="option" v-images-loaded:on.progress="layout" ref="cpt">
        <!--  class types: latest random popular oldest -->
        <div class="photo-post latest random post-gal" v-for="(photo, index) in images" :key="photo.id">
            <img v-bind:src="'/albums' + changeStr(photo.url) + photo.file_name" alt="">
            <a class="hover-box image-popup px-2" v-bind:href="'/albums' + changeStrToBig(photo.url) + photo.file_name">
<!--                <div class="text-left">-->
<!--                    <input class="form-check-input check-add-tag" type="checkbox"  v-bind:id="'checkAddTag-' + photo.id"  value="" >-->
<!--                </div>-->
                <h2>{{ photo.photo_name }}</h2>
            </a>
            <div class="add-tag-button" @click="showModal(index)">
                <i class="fas fa-plus"></i> Тег
            </div>
            <div style="position: absolute; z-index: 10; top: 60px; left: 30px;">
                <ul class="list-inline">
                    <li v-for="tag in photo.tags" class="list-inline-item">
                        <a v-bind:href="'/tag/' + tag.name ">#{{ tag.name }}</a>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i> {{ photo.date_exif}}
                    </li>
                </ul>
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
        });

        //console.log(this.photos.data)
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
        },

        showModal(photo_id) {
             this.$root.$refs.modal.photo_id = photo_id
             this.$root.$refs.modal.show = true
        }
    }
}
</script>

<style>
.add-tag-button {
    position: absolute;
    z-index: 10;
    top: 30px;
    left: 30px;
    background-color: rgba(252, 189, 108, 0.6);
    border-radius: 5px;
    padding: 0 10px 0 10px;
    cursor: pointer;
    -webkit-transition: .3s ease-in-out;
    -moz-transition: .3s ease-in-out;
    -o-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.add-tag-button:hover {
    background-color: rgba(245, 182, 102, 1);
    color: #7e1a1a;
}
</style>
