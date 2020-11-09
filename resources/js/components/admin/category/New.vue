<template>
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <form role="form" action="" @click.prevent="addCategory()">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Add new category</label>
                                    <input v-model="form.cat_name" name="cat_name" placeholder="Add new category"
                                    type="text" class="form-control" id="categoryId" :class="{ 'is-invalid': form.errors.has('cat_name')}">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit"  class="btn btn-primary">Save</button>
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

    name:"New",
    data(){
        return {
            form:new Form({
                cat_name:"",
            })
        }
    },
    methods:{

        addCategory(){
            this.form.post('/add-category')
                .then((res)=>
                this.$router.push('/category-list'))
                .catch((err)=>console.log(err))
        }

    },
    
}
</script>

<style scoped>

</style>