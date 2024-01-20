import { createVuetify  } from 'vuetify'
import 'vuetify/styles'
import { aliases, phospor } from './custom';

export default createVuetify({
    components: {

    },
    ssr: true,
    icons: {
        defaultSet: 'phospor',
        aliases,
        sets: {
            phospor:phospor
        }
    },
    theme: {
        themes: {
            light: {
                colors: {
                    surface: "#fafafa",
                    primary: "#0165ad",
                    secondary: "#1f2937",
                    error: "#c20d0d",
                    info: "#3b82f6",
                    success: "#41a748",
                },
            },
        },
    },

    defaults: {

        VBtn:{
            variant: 'flat',
            color: 'primary',
        },
        VCard: {
            rounded: 'lg'
        },
        VTextField: {
            variant: 'outlined',
            density: 'comfortable',
        },
        VTextarea: {
            variant: 'outlined',
            density: 'comfortable',
            color: 'primary'
        },
        VSelect: {
            variant: 'outlined',
            density: 'comfortable',
            color: 'primary'
        },
    }

})
