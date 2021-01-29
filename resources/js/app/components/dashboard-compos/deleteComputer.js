import { EventBus } from "../../_helpers/event.bus";
import { apiService } from "../../_services/api.services";
export default {

    props: {
        computer: {
            default: function () {
                return {}
            }
        },
    },

    data() {
        return {
            dialog: false,
        }
    },

    methods: {
        deleteComputer(item) {
            apiService.post('api/computers/delete/' + this.computer.id).then(data => {
                EventBus.$emit('deleteComputer', item)
            })
        }
    },
}