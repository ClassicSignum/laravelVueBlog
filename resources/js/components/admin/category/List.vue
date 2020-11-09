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
                                       <th>Actions</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>1</td>
                                       <td>1</td>
                                       <td>
                                           <a class="btn btn-secondary" href="">Edit</a>
                                           <a class="btn btn-secondary" href="">Delete</a>
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

    name:"List"
    
}
</script>

<style scoped>

</style>