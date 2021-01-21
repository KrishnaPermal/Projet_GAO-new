
export default {

    props: {
        computer: {
            default: function () {
                return {}
            },
        },
    },

    watch: {
        computer: function () {
            this.initialize();
        }
    },

    created() {
        this.initialize();
    },

    methods: {
        

    }
}