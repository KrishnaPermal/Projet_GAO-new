<template>
  <v-container fluid>
    <v-row dense class="justify-center">
      <v-hover v-slot:default="{ hover }">
        <v-card
          :elevation="hover ? 12 : 2"
          :class="{ 'on-hover': hover }"
          class="mx-2 my-4"
          max-width="500"
          outlined
          color="cyan lighten-4"
        >
          
          <v-img
            :aspect-ratio="16 / 9"
            src="https://www.universite-rose-croix.org/wp-content/uploads/2018/12/video-informatique-et-spiritualit%C3%A9.jpg"
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
          >
            <v-card-title>{{ computer.name }}</v-card-title>
            <deleteComputer :computer="computer" />
          </v-img>
          <v-list-item three-line>
            <v-list-item-content>
              <v-list-item-title class="headline mb-1 text-center">
                <deleteComputer :computer="computer" /></v-list-item-title>
              <v-row>
                <v-col md="4">Heure</v-col>
                <v-col md="4" class="text-center">Nom</v-col>
                <v-col md="4" class="text-right">Actions</v-col>
              </v-row>
              <div v-for="(timetable, i) in timetables" :key="i">
                <v-row>
                  <v-col md="2"> {{ timetable.index }}</v-col>
                  <v-col md="8" class="text-center">
                    {{ timetable.attribution.name }}
                  </v-col>
                  <v-col md="2" v-if="!timetable.attribution">
                    <addAttribution
                      :dated="dated"
                      :timetable="timetable.index"
                      :computer="computer"
                      @addAttribution="updateAttribution($event)"
                    />
                  </v-col>
                  <v-col md="1" v-if="timetable.attribution">
                    <deleteAttribution
                      :computer="computer"
                      :attribution="timetable.attribution"
                      :timetable="timetable.index"
                      @deleteAttribution="deleteAttribution($event)"
                    />
                  </v-col>
                </v-row>
              </div>
            </v-list-item-content>
          </v-list-item>
        </v-card>
      </v-hover>
    </v-row>
  </v-container>
</template>

<script src='./computer.js' />