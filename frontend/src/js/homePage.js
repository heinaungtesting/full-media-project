import axios from "axios"
import { mapGetters } from "vuex"
export default{
    name: 'HomePage',
    data(){
        return {
            postLists: {},
            categoryLists: {},
            searchKey:"",
            tokenStatus:false,
        }
    },
    computed:{
        ...mapGetters(['getToken','getUserData'])
    },
    methods: {
async getPosts() {
    try {
        const response = await axios.get('http://127.0.0.1:8000/api/allPost');
        response.data.post.forEach(post => {
            post.image = post.image 
                ? 'http://127.0.0.1:8000/postImage/' + post.image 
                : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s';
        });
        this.postLists = response.data.post;
    } catch (error) {
        console.error(error);
    }
}
    ,
    getCategory(){
        axios.get('http://127.0.0.1:8000/api/allCategory').then((response) => {
            this.categoryLists = response.data.category
        })
        
    },
    
    search(){
        let search={
            key:this.searchKey
        }
       axios.post('http://127.0.0.1:8000/api/post/search',search).then((response) => {
        for(let i = 0; i < response.data.searchdata.length; i++){
            if(response.data.searchdata[i].image!=null){
                response.data.searchdata[i].image='http://127.0.0.1:8000/postImage/'+response.data.searchdata[i].image}
            else {
                response.data.searchdata[i].image='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s'
            }
        }
        this.postLists = response.data.searchdata
    }).catch((error) => {
        console.log(error)
    })
},
  categorySearch(searchkey){
let search={
    key:searchkey
  } 
  axios.post('http://127.0.0.1:8000/api/category/search',search).then((response) => {
    for(let i = 0; i < response.data.category.length; i++){
        if(response.data.category[i].image!=null){
            response.data.category[i].image='http://127.0.0.1:8000/postImage/'+response.data.category[i].image}
        else {
            response.data.category[i].image='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s'
        }
    }
    this.postLists = response.data.category
  }).catch((error) => {
      console.log(error)})
},
NewsDetails(id){

    if(this.getToken){
        this.$router.push({name:'details',query:{postid:id}})}
    else{
        alert('ログインしてください')
        this.$router.push({name:'login'})
    }
},loginPage () {
    this.$router.push({name: 'login'})

},
homePage () {
    this.$router.push({name: 'home'})
},
checkToken(){
    if(this.getToken!=null&& this.getToken!="" && this.getToken!=undefined){
       this.tokenStatus=true
}else{
    this.tokenStatus=false
}},logout(){
    this.$store.dispatch('setToken',null)
    this.$store.dispatch('setUserData',null)
    this.tokenStatus=false
    
    this.homePage()
},
},
mounted(){
    console.log(this.getToken)
    this.checkToken()
    this.getPosts()
    this.getCategory()
}}