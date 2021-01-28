<template>
  <div>
    <v-row>
      <v-col md="2">
        <Datepicker @dated="selectDate($event)" />
      </v-col>
      <v-col md="2">
        <AddComputer @sendComputer="computers.push($event)" :dated="dated" />
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="12" md="4" v-for="computer in computers" :key="computer.timetable">
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
  </div>
</template>

<script src='./home.js' />