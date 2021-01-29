<template>
  <v-app style="background-color: #E1F5FE">
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />

    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <DashboardFooter/>
  </v-app>
</template>

<script>
import Footer from "../navigations/Footer";

export default {
  components: {
    DashboardFooter: Footer
  }  
};
</script>