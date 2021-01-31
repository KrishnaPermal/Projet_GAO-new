<template>
  <v-container>
    <div>
      <v-container fluid>
        <v-row class="text-center justify-center py-3">
          <v-col cols="12" md="6">
            <h1 class="font-italic text-center justify-center py-5 cyan--text">
              GESTIONNAIRE D'ATTRIBUTION D'ORDINATEUR
            </h1>
          </v-col>
        </v-row>
      </v-container>

      <v-col md="4">
        <Datepicker @dated="selectDate($event)" />
      </v-col>

      <v-row class="justify-center">
        <AddComputer @sendComputer="computers.push($event)" :dated="dated" />
      </v-row>
      <br />
      <v-container>
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
        <v-pagination
          :length="pagination.pageCount"
          color="cyan lighten-2"
          v-model="pagination.page"
          @input="requestGet"
          circle
        ></v-pagination>
      </v-container>
    </div>
  </v-container>
</template>

<script src='./home.js' />








