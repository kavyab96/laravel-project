<template>
  <div class="container register-form">
    <h2>Register</h2>
    <!-- <form @submit.prevent="registerUser">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="form.name" required />
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="form.email" required />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="form.password" required />
      </div>
      <button type="submit">Register</button>
    </form> -->
        <form>
            <div class="mb-3">
                <label for="exampleInputname1" class="form-label">name</label>
                <input  class="form-control" id="exampleInputname1" v-model="form.name"  aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" v-model="form.email"  id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" v-model="form.password"  id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" @click="registerUser()">Submit</button>
    </form>
        <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
      },
      errorMessage: ''
    };
  },
  methods: {
    async registerUser() {
      alert(11);
      this.errorMessage = ''; // Reset error message
        // Make an API call to register the user
        const response = await this.$axios.post('/register', {
            params :this.form
        }).then((resp)=>{
            console.log(resp)
        }).catch((err)=>{
            console.log(err);
            
        })
        this.resetForm();
      
    },
    resetForm() {
      this.form.name = '';
      this.form.email = '';
      this.form.password = '';
    },
  },
};
</script>

<style scoped>
.register-form {
  max-width: 400px;
  margin: auto;
}

.error {
  color: red;
}
</style>
