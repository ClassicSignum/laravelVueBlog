<template>
    <div>
       <section class="content">

           <div class="row">

               <div class="col-12">

                   <div class="card">

                       <div class="card-header">
                           <h3 class="card-title">Post List</h3>
                           <div class="card-tools">
                               <button class="btn btn-success">
                                   <router-link style="color:#fff" to="/add-post">Add Post</router-link>
                               </button>
                           </div>
                       </div>
                       <div class="card-body">

                           <table class="table table-bordered table-hover">

                               <thead>
                                   <tr>
                                       <th>Serial no</th>
                                       <th>User</th>
                                       <th>Category name</th>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Date</th>
                                       <th>Photo</th>
                                       <th>Actions</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr :key="post.id" v-for="(post,index) in getAllPost">
                                       <td>{{index+1}}</td>
                                       <td v-if="post.user">{{post.user.name}}</td>
                                       <td v-if="post.category">{{post.category.cat_name}}</td>
                                       <td>{{post.title|shortlength(17,"...")}}</td>
                                       <td>{{post.description|shortlength(20,"...")}}</td>
                                       <td>{{post.created_at|timeformat}}</td>
                                       <td>
                                           <img :src="'images/'+post.photo" height="100px" alt="">
                                       </td>
                                       <td>
                                           <router-link class="btn btn-secondary" :to="`/edit-post/${post.id}`" >Edit</router-link>
                                          <br>
                                          <br>
                                           <a class="btn btn-danger" href="" v-on:click.prevent="deleteCategory(post.id)">Delete</a>
                                       </td>
                                     
                                   </tr>
                               </tbody>

                           </table>

                       </div>

                   </div>

               </div>

           </div>
           
       </section>
    </div>
</template>

<script>
export default {
     name:"List",
    mounted(){
        return this.$store.dispatch("actgetAllPost");

    },
    computed:{
        getAllPost(){

            return this.$store.getters.getPost
        }
    },
    methods:{

         deleteCategory(id){
            //
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'This post has been deleted.',
      'success'
    )
     axios.get("/post/"+id)
                 .then((res)=>{
                 this.$store.dispatch("actgetAllPost")

                    //  toast.fire({
                    //     icon: 'success',
                    //     title: 'Category Added Successfully'
                    // })
        })
                 .catch()
                 //
  }
})
            //
           
        },
    }
}
</script>

<style lang="stylus" scoped>

</style>