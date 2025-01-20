import axios from "axios"

export default{
    name: "RegisterPage",
    data(){
        return {
            userdata: {
                name: "",
                email: "",
                password: "",
            },
            userstatus:false,
        }
    },methods: {
        loginPage () {
            this.$router.push({name: 'login'})
        
        },
        homePage () {
            this.$router.push({name: 'home'})
        },
        register(){
            axios.post('http://127.0.0.1:8000/api/user/register',this.userdata).then((response) => {
               if(response.data.token === null){
                    this.userstatus=true
                    

               }else{
                this.userstatus=false
                this.$store.dispatch('setToken',response.data.token)
                this.$store.dispatch('setUserData',response.data.user)
                this.homePage()
               }}).catch((error) => {console.log(error)})
        }
    }
}