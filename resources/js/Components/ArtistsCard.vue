<template>
    <v-card
        class="gradient-card"
        color="#952175"
        theme="dark"
        variant="flat"
    >
        <div class="d-flex flex-no-wrap justify-space-between">
            <div style="width: 60%">
                <br>
                <v-card-subtitle>
                    Artist Name
                </v-card-subtitle>
                <div class="ml-3">
                    {{ artist.artist_name }}
                </div>


                <v-card-actions>
                    <v-btn
                        :href="artist.url"
                        target="_blank"
                        icon="ph-play"
                        color="white"
                        variant="tonal"
                        class="ml-1"
                    ></v-btn>
                </v-card-actions>
            </div>

            <v-avatar
                class="ma-3"
                size="120"
            >
                <v-img :src="artist.image"></v-img>
            </v-avatar>
        </div>
    </v-card>
</template>

<script>

export default {
    props:['artist']
}
</script>
<style scoped>
.gradient-card {
    background: linear-gradient(to right, #952175, #6F1E51); /* Adjust gradient colors as needed */
    color: white; /* Set text color to contrast with the gradient */
}
</style>
