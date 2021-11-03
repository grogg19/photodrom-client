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
            const url = '/search-tags';

            clearTimeout(this.debounce);
            this.debounce = setTimeout(() => {
                axios.get(url).then(response => {
                    this.autocompleteItems = response.data.results.map(a => {
                        return { text: a.name };
                    });
                }).catch(() => console.warn('Упс! Что-то пошло не так.'));
            }, 600);
        },
    },
};
</script>
