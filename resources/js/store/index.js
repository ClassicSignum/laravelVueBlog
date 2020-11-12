import Axios from "axios"

export default {
    state:{

        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
        allcategories:[],
        postcount:[]

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
        getSingleBlog(state){
            return state.singlepost
        },
        getAllCategories(state){
            return state.allcategories
        },
        getPostCount(state){
            
             return state.postcount
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
        actGetPostById(context,payload){
            Axios.get('/blogpost/'+payload)
                 .then((res)=>context.commit('setSingleBlog',res.data.blog))
                 .catch()
        },
        actAllCategories(context){
            Axios.get('/categories')
                 .then((res)=>{
                     context.commit('setAllCategories',res.data.categories)
                     context.commit('setPostCount',res.data.postcount)
                    })
                 .catch()
            
        },
        actAllCategoryById(context,payload){
            Axios.get('/categories/'+payload)
                 .then((res)=>context.commit('setBlogs',res.data.blogs))
                 .catch()
        },
        actSearchPost(context,payload){
            Axios.get('/search/'+payload)
                 .then((res)=>{
                    console.log(res.data.posts) 
                    context.commit('setSearchPost',res.data.posts)
                 
        })
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
        setSingleBlog(state,payload){
            return state.singlepost=payload;
        },
        setAllCategories(state,payload){
            return state.allcategories=payload;
        },
        setPostCount(state,payload){
            return state.postcount=payload;
        },
        setSearchPost(state,payload){
            return state.blogpost=payload;
        },
        
    }
}