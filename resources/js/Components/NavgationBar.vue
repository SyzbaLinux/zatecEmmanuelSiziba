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

        <InertiaLink :href="route('artists')">
            <v-btn variant="text" class="mx-1 no-uppercase">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M17.5 20q-1.05 0-1.775-.725T15 17.5q0-1.05.725-1.775T17.5 15q.2 0 .45.038t.55.162V11q0-.425.288-.712T19.5 10H21q.425 0 .713.288T22 11q0 .425-.288.713T21 12h-1v5.5q0 1.05-.725 1.775T17.5 20M3 19v-1.8q0-.875.438-1.575T4.6 14.55q1.55-.775 3.15-1.162T11 13q1.05 0 2.088.163t2.087.487q-.5.3-.9.725t-.7.925q-.65-.15-1.287-.225T11 15q-1.425 0-2.8.35t-2.7 1q-.225.125-.362.35T5 17.2v.8h8.025q.05.5.238 1t.512 1H4q-.425 0-.712-.288T3 19m8-7q-1.65 0-2.825-1.175T7 8q0-1.65 1.175-2.825T11 4q1.65 0 2.825 1.175T15 8q0 1.65-1.175 2.825T11 12m0-2q.825 0 1.413-.587T13 8q0-.825-.587-1.412T11 6q-.825 0-1.412.588T9 8q0 .825.588 1.413T11 10m0 8"/></svg>
                 Artists
            </v-btn>
        </InertiaLink>

        <InertiaLink :href="route('albums')">
            <v-btn variant="text" class="mx-1 no-uppercase">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="2"/><circle cx="18" cy="9" r="2"/><path d="M15.318 3.631a9 9 0 1 0 5.368 10.736M20 9V2l2 2"/></g></svg>
                &nbsp;Albums
            </v-btn>
        </InertiaLink>

        <InertiaLink :href="route('login')">
            <v-btn variant="flat" class="mx-1 no-uppercase">
                <v-icon>ph-user</v-icon>&nbsp;My Account
            </v-btn>
        </InertiaLink>

        <InertiaLink
            v-if="!$page.props.auth.user"
            :href="route('register')">
            <v-btn variant="flat" class="mx-1 no-uppercase">
                <v-icon>ph-user</v-icon>&nbsp;Register
            </v-btn>
        </InertiaLink>

        <v-btn v-if="$page.props.auth.user" class="no-uppercase" @click="logout">
           <v-icon>ph-sign-out</v-icon> Logout
        </v-btn>
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
        }
    },


    methods:{
    logout(){
        this.$inertia.visit(route('logout'),{method:'post'})
    }
}
}
</script>

