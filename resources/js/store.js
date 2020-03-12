import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    token: localStorage.getItem('access_token') || null,
    entryUrl: null,
    user:{}
  },
  
  mutations: {
    retrieveToken(state, token) {
      state.token = token
    },
    destroyToken(state) {
      state.token = null
    },
    retrieveUser(state,user){
      state.user=user
    }
  },
  actions: {
    currentUser(context) {

      return new Promise((resolve, reject) => {
        axios.get('/api/user', {
          headers: {
            Authorization: 'Bearer ' + this.state.token,
            Accept:'application/json' 
            //the token is a variable which holds the token
          }
        })
          .then(response => {
            //console.log(response)
            const usuario = response.data
            console.log(usuario)
            
            context.commit('retrieveUser', usuario)

            resolve(response)
          })
          .catch(error => {
            console.log(error)
            reject(error)
          })
      })

    },
    
    retrieveToken(context, credentials) {

      return new Promise((resolve, reject) => {
        axios.post('/api/login', {
          username: credentials.username,
          password: credentials.password,
        })
          .then(response => {
            //console.log(response)
            const token = response.data.access_token
            localStorage.setItem('access_token', token)
            context.commit('retrieveToken', token)

            resolve(response)
          })
          .catch(error => {
            //console.log(error)
            reject(error)
          })
      })

    },
    destroyToken(context) {
      
      if (context.getters.loggedIn){
        
        return new Promise((resolve, reject) => {
          axios.post('/api/logout', '', {
              headers: { Authorization: "Bearer " + context.state.token }
            })
            .then(response => {
              console.log(response)
              localStorage.removeItem('access_token')
              context.commit('destroyToken')
  
              resolve(response)
            })
            .catch(error => {
              console.log(error)
              localStorage.removeItem('access_token')
              context.commit('destroyToken')

              reject(error)
            })
        })

      }
    }
  },
  getters: {
    loggedIn(state) {
      return state.token !== null
    },
    usuario(state){
      return state.user
    }
  }
})

export default store