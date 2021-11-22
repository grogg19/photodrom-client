<template>
    <div class="tags-list">
        <label class="typo__label">Теги</label>
        <div class="tags-block">
            <vue-tags-input
                v-model="tag"
                :tags="tags"
                :autocomplete-items="autocompleteItems"
                :placeholder="placeholder"
                @tags-changed="newTags => tags = newTags"
            />
        </div>
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
            placeholder: 'Добавить тег',
        };
    },
    watch: {
        'tag': 'initItems',
    },
    mounted() {

    },

    computed: {
        filteredItems() {
            return this.autocompleteItems.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            });
        },
    },

    methods: {
        update(newTags) {
            this.autocompleteItems = [];
            this.tags = newTags;
        },
        initItems() {
            if (this.tag === "") return;

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
                            return {
                                text: a.name,
                            };
                        });
                    }).catch(() => console.warn('Упс! Что-то пошло не так.'));

            }, 50);
        },
    },
};

</script>
<style>

.tags-list {
    margin: 20px 0 20px 0;
}

.typo__label {
    color: #95999c;
}
</style>
