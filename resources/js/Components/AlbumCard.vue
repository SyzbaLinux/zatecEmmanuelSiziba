<template>
    <v-card
        class="gradient-card "
        color="#1F7087"
        theme="dark"
        variant="flat"
    >
        <div class="d-flex flex-no-wrap justify-space-between">
            <div style="width: 60%">
                <v-card-title class="text-h5">
                    Album
                </v-card-title>

                <div class="ml-3">
                    {{ album.album_name }}
                </div>

                <v-card-actions>
                    <v-btn
                        :href="album.url"
                        target="_blank"
                        class="ml-1 no-uppercase"
                        variant="outlined"
                        size="small"
                        color="white"
                    >
                       View of LastFm
                    </v-btn>
                </v-card-actions>
            </div>

            <v-avatar
                class="ma-3"
                size="125"
                rounded="0"
            >
                <v-img :src="album.image"></v-img>
            </v-avatar>
        </div>
    </v-card>
</template>

<script  >
        export default {
            props:['album']
        }
</script>
<style scoped>
.gradient-card {
    background: linear-gradient(to right, #1F7087, #1F7087); /* Adjust gradient colors as needed */
    color: white; /* Set text color to contrast with the gradient */
}
</style>
