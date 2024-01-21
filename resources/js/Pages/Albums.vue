<template>

    <PageHead title="Artists"></PageHead>

  <v-container>
      <div class="glass pa-3">
          <v-toolbar class="rounded-lg" elevation="0" color="white">
              <v-toolbar-title>
                  Albums List Page
              </v-toolbar-title>

              <v-spacer/>

              <v-text-field
                  placeholder="Search Albums by title"
                  v-model="searchQuery"
                  hide-details
                  prepend-inner-icon="ph-magnifying-glass"
                  class="mx-1"
                  clearable
              />

              <v-btn  variant="flat" size="x-large" @click="search">
                  <v-icon icon="ph-magnifying-glass"></v-icon>
              </v-btn>
          </v-toolbar>



          <v-card v-if="$page.props.search" variant="flat" class="mt-5">
              <v-card-title>
                  Available Albums
              </v-card-title>

              <v-card-text>

                  <v-alert
                      type="warning"
                      v-if="$page.props.errorMessage"
                  >
                      {{ $page.props.errorMessage }}
                  </v-alert>


                  <div v-else>

                      <v-data-table
                          :headers="headers"
                          :search="filter"
                          :items="$page.props.albums"
                      >
                          <template v-slot:item.image="{ item }">
                              <a :href="item.url" target="_blank">
                                  <v-img
                                      :src="item.image[3]['#text']"
                                      class="glass ma-2"
                                      height="80"
                                      width="80"
                                  />
                              </a>
                          </template>

                          <template v-slot:item.actions="{ item }">

                              <v-btn @click="likeAlbum(item)" variant="flat" color="primary" class="no-uppercase mx-1"  >
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="M240 94c0 70-103.79 126.66-108.21 129a8 8 0 0 1-7.58 0C119.79 220.66 16 164 16 94a62.07 62.07 0 0 1 62-62c20.65 0 38.73 8.88 50 23.89C139.27 40.88 157.35 32 178 32a62.07 62.07 0 0 1 62 62"/></svg>
                              </v-btn>

                              <v-btn variant="tonal" color="primary" class="no-uppercase mx-1"   :href="item.url" target="_blank">
                                  View
                              </v-btn>
                          </template>
                      </v-data-table>
                  </div>
              </v-card-text>
          </v-card>

          <v-card v-else variant="flat" width="500" class="mx-auto mt-10">
              <v-card-text>
                  <v-img
                      src="/images/register.png"
                      height="200"
                      contain
                  />
                  <v-alert type="warning">
                      Please search for albums by entering the title above.
                  </v-alert>
              </v-card-text>
          </v-card>
      </div>
  </v-container>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
export default {
    name: 'Albums',
    layout: GuestLayout,

    data() {
        return {
            searchQuery: this.$page.props.search,
            filter: '',
            headers: [
                {title: 'Image', key: 'image'},
                {title: 'Artist Name', key: 'name'},
                {title: 'More', key: 'actions', sortable: false},
            ]
        }
    },

    methods: {
        search() {
            this.$inertia.visit(route('albums', {search: this.searchQuery}))
        },

        likeAlbum(album) {

            this.$inertia.post(route('albumLike'),album )
        }
    },
}
</script>
