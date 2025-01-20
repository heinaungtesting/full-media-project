import axios from "axios"

import { mapGetters } from "vuex"
export default {
    name: "LoginPage",
    data() {
        return {
        userdata: {
            email: "",
            password: "",
        },
    tokenStatus:false,
    userstatus:false,
        }
    }, computed: {
        ...mapGetters(['getToken','getUserData'])
    },
    methods: {
        loginPage () {
            this.$router.push({name: 'login'})
        
        },
        homePage () {
            this.$router.push({name: 'home'})
        },
        registerPage(){
            this.$router.push({name: 'register'})
        },
        login(){
            axios.post('http://127.0.0.1:8000/api/user/login',this.userdata).then((response) => {
               if(response.data.token === null){
                    this.userstatus=true
                    

               }else{
                this.userstatus=false
                this.$store.dispatch('setToken',response.data.token)
                this.$store.dispatch('setUserData',response.data.user)
                this.homePage()
               }
        }).catch((error) => {
            this.$notify({
                group: 'auth',
                type: 'error',
                title: 'Login Error',
                text: error.response ? error.response.data.message : 'An error occurred during login.'
            })
        })
    },logout(){
        this.$store.dispatch('setToken',null)
        this.$store.dispatch('setUserData',null)
        
        this.homePage()
    },
    
  
},}