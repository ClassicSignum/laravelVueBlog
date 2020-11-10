import Vue from 'vue';

//moment js
import moment from 'moment';
Vue.filter('timeformat',(arg)=>{
  return moment(arg).format("MMM Do YYYY");
})
//short post description
Vue.filter('shortlength',(text,length,suffix)=>{
    return text.substring(0,length)+suffix
})