import { createStore } from 'vuex'

export default createStore({
  state: {
    userdata:{},
    token:''
  },
  getters: {
    getToken: state => state.token,
    getUserData: state => state.userdata
  },
  mutations: {
  },
  actions: {
    setToken: ({state},value)=>state.token=value,
    setUserData: ({state},value)=>state.userdata=value
  },
  modules: {
  }
})
