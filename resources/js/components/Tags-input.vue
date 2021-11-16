<template>
    <div class="tags-list">
        <label class="typo__label">Теги</label>
        <div class="tags-block" @keydown.enter="send">
            <vue-tags-input
                v-model="tag"
                :tags="tags"
                :autocomplete-items="autocompleteItems"
                :add-only-from-autocomplete="true"
                :placeholder="placeholder"
                @tags-changed="update"
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
            tagsSlugs: []
        };
    },
    watch: {
        'tag': 'initItems',
    },
    mounted() {

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
                                slug: a.slug,
                            };
                        });
                    }).catch(() => console.warn('Упс! Что-то пошло не так.'));

            }, 50);
        },
        send() {
            if (this.tags.length === 0) {
                return
            }
            if (this.tag.length === 0) {
                axios({
                    method: 'post',
                    url: '/photos-by-tags',
                    data: {
                        tags: this.tags.map(a => {
                            return a.slug
                        })
                    }
                }).then((response) => {
                    this.$root.$emit('receivePhotosByTags', response.data);
                });
            }

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
