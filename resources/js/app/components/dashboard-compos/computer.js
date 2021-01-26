import AddAttribution from './AddAttribution.vue';

export default {

    components: {
        AddAttribution,
    },

    props: {
        computer: {
            default: function () {
                return {}
            },
        },
        dated: {
            default: function () {
                return {}
            },
        }
    },

    watch: {
        computer: function () {
            this.initialize();
        }
    },

    data() {
        return {
            attributions: {},
            timetables: []
        }

    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.computer.attributions.forEach(attributions => {
                this.attributions[attributions.timetable] = {
                    id: attributions.id,
                    nom: attributions.customer.name,
                    prenom: attributions.customer.firstname
                }
            })
            this.displayTimetable();
        },

        displayTimetable() {
            this.timetables = [];
            for (let i = 0; i < 10; i++) {
                this.timetables.push({
                    index: i + 8,
                    attribution: (typeof this.attributions[i + 8] !== 'undefined') ? this.attributions[i + 8] : false
                })
            }
        },

        updateAttribution(attribution) {
            this.computer.attributions.push(attribution)
            this.initialize();
        },
    }
}