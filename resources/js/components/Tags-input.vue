<template>
    <div>
        <vue-tags-input
            v-model="tag"
            :tags="tags"
            :autocomplete-items="autocompleteItems"
            :add-only-from-autocomplete="true"
            @tags-changed="update"
        />
    </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
    components: {
        VueTagsInput,
    },
    data() {
        return {
            tag: '',
            tags: [],
            autocompleteItems: [],
            debounce: null,
        };
    },
    watch: {
        'tag': 'initItems',
    },
    methods: {
        update(newTags) {
            this.autocompleteItems = [];
            this.tags = newTags;
        },
        initItems() {
            //if (this.tag.length < 2) return;
            clearTimeout(this.debounce);
            this.debounce = setTimeout(() => {
                axios({
                    method: 'get',
                    url: '/search-tags',
                    params: {
                        part_tag: this.tag
                    }
                }).then(response => {
                    this.autocompleteItems = response.data.map(a => {
                        return { text: a.name };
                    });
                }).catch(() => console.warn('Упс! Что-то пошло не так.'));
            }, 200);
        },
    },
};
</script>
