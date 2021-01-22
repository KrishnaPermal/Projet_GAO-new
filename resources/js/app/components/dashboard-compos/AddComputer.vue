<template>
  <v-dialog v-model="dialog" persistent max-width="400">
    <template v-slot:activator="{ on, attrs }">
      <v-btn rounded color="teal" dark v-bind="attrs" v-on="on">
        <v-icon>mdi-desktop-classic</v-icon>
      </v-btn>
    </template>
    <v-card>
      <v-card-title class="headline"> Ajouter un PC </v-card-title>
      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12" sm="12" md="12">
              <v-text-field
                placeholder="Nom du PC"
                v-model="name"
              ></v-text-field
            ></v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" text @click="dialog = false">
          Annuler
        </v-btn>
        <v-btn
          color="green darken-1"
          :disabled="name.length < 2"
          text
          @click="(dialog = false), addComputer()"
        >
          Ajouter
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script src='./addComputer.js' />