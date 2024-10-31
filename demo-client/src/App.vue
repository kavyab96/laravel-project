
<template>
  <div id="app">
    <Header></Header>
    <router-view></router-view> 
  </div>
</template>

<script>
  import Register from "./components/Auth/Register.vue"
export default {
  name: 'App',
  components:{
    Register,
  }
};
</script> 
