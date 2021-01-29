import { apiService } from "../../_services/api.services";

export default {
    props: {
        attribution: {
            default: function () {
                return {}
            }
        },

        timetable: {
            default: function () {
                return {}
            }
        }
    },
    data() {
        return {
            dialog: false,
        }
    },
    methods: {
        deleteComputer() {
            //console.log(this.attribution)
            apiService.post('api/attributions/delete/' + this.attribution.id).then(response => {
                this.$emit('deleteAttribution', this.timetable)
            })
        }
    },
}