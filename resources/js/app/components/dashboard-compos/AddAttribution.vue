<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn color="purple lighten-2" icon dark v-bind="attrs" v-on="on">
          <v-icon> mdi-plus-outline</v-icon></v-btn
        >
      </template>
      <v-card>
        <v-card-title>
          <span class="headline grey lighten-2">Ajouter un utilisateur</span>
        </v-card-title>
        <v-card-text>
          <v-container fluid>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-autocomplete
                  v-model="select"
                  :loading="loading"
                  :items="listCustomers"
                  item-text="name"
                  item-value="id"
                  :search-input.sync="search"
                  cache-items
                  return-object
                  class="mx-4"
                  flat
                  :hide-no-data="!no_data"
                  hide-selected
                  hide-details
                  label="Utilisateurs"
                  solo-inverted
                >
                  <template>
                    <v-btn
                      icon
                      color="success"
                      :disabled="listCustomers.length == 0"
                    >
                      <v-icon>mdi-plus-circle</v-icon>
                    </v-btn>
                  </template>
                </v-autocomplete>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Fermer
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="(dialog = false), addCustomer()"
          >
            Ajout
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-snackbar
      :color="colorSnack"
      outlined
      v-model="snackbar"
      :timeout="timeout"
    >
      {{ text }}
      <v-btn :color="colorSnack" text @click="snackbar = false">Close</v-btn>
    </v-snackbar>
  </v-row>
</template>
<script src="./addAttribution.js"/>