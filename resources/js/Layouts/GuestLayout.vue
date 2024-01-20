<template>
    <v-app>
        <NavgationBar/>
        <v-main>
            <v-container fluid>
                <slot/>
            </v-container>
        </v-main>
    </v-app>
</template>
<script  >
    import NavgationBar from "@/Components/NavgationBar.vue";
    export default {
        components:{ NavgationBar },
        watch: {
            $page: {
                handler() {
                    const message = this.$page.props.flash.message;
                    if (message != null) {
                        Swal.fire({
                                icon: message.type,
                                title: message.title,
                                text: message.description
                        })
                    }
                },
            },
        },
    }
</script>
