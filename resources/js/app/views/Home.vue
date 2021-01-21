<template>
  <div>
    <v-row>
      <v-col md="4" v-for="computer in computers" :key="computer">
        <Computers :computeur="computer" />
      </v-col>
    </v-row>
  </div>
</template>

<script src='./home.js' />