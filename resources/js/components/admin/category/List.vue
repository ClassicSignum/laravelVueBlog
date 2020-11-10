<template>
    <div>
       <section class="content">

           <div class="row">

               <div class="col-12">

                   <div class="card">

                       <div class="card-header">
                           <h3 class="card-title">Category List</h3>
                           <div class="card-tools">
                               <button class="btn btn-success">
                                   <router-link style="color:#fff" to="/add-category">Add Category</router-link>
                               </button>
                           </div>
                       </div>
                       <div class="card-body">

                           <table class="table table-bordered table-hover">

                               <thead>
                                   <tr>
                                       <th>Serial no</th>
                                       <th>Category name</th>
                                       <th>Date</th>
                                       <th>Actions</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr :key="category.id" v-for="(category,index) in getAllCategory">
                                       <td>{{index+1}}</td>
                                       <td>{{category.cat_name}}</td>
                                       <td>{{category.created_at|timeformat}}</td>
                                       <td>
                                           <router-link class="btn btn-secondary" :to="`/edit-category/${category.id}`" >Edit</router-link>
                                           <a class="btn btn-secondary" href="" v-on:click.prevent="deleteCategory(category.id)">Delete</a>
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
        return this.$store.dispatch("actgetAllCategory");

    },
    computed:{
        getAllCategory(){

            return this.$store.getters.getCategory
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
      'This category has been deleted.',
      'success'
    )
     axios.get("/category/"+id)
                 .then((res)=>{
                 this.$store.dispatch("actgetAllCategory")

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

<style scoped>

</style>