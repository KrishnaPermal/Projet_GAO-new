import { apiService } from "../../_services/api.services";

export default {
    props: {
        computer: {
            default: function() {
                return {};
            }
        },
        dated: {
            default: function() {
                return {};
            }
        },
        timetable: {
            default: function() {
                return {};
            }
        }
    },
    data() {
        return {
            snackbar: false,
            timeout: 3000,
            colorSnack: "success",
            text: "",

            dialog: false,

            query: "",
            select: [],
            search: null,
            loading: false,
            listCustomers: [],
            id_customers: "",
            no_data: false
        };
    },

    watch: {
        search: function(val) {
            if (val && val.length >= 3) {
                console.log(this.select);
                this.loading = true;
                
                apiService.get("/api/customers/search", { query: val }).then(
                    data => {
                        data.data.forEach(data => {
                            this.loading = false;
                            let NomPrenom = data.name + " " + data.firstname;
                            data.name = NomPrenom;
                            this.listCustomers.push(data);
                        });
                    }
                );
            }
        }
    },

    methods: {
        addCustomer() {
            apiService.post("api/attributions/add", {
                id_customers: this.select.id,
                id_computers: this.computer.id,
                timetable: this.timetable,
                dated: this.dated
            }).then(({ data }) => {
                this.snackbar = true;
                this.$emit("addAttribution", data.data);
                this.text = "Le client a été ajouter au poste";
                this.dialog = false;
                console.log(customer);
            });
        }
    }
};
