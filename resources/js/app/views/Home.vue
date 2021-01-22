<template>
  <div>
    <v-row>
      <v-col md="2">
        <AddComputer @sendComputer="computers.push($event)" />
      </v-col>
    </v-row>
    <v-row>
      <v-col md="4" v-for="(computer,key) in computers" :key="key">
        <Computers :computer="computer" />
      </v-col>
    </v-row>
  </div>
</template>

<script src='./home.js' />