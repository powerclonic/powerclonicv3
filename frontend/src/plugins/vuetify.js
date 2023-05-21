import Vue from "vue";
import Vuetify from "vuetify/lib/framework";

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    dark: true,
    themes: {
      dark: {
        primary: "#F0F0F0",
        secondary: "#303030",
        accent: "#FFFFFF",
      },
    },
  },
});
