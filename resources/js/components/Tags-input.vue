<template>
    <div class="tags-list">
        <label class="typo__label">Теги</label>
        <multiselect v-model="value" tag-placeholder="Добавить тег" placeholder="Найти или добавить тег" label="name" track-by="code" :options="options" :multiple="true" :taggable="true" :hideSelected="true" @tag="addTag" :selectLabel="selectLabel"></multiselect>
    </div>
</template>

<script>

import multiselect from 'vue-multiselect'

export default {

    //props: ['tags'],

    components: {
        'multiselect': multiselect
    },
    data () {
        return {
            selectLabel: "Нажмите Enter чтобы выбрать",
            value: [],
            //options: this.tags,
            options: []
        }
    },
    methods: {
        addTag (newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        }
    }
}
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>

.tags-list {
    margin: 10px 0 10px 0;
}

.typo__label {
    color: #95999c;
}
</style>
