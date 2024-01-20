<template>
    <v-app>
        <NavgationBar/>
        <v-main>
            <slot/>
        </v-main>
    </v-app>
</template>
<script  >
    import NavgationBar from "@/Components/NavgationBar.vue";
    export default {

        components:{ NavgationBar }
    }
</script>
