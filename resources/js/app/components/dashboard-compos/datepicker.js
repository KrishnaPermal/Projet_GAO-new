//import { eventBus } from '../../eventBus.js';
export default {
    /*  components: {
        eventBus,
    }, */ 
    data: () => ({
        dated: new Date().toISOString().substr(0, 10),
        menu: false,
        modal: false,
        min: new Date().toISOString().slice(0, 10)

    }),

    created(){
        this.dateChange();
    },

    methods: {
        dateChange() {
            this.$emit('dated', this.dated);
        }
    }
}