<template>
    <div class="photos-box iso-call">

        <!--  class types: latest random popular oldest -->
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
    name: "Photos",

    data() {
        return {

        }
    },
    mounted() {
        alert(132);
    },
}
</script>

<style scoped>

</style>
