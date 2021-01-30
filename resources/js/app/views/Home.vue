<template>
  <div>
    <v-container fluid>
      <v-row class="text-center justify-center py-6">
        <v-col cols="12" md="6">
          <img src="storage/images/test2.jpeg" width="200px" height="200px" />
        </v-col>

        <v-col cols="12" md="6">
          <h1 class="text-center justify-center py-6">Bienvenue</h1>
          <p>
            Ceci est un gestionnaire d'attribution d'ordinateur pour chaque
            clients
          </p>
        </v-col>
      </v-row>
    </v-container>

    <v-divider></v-divider>

    <v-row>
      <v-col md="2">
        <Datepicker @dated="selectDate($event)" />
      </v-col>

      <v-col md="2">
        <AddComputer @sendComputer="computers.push($event)" :dated="dated" />
      </v-col>
    </v-row>

    <v-pagination
      :length="pagination.pageCount"
      color="cyan lighten-2"
      v-model="pagination.page"
      @input="requestGet"
      circle
    ></v-pagination>

    <br/>
    

    <v-row>
      <v-col
        cols="12"
        md="4"
        v-for="computer in computers"
        :key="computer.timetable"
      >
        <Computers :computer="computer" :dated="dated" />
      </v-col>
    </v-row>

  </div>
</template>

<script src='./home.js' />