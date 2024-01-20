<template>
    <PageHead>
        <title>{{  $page.props.auth.user.name }} Dashboard</title>
    </PageHead>

        <v-container>
            <div class="glass pa-3 mb-5">
                <v-toolbar class="rounded-lg" elevation="0" color="white">
                    <v-toolbar-title>
                        Favourite Artists
                    </v-toolbar-title>
                </v-toolbar>
            </div>

            <div class="glass pa-3 mt-">
                <v-toolbar class="rounded-lg" elevation="0" color="white">
                    <v-toolbar-title>
                        Favourite Albums
                    </v-toolbar-title>
                </v-toolbar>
            </div>
        </v-container>
</template>
<script  >
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    export default {
        layout:GuestLayout
    }
</script>

