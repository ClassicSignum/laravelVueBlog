import Axios from "axios"

export default {
    state:{

        category:[],

    },
    getters:{

        getCategory(state){
            return state.category
        },

    },
    actions:{

        actgetAllCategory(context){
            Axios.get('/category')
                 .then((res)=>context.commit('setCatagories',res.data.categories))
                 .catch()
        }

    },
    mutations:{
        setCatagories(state,payload){
            return state.category=payload;
        }
    }
}