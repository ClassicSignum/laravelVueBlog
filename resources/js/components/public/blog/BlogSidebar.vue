<template>
    <span id="sidebar">
    
        <div class="span4">
            <aside class="right-sidebar">
                <div class="widget">
                    <form class="form-search">
                        <input @keyup="searchPost" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                        <button type="submit" @click.prevent="searchPost" class="btn btn-square btn-theme">Search</button>
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Categories</h5>
                    <ul class="cat">
                        <li :key="category.id" v-for="category in allCategories">
                            <i class="icon-angle-right"></i>
                            <router-link :to="`/category/${category.id}`">{{category.cat_name}}
                            </router-link>
                            <span :key="post.id" v-for="post in allPostCount" >
                              <strong v-if="post.cat_id==category.id"> ({{post.post_count}}) </strong>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="recent">
                        <li :key="post.id" v-for="(post,index) in allBlogPost" v-if="index<4">
                            <img :src="`images/${post.photo}`" style="height:80px" class="pull-left" alt="" />
                            <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
                            <p>
                                {{post.description|shortlength(50,".......")}}
                            </p>
                        </li>
                        
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Popular tags</h5>
                    <ul class="tags">
                        <li :key="post.id" v-for="post in allPostCount">
                            <router-link :key="category.id" v-if="post.cat_id==category.id" v-for="category in allCategories" :to="`/category/${category.id}`">
                            {{category.cat_name}}
                            </router-link>
                        </li>
                        
                    </ul>
                </div>
            </aside>
        </div>
    
    </span>
</template>

<script>
export default {
    name:"BlogSidebar",
    data(){
        return {
            keyword:""
        }
    },
    computed:{
        allCategories(){
            return this.$store.getters.getAllCategories;
        },
        allPostCount(){
            return this.$store.getters.getPostCount;
        },
         allBlogPost(){
             return this.$store.getters.getBlog;
      },
    },
    mounted(){
      this.$store.dispatch('actgetAllBlog');
        this.$store.dispatch("actAllCategories");
    },
    methods:{
        searchPost(){
            this.$store.dispatch("actSearchPost",this.keyword)
        }
    },
}
</script>

<style lang="scss" scoped>

</style>