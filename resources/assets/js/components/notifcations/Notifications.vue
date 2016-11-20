<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span v-if="notifications.length > 0" class="label label-warning">{{ notifications.length }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have {{ notifications.length }} new notifications
                <ul class="menu">
                    <li v-for="notification in notifications">
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> {{ notifications.data }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer">
                <a v-if="notifications.length > 0" href="#" @click="markRead()">Mark as read</a>
                <a v-else href="/notifcations">View all notifications</a>
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notifications: []
            };
        },

        mounted() {
            this.getNotifications();
        },

        methods: {
            getNotifications() {
                this.$http.get('/api/notifications')
                    .then(response => {
                        this.notifications = response.data;
                    });
            },

            markRead() {
                this.$http.get('/api/notifications/read')
                    .then(response => {
                        this.getNotifications();
                    });
            }
        }
    }
</script>
