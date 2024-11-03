<template>
  <div class="container register-form">
    <h2>Register</h2>
    <form @submit.prevent="registerUser">
      <div class="mb-3">
        <label for="exampleInputname1" class="form-label">Name</label>
        <input class="form-control" id="exampleInputname1" v-model="form.name" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" v-model="form.email" id="exampleInputEmail1" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" v-model="form.password" id="exampleInputPassword1" required />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
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
  mounted() {
  },
  methods: {
   
    async registerUser() {
      this.errorMessage = ''; // Reset error message
      try {
        const response = await axios.post('/register', this.form);
        console.log(response.data);
        this.resetForm();
      } catch (error) {
        console.error(error);
        this.errorMessage = 'Registration failed. Please try again.';
      }
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
