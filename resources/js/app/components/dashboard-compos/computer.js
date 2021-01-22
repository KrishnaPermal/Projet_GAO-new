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

    data() {
        return {
            computers: {},
        }

    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.computer
        }
    }
}