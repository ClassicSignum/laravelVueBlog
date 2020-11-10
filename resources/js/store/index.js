import Axios from "axios"

export default {
    state:{

        category:[],
        post:[]

    },
    getters:{

        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        },
       

    },
    actions:{

        actgetAllCategory(context){
            Axios.get('/category')
                 .then((res)=>context.commit('setCatagories',res.data.categories))
                 .catch()
        },
        actgetAllPost(context){
            Axios.get('/post')
                 .then((res)=>context.commit('setPosts',res.data.posts))
                 .catch()
        },

    },
    mutations:{
        setCatagories(state,payload){
            return state.category=payload;
        },
        setPosts(state,payload){
            return state.post=payload;
        },
    }
}