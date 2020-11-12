<template>
    <span id="singleblog">
          <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{singleBlog.title}}</a></h3>
                    </div>
                    <img v-if="singleBlog.photo" :src="`images/${singleBlog.photo}`" style="height: 500px; width: 600px;" alt="" />
                  </div>
                  <p>
                    {{singleBlog.description}}
                  </p>
                
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li v-if="singleBlog.user"><i class="icon-user"></i><a href="#">{{singleBlog.user.name}}</a></li>
                      <li v-if="singleBlog.category"><i class="icon-folder-open"></i><a href="#">{{singleBlog.category.cat_name}}</a></li>
                     
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            <!-- author info -->
            <div class="about-author">
             
              <h5 v-if="singleBlog.user"><strong><a href="#">{{singleBlog.user.name}}</a></strong></h5>
              <p v-if="singleBlog.user">
                  Person who posted this blog is <strong> {{singleBlog.user.name}} </strong>
                  If you want to contact with this blogger then you can send an email.
                  Which is <strong> {{singleBlog.user.email}} </strong>
                  
              </p>
            </div>
            <!-- <div class="comment-area">
              <h4>4 Comments</h4>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Karen medisson</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Smith sanderson</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                  <div class="media">
                    <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                    <div class="media-body">
                      <div class="media-content">
                        <h6><span>March 12, 2013</span> Thomas guttenberg</h6>
                        <p>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </p>
                        <a href="#" class="align-right">Reply comment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Vicky lumora</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                    <a href="#" class="align-right">Reply comment</a>
                  </div>
                </div>
              </div>
              <h4>Leave your comment</h4>
              <form id="commentform" action="#" method="post" name="comment-form">
                <div class="row">
                  <div class="span4">
                    <input type="text" placeholder="* Enter your full name" />
                  </div>
                  <div class="span4">
                    <input type="text" placeholder="* Enter your email address" />
                  </div>
                  <div class="span4 margintop10">
                    <input type="text" placeholder="Enter your website" />
                  </div>
                  <div class="span8 margintop10">
                    <p>
                      <textarea rows="12" class="input-block-level" placeholder="*Your comment here"></textarea>
                    </p>
                    <p>
                      <button class="btn btn-theme margintop10" type="submit">Submit comment</button>
                    </p>
                  </div>
                </div>
              </form>

            </div> -->
          </div>
                <BlogSidebar/>


        </div>
      </div>
    </section>
    </span>
</template>


<script>
import BlogSidebar from './BlogSidebar.vue';
export default {
    name:"SingleBlog",
    components:{ 
      BlogSidebar
    },
    mounted(){
      this.singlePost();
    },
    computed:{
     singleBlog(){
         return this.$store.getters.getSingleBlog
     }
    },
    
    methods:{

      singlePost(){
        console.log("called=>"+this.$route.params.id)
      this.$store.dispatch('actGetPostById',this.$route.params.id);

      }

    },
    watch:{
      $route(to,from){
      this.singlePost();

      }
    },
    
}
</script>


<style  scoped>

</style>