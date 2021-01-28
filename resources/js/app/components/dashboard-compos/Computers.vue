<template>
  <v-container fluid>
    <v-card class="mx-auto" max-width="500" outlined color="cyan lighten-4">
      <v-list-item three-line>
        <v-list-item-content>
          <v-list-item-title class="headline mb-1 text-center">
            {{ computer.name }}
          </v-list-item-title>
          <v-row dense class="justify-center">
            <v-col md="4" class="text-center">Heure</v-col>
            <v-col md="4" class="text-center">Nom</v-col>
            <v-col md="4" class="text-center">Actions</v-col>
          </v-row>
          <div v-for="(timetable, i) in timetables" :key="i">
            <v-row>
              <v-col md="2" class="text-center"> {{ timetable.index }}</v-col>
              <v-col md="8" class="text-center">
                {{ timetable.attribution.name }}</v-col
              >
              <v-col md="2" class="text-center" v-if="!timetable.attribution">
                <addAttribution
                  :dated="dated"
                  :timetable="timetable.index"
                  :computer="computer"
                  @addAttribution="updateAttribution($event)"
                />
              </v-col>
            </v-row>
          </div>
        </v-list-item-content>
      </v-list-item>
    </v-card>
  </v-container>
</template>

<script src='./computer.js' />