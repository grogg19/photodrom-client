<template>
    <div v-if="show" class="modal-shadow" @click.self="closeModal">
        <div class="modal-window">
            <div class="modal-window-close" @click="closeModal">&#10006;</div>
            <slot name="title">
                <h3 class="modal-window-title">Добавить новые теги</h3>
            </slot>
            <slot name="body">
                <div class="modal-window-content">
                    <tags-add ref="addTags"></tags-add>
                </div>
            </slot>
            <slot name="footer">
                <div class="modal-window-footer">
                    <button class="modal-window-footer__button" @click="send">
                        Ок
                    </button>
                </div>
            </slot>
        </div>
    </div>
</template>

<style scoped lang="scss">
.modal-shadow {
    position: fixed;
    top: 0;
    left: 0;
    min-height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.39);
    z-index: 99999;
}

.modal-window {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    min-width: 420px;
    max-width: 480px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 999999;
    display: block;

    &-close {
        border-radius: 50%;
        color: #fff;
        background: #2a4cc7;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 7px;
        right: 7px;
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    &-title {
        color: #0971c7;
    }

    &-content {
        margin-bottom: 20px
    }

    &-footer {
        &__button {
            background-color: #0971c7;
            color: #fff;
            border: none;
            text-align: center;
            padding: 8px;
            font-size: 17px;
            font-weight: 500;
            border-radius: 8px;
            min-width: 150px;
        }
    }
}
</style>

<script>
export default {
    name: "ModalWindow",
    data: function () {
        return {
            show: false
        }
    },
    methods: {
        closeModal: function () {
            this.show = false
        },

        send() {
            console.log(this.$refs.addTags.tags)
            this.closeModal()
        }
    }
}
</script>
