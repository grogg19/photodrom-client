<template>
    <div class="menu-highlight-block">
        <div>Выделение</div>
        <div class="menu-highlight-checkbox">
            <i class="far" :class="{ 'fa-square': ! isChecked, 'fa-check-square': isChecked }" @click="toggleHighlightCheck()"></i>
        </div>
        <div v-if="photosIds.length > 0">
            <div class="menu-highlight-add-tag mt-2" @click="showModal()">
                <i class="fas fa-plus"></i> Теги
            </div>
        </div>
    </div>
</template>

<script>
export default {

    name: "MenuHighlightTools",

    data() {
        return {
            isChecked: false,
            showAddTagsButton: false,
            photosIds: []
        }
    },

    methods: {
        toggleHighlightCheck() {
            this.isChecked = this.isChecked !== true
            this.$root.$refs.listPhotos.checkLayer = this.isChecked
            if (!this.isChecked) {
                this.unsetHighlightCheck()
            }
        },

        showModal() {
            this.$root.$refs.modal.photos = this.photosIds
            this.$root.$refs.modal.show = true
        },

        unsetHighlightCheck() {
            this.$root.$refs.listPhotos.checkedPhotos = []
            this.photosIds = []
        }
    }
}
</script>

<style scoped>
.menu-highlight-block {
    position: relative;
    top: 100px;
    text-align: center;
    font-size: 10px;
    color: #F5B666;
}

.menu-highlight-checkbox {
    font-size: 15px;
    -webkit-transition: .1s ease-in-out;
    -moz-transition: .1s ease-in-out;
    -o-transition: .1s ease-in-out;
    transition: .1s ease-in-out;
}

.menu-highlight-checkbox:hover,
.menu-highlight-add-tag:hover {
    cursor: pointer;
    text-shadow: 1px 1px 2px #000000, 0 0 0.5em #F5B666 ;
}
</style>
