<template>

<!--    Side navigation to display on mobile devices-->
    <v-navigation-drawer
        v-model="drawer"
        app
        v-if="$vuetify.display.mdAndDown"
    >
    </v-navigation-drawer>

    <v-app-bar
        app
        :flat="flat"
        :color="colored"
    >
        <InertiaLink href="/">
            <img
                width="100"
                src="/images/logo.png"
                alt="Omni Learning Logo"
                class="mx-1 glass pa-1"
            />
        </InertiaLink>
        <v-spacer/>
        <v-text-field
            placeholder="Search Artist or Albums"
            v-model="searchQuery"
            hide-details
            prepend-inner-icon="ph-magnifying-glass"
            @keyup.enter="search"
            class="mx-1"
            clearable
        />
        <v-spacer/>

        <InertiaLink :href="route('login')">
            <v-btn variant="flat" class="mx-1 no-uppercase">
                <v-icon>ph-user</v-icon>&nbsp;My Account
            </v-btn>
        </InertiaLink>

        <InertiaLink :href="route('register')">
            <v-btn variant="flat" class="mx-1 no-uppercase">
                <v-icon>ph-user</v-icon>&nbsp;Register
            </v-btn>
        </InertiaLink>

    </v-app-bar>
</template>

<script  >

export default {
    name:'NavgationBar',
    data () {
        return {
            drawer: null,
            flat:true,
            colored:'white',
            btnColor:'black',
            transitionName:'scale-transition',

            searchType: 'artist',
            searchQuery: '',
        }
    },

    methods: {
        search() {
            // Perform the search based on the selected search type and query
            if (this.searchType === 'artist') {
                // Search for artists
                console.log('Searching for artists:', this.searchQuery);
            } else {
                // Search for albums
                console.log('Searching for albums:', this.searchQuery);
            }
        },
    },
}
</script>

