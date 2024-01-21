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
                <v-row>
                    <v-col
                        v-for="(artist, i) in $page.props.artists"
                        :key="i"
                        cols="12" sm="4"
                    >
                     <ArtistsCard
                        :artist="artist"
                     />
                    </v-col>
                </v-row>
            </div>

            <div class="glass pa-3 mt-">
                <v-toolbar class="rounded-lg" elevation="0" color="white">
                    <v-toolbar-title>
                        Favourite Albums
                    </v-toolbar-title>
                </v-toolbar>

                <v-row>
                    <v-col
                        v-for="(album, i) in $page.props.albums"
                        :key="i"
                        cols="12" sm="4"
                    >
                        <AlbumCard
                            :album="album"
                        />
                    </v-col>
                </v-row>
            </div>
        </v-container>
</template>
<script  >
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import AlbumCard from "@/Components/AlbumCard.vue";
    import ArtistsCard from "@/Components/ArtistsCard.vue";
    export default {
        components: {ArtistsCard, AlbumCard},
        layout:GuestLayout
    }
</script>

