<template>
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <form role="form" action="" v-on:submit.prevent="updateCategory">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Edit category</label>
                                    <input v-model="form.cat_name" name="cat_name" placeholder="Add new category"
                                    type="text" class="form-control" id="categoryId" :class="{ 'is-invalid': form.errors.has('cat_name')}">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit"  class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
export default {

    name:"Edit",
    mounted(){
        axios.get(`/editcategory/${this.$route.params.id}`)
             .then((res)=>{
                 this.form.fill(res.data.category)
             })
             .catch()
    },
    data(){
        return {
            form:new Form({
                cat_name:"",
            })
        }
    },
    methods:{

        updateCategory(){
            this.form.post(`/update-category/${this.$route.params.id}`)
                .then((res)=>{
                this.$router.push('/category-list')
                  
                    toast.fire({
                        icon: 'success',
                        title: 'Category Updated Successfully'
                    })
                 })
                .catch((err)=>console.log(err))
        }

    },
    
}
</script>

<style scoped>

</style>