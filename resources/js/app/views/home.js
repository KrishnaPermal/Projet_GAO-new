import Computers from '../components/dashboard-compos/Computers.vue';
import AddComputer from '../components/dashboard-compos/AddComputer.vue';
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

}