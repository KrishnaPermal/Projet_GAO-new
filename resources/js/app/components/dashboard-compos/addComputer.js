import { apiService } from "../../_services/api.services";

export default {

    data() {
        return {
            dialog: false,
            lazy: false,
            valid: true,
            name: "",
            nameRules: [
                v => !!v || "Un nom est requis",
                v => 
                    (v && v.length <= 25) ||
                    "Le nom ne doit pas être supérieure à 25 Caractères"
            ]
        };
    },

    methods: {
        addComputer() {
            apiService.post("api/computers/add", {
                name: this.name,
                dated: this.dated
            }).then(({ data }) => {
                this.$emit("sendComputer", data.data);
                this.dialog = false;
            });
        }
    }
};
