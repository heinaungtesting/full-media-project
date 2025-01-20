import axios from "axios"
import { mapGetters } from "vuex"
export default {
    name: "NewsDetails",
    data () {
        return {
            id: 0,
            posts: {},
            comment: '',
            viewCount:0,
            message: {},
            userStatus:false
            

        }
    }, computed: {
        ...mapGetters(['getToken','getUserData'])
    },
    methods: {
        loadPost (id) {
            let post={
                postid:id
            }
           axios.post('http://127.0.0.1:8000/api/post/detail',post).then((response) => {
            
                if(response.data.post.image!=null){
                    response.data.post.image='http://127.0.0.1:8000/postImage/'+response.data.post.image}
                else {
                    response.data.post.image='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s'
                }
            
            this.posts = response.data.post
            
        }).catch((error) => {
            console.log(error)
        })

        },
        back(){
            history.back()
        },
        homePage(){
            this.$router.push({name:'home'})
        },
        loginPage(){
            this.$router.push({name:'login'})   
        },logout(){
            this.$store.dispatch('setToken',null)
            this.$store.dispatch('setUserData',null)
            this.tokenStatus=false
            
            this.homePage()
        },
setComment(){
    let data={
        user_id: this.getUserData.id,
        post_id: this.$route.query.postid,
        message: this.comment  } 
     
       
   
    
        axios.post('http://127.0.0.1:8000/api/post/comment',data).then((response) => {
            
            this.message = response.data.comment
            
    })
        
         
    
},checkStatus(){
    if(this.getUserData.id==undefined&&this.getUserData.id==null&&this.getUserData==''){
        this.userStatus=false
    }
    else{
        this.userStatus=true
    }
},
loadComment(){
    axios.get('http://127.0.0.1:8000/api/post/allcomment').then((response) => {
        this.message = response.data.comment

        
    })
}
    },
    mounted(){
        let data={
            user_id: this.getUserData.id,
            post_id: this.$route.query.postid
        }
    
        axios.post('http://127.0.0.1:8000/api/post/actionLog',data).then((response) => {
           this.viewCount=response.data.post.length
        })
        this.id = this.$route.query.postid
        this.loadPost(this.id)
        this.loadComment()
        this.checkStatus()
        
    }
}

