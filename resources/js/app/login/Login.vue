<template>
  <v-content>
    <v-container class="fill-height mb-10 mt-10" fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="4">
          <v-card class="elevation-12">
            <v-toolbar color="cyan" dark flat>
              <v-toolbar-title>Indentifiez-vous</v-toolbar-title>
              <v-spacer />
            </v-toolbar>
            <v-card-text>
              <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                <v-text-field
                  label="Email de connexion"
                  v-model="user.email"
                  name="login"
                  :rules="emailRules"
                  prepend-icon="mdi-account"
                  type="text"
                />

                <v-text-field
                  id="password"
                  label="Mot de passe"
                  v-model="user.password"
                  :rules="pwdRules"
                  name="password"
                  prepend-icon="mdi-lock"
                  type="password"
                />
              </v-form>
              <span>{{fail}}</span>
            </v-card-text>
            <v-card-actions>
              <v-btn outlined color="success" :disabled="!valid" @click="connection">Connexion</v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-content>
</template>

<script src='./login.js'>
</script>

