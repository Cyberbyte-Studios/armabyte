<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">{{ audits.length }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">There have been {{ audits.length }} actions
                <ul class="menu">
                    <li v-for="notification in notifications">
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> {{ notifications.data }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="/audits">View All</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                audits: []
            };
        },

        mounted() {
            this.getAudits();
        },

        methods: {
            getAudits() {
                this.$http.get('/api/audits')
                    .then(response => {
                        this.audits = response.data;
                    });
            }
        }
    }
</script>
