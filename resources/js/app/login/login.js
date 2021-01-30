
import { authenticationService } from '../_services/authentication.service';

export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            emailRules: [
                v => !!v || "E-mail requis",
                v => /.+@.+\..+/.test(v) || "Ce champ doit être un email"
            ],
            pwdRules: [v => !!v || "Mot de passe requis"],
            lazy: false,
            valid: true,
            loading: false,
            returnUrl: "",
            fail: '',
        };
    },
    created() {
        if (authenticationService.currentUserValue) {
            return this.$router.push('/');
        }

        this.returnUrl = this.$route.query.returnUrl || "/";
    },
    methods: {
        connection() {

            this.loading = true;
            authenticationService.login(this.user).then(
                user => {
                    if(user == undefined){
                        this.fail = "Mot de passe ou Email incorrect"
                    }
                    else{
                        this.fail = ''
                        this.$router.push(this.returnUrl);
                    }
                },
                error => {
                    this.loading = false;
                }
            );
        }
    }
};