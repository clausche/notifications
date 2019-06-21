<template>
  <div class="container">
    <div v-if="users.length" class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Header</div>
          <div class="card-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="user in users">
                          <td v-text="user.id"></td>
                          <td v-text="user.name"></td>
                          <td v-text="user.email"></td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
        <div class="pagination justify-content-center"></div>
      </div>
    </div>

    
      <form v-else @submit.prevent="login()">
        <div  class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-header">

              <div class="form-group">
                <label for>Email</label>
                <input v-model="form.email" type="email" class="form-control" required>
              </div>

              <div class="card-header">

                <div class="form-group">
                  <label for>Contrasena</label>
                  <input v-model="form.password" type="password" class="form-control" required>
                </div>
                
              </div>

              <div class="card-body">

                <div class="form-group">
                  <v-btn  round block type="submit" color="success">Login</v-btn>
                </div>

              </div>

            </div>
          </div>
        </div>
      </form>
    
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      apiToken: null,
      form: {
        email: "clausche@gmail.com",
        password: "zz"
      },
      users: []
    };
  },
  methods: {
    getUsers: function() {
      axios.get("/api/users?api_token=" + this.apiToken).then(res => {
        this.users = res.data;
      });
    },
    login: function() {
      axios
        .post("/api/login", this.form)
        .then(res => {
          this.apiToken = res.data.api_token;
          this.getUsers();
        })
        .catch(err => {
          console.log(err.response.data);
        });
    }
  }
};
</script>
