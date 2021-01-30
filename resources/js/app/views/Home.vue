<template>
  <v-container>
    <div>
      <v-container fluid>
        <v-row class="text-center justify-center py-3">
          <v-col cols="12" md="6">
            <h1 class="text-center justify-center py-5">
              GESTIONNAIRE D'ATTRIBUTION D'ORDINATEUR
            </h1>
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

      <br />
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
  </v-container>
</template>


<script>
import Computers from "../components/dashboard-compos/Computers.vue";
import Datepicker from "../components/dashboard-compos/Datepicker.vue";
import AddComputer from "../components/dashboard-compos/AddComputer.vue";
import { apiService } from "../_services/api.services";
import { EventBus } from "../_helpers/event.bus";

export default {
    components: {
        Computers,
        Datepicker,
        AddComputer
    },

    data() {
        return {
            computers: [],
            dialog: false,
            name: "",
            dated: new Date().toISOString().substr(0, 10),
            pagination: {
                page: 1,
                visible: 3,
                pageCount: 0
            },
        }
    },

    
    methods: {
        initialize() {
            this.requestGet(1)
        },
        selectDate(computers) {
            this.requestGet(1)
            this.dated = computers;

            EventBus.$on('deleteComputer', (data) => {
                const index = this.computers.indexOf(data);
                this.computers.splice(index, 1)
            })
        },

        requestGet(page) {
            this.computers = []
            apiService.get('/api/computers/get', { dated: this.dated, page: page }).then(({ data }) => {
                data.data.forEach(_data => {
                    this.computers.push(_data)
                })
                this.pagination.pageCount = data.meta.last_page
            })
        },
    }
}
/* import AddComputer from '../components/dashboard-compos/AddComputer.vue';
import Axios from "axios"

export default {
    components: {
        Computers,
        AddComputer,
    },

    data: () => ({
        computers: [],
        dialog: false,
        name: '',
    
    }),


    created() {
        this.computerDisplay();  
    },
    methods: {
        computerDisplay() {
            Axios.get('/api/computers/get').then(({ data }) => {
                data.data.forEach((_data) => {
                    this.computers.push(_data);
                });
            });
        },


    },

} */

</script>

<style scoped>
.v-card {
  transition: opacity 0.4s ease-in-out;
}

.v-card:not(.on-hover) {
  opacity: 0.6;
}

.show-btns {
  color: rgba(255, 255, 255, 0.281) !important;
}
</style>








