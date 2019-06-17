<template>
<div class="container">
            <div class="row">
                <div class="col-md-8col-md-offset-2">
                    <div class="row">
                    
                        <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Text</p>
                        </div>
                        </div>
                    
                    </div>
                </div>
            </div>
                <form @submit.prevent="login()">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input v-model="form.email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Contrasena</label>
                        <input v-model="form.password" type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                    <pre>{{form}}</pre>
                </form>

</div>

</template>
<script>
export default {
    data: function(){
        return {
            apiToken: null,
            form: {           
                email: 'clausche@gmail.com ',
                password: 'zz'
            },
            users: []
        } 
    },
    methods: {
        getUsers: function() {
            axios.get('/api/users?api_token=' + this.apiToken )
            .then(res => {
                this.users = res.data;
            })
        },
        login: function() {
            axios.post('/api/login', this.form)
            .then(res=>{
            this.apiToken = res.data.api_token
            this.getUsers()
            })
            .catch(err => {
                console.log(err.response.data)
            });
        }
    }
}
</script>
