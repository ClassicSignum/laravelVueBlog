<template>
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New post</h3>
                        </div>
                        <form role="form" action="" v-on:submit.prevent="addpost" enctype="multipart/form-data" >

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">Add new post</label>
                                    <input v-model="form.title" name="title" placeholder="Add new post"
                                    type="text" class="form-control" id="postId" :class="{ 'is-invalid': form.errors.has('title')}">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="description">Add new description</label>
                                    <textarea v-model="form.description" name="description" placeholder="Add new description"
                                     class="form-control" id="description" :class="{ 'is-invalid': form.errors.has('description')}">
                                     </textarea>
                                    <has-error :form="form" field="description"></has-error>
                                </div>

                                 <div class="form-group">
                                    <label for="postId">Select Category</label>
                                    <select v-model="form.cat_id" name="cat_id" id="" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id')}">
                                        <option value="" disabled>Select One</option>
                                        <option :value="category.id" :key="category.id" v-for="category in getAllCategory">
                                            {{category.cat_name}}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="photoId">Add new photo</label>
                                    <input @change="changePhoto($event)" name="photo" placeholder="Add photo"
                                    type="file" class="form-control-file" id="photoId" :class="{ 'is-invalid': form.errors.has('file')}">
                                    <img :src="form.photo" height="110px" alt="">
                                    <has-error :form="form" field="photo"></has-error>
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
    mounted(){
         return this.$store.dispatch("actgetAllCategory");
    },
    computed:{
        getAllCategory(){

            return this.$store.getters.getCategory
        },
    },
    data(){
        return {
            form:new Form({
                title:"",
                description:"",
                photo:"",
                cat_id:"",
            })
        }
    },
    methods:{

        changePhoto(event){
            let file=event.target.files[0]
            let reader = new FileReader()
            reader.onload = event => {
                this.form.photo= event.target.result
                // console.log(event.target.result)
            }
            reader.readAsDataURL(file);
        },

        addpost(){
            this.form.post('/add-post')
                .then((res)=>{
                this.$router.push('/post-list')
                  
                    toast.fire({
                        icon: 'success',
                        title: 'post Added Successfully'
                    })
                 })
                .catch((err)=>console.log(err))
        }

    },
    
}
</script>

<style scoped>

</style>