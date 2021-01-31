<template>
  <div>
    <!--  Navbar -->
    <v-app-bar
      color="cyan lighten-1"
      dark
      fullscreen
      absolute
      class="hidden pr-16 pl-16"
      elevation="0"
    >
      <v-app-bar-nav-icon
        class="hidden-md-and-up"
        @click.stop="drawer = !drawer"
      ></v-app-bar-nav-icon>
      <v-toolbar-title class="hidden-md-and-up">
        <h1 class="headline font-weight-medium d-inline">G.A.O</h1>
      </v-toolbar-title>
      <v-toolbar-title class="hidden-sm-and-down">
        <h2 class="headline font-weight-medium d-inline">G.A.O</h2>
      </v-toolbar-title>
      <v-spacer></v-spacer>

      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn  v-if="isAdmin" text class="nav-item nav-link" to="/">Accueil</v-btn>
        <Menu></Menu>
      </v-toolbar-items>
    </v-app-bar>

    <v-divider></v-divider>

    <!-- Navigation vertical -->
    <v-navigation-drawer
      overlay-opacity="0.9"
      v-model="drawer"
      absolute
      temporary
    >
      <v-img
        :aspect-ratio="16 / 9"
        src="https://www.universite-rose-croix.org/wp-content/uploads/2018/12/video-informatique-et-spiritualit%C3%A9.jpg"
      ></v-img>
      <v-list-item>
        <v-list-item-content color="black">
          <v-list-item-title class="font-italic"
            >G.A.O</v-list-item-title
          >
          <v-list-item-subtitle class="font-italic"
            >GESTIONNAIRE D'ATTRIBUTION D'ORDINATEUR</v-list-item-subtitle
          >
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list rounded>
        <v-list-item link v-if="isAdmin">
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link to="/">Accueil</router-link>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

        <v-list-item link v-if="isChecked">
          <v-list-item-icon>
            <v-icon>mdi-logout</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <a @click="logout" class="nav-item nav-link">Se deconnecter</a>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link v-if="!isChecked">
          <v-list-item-icon>
            <v-icon>mdi-login-variant</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{ name: 'login' }">Login</router-link>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>
      </v-list>
    </v-navigation-drawer>
    <!-- Navigation vertical -->
  </div>
</template>




<script>
import { authenticationService } from "../_services/authentication.service";
import { Role } from "../_helpers/role";
import router from "../routes";
import Menu from "./Menu.vue";
export default {
    components: {
    Menu,
  },

  data() {
    return {
      currentUser: null,
      drawer: null,
      items: [
        { title: "Accueil", icon: "mdi-home" },
        { title: "Login", icon: "mdi-login-variant" },
      ],
    };
  },
  computed: {
    isAdmin() {
      return this.currentUser && this.currentUser.role.name === "Admin";
    },

    isChecked() {
      return this.currentUser;
    },
  },
  created() {
    authenticationService.currentUser.subscribe((x) => (this.currentUser = x));
  },
  methods: {
    logout() {
      authenticationService.logout();
      router.push("/login");
    },
  },
};
</script>