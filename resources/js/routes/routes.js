import AdminHome from '../components/admin/AdminHome.vue';

import CategoryList from '../components/admin/category/List.vue';
import AddCategory from '../components/admin/category/New.vue';
import EditCategory from '../components/admin/category/Edit.vue';
//post
import PostList from '../components/admin/post/List.vue';
import AddPost from '../components/admin/post/New.vue';
import EditPost from '../components/admin/post/Edit.vue';
//frontend
import PublicHome from '../components/public/PublicHome.vue';
import BlogPost from '../components/public/blog/BlogPost.vue';
import SingleBlog from '../components/public/blog/SingleBlog.vue';


export const routes = [
    {
        path:"/home",
        component:AdminHome
    },
    {
        path:"/category-list",
        component:CategoryList
    },
    {
        path:"/add-category",
        component:AddCategory
    },
    {
        path:"/edit-category/:id",
        component:EditCategory
    },

    //post routes
    {
        path:"/post-list",
        component:PostList
    },
    {
        path:"/add-post",
        component:AddPost
    },
    {
        path:"/edit-post/:id",
        component:EditPost
    },
    //blog
    {
        path:"/",
        component:PublicHome
    },
    {
        path:"/blog",
        component:BlogPost
    },
    {
        path:"/blog/:id",
        component:SingleBlog
    },
    //blogsidebar
        {
            path:"/category/:id",
            component:BlogPost
        },


]