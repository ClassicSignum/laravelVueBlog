import Axios from "axios"

export default {
    state:{

        category:[],
        post:[],
        blogpost:[]

    },
    getters:{

        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        },
        getBlog(state){
            return state.blogpost
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
        actgetAllBlog(context){
            Axios.get('/blogpost')
                 .then((res)=>context.commit('setBlogs',res.data.blogs))
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
        setBlogs(state,payload){
            return state.blogpost=payload;
        },
    }
}