import Computers from '../components/dashboard-compos/Computers.vue';
import Axios from "axios"

export default {
    components: {
        Computers,
    },
    data() {
        return {
            computers: [],
            dialog: false,
        }
    },
    created() {
        this.initialize()
        
    },
    methods: {
        initialize() {

        },
    }
}