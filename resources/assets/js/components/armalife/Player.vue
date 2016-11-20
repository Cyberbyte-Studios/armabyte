<template>
    <li class="dropdown notifications-menu">
        {{ player }}
    </li>
</template>

<script>
    export default {
        data() {
            return {
                player: []
            };
        },

        mounted() {
            this.getPlayer();
        },

        methods: {
            getPlayer() {
                this.$http.get('/api/armalife/player/' + Page.player)
                    .then(response => {
                        this.player = response.data;
                    });
            }

        }
    }
</script>
