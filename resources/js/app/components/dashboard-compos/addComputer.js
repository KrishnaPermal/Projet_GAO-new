import Axios from "axios";

export default {

  data() {
    return {
      dialog: false,
      name: '',
    } 
  },

  methods: {
    addComputer() {
      Axios.post('api', {name: this.name}).then(({response}) => {
        this.$emit('sendComputer', response.data.data)
        //this.dialog = false;
      })
    }
  }
}