<template>
    <div class="photos-box iso-call">
        <!--  class types: latest random popular oldest -->
        <div class="photo-post latest random">
            <img src="upload/masonry/1.jpg" alt="">
            <div class="hover-box">
                <h2><a href="#">{{ test }}</a></h2>
                <p><a class="likes" href="#">120 <i class="fa fa-heart"></i></a></p>
            </div>
        </div>
        <div class="photo-post latest random">
            <img src="upload/masonry/1.jpg" alt="">
            <div class="hover-box">
                <h2><a href="#">Empty coffee cup</a></h2>
                <p><a class="likes" href="#">120 <i class="fa fa-heart"></i></a></p>
            </div>
        </div>
        <div class="photo-post latest random">
            <img src="upload/masonry/1.jpg" alt="">
            <div class="hover-box">
                <h2><a href="#">Empty coffee cup</a></h2>
                <p><a class="likes" href="#">120 <i class="fa fa-heart"></i></a></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            test: 'test'
        }
    },
    mounted() {

    },
}
</script>
