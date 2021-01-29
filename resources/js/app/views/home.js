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