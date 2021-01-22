import Computers from '../components/dashboard-compos/Computers.vue';
import Axios from "axios"

export default {
    components: {
        Computers,
    },

    data: () => ({
        computers: [],
        dialog: false,
    
    }),


    created() {
        this.computerDisplay();  
    },
    methods: {
        computerDisplay() {
            Axios.get("/api/computer").then(({ data }) => {
                data.data.forEach((_data) => {
                    this.computers.push(_data);
                });
            });
        },
    },

}