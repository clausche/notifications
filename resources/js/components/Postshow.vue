<template>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex>
        <v-card>
            <div class="container">
    <h1>Posts</h1>
    <p>{{post.description}}</p>
    
    <small>{{post.body}}</small>
    

</div>
          <v-card-text>
            
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      post: {}
    };
  },
  created: function(){

        var currentUrl = window.location.pathname;

        //console.log(currentUrl);


      },

  mounted() {
      var currentUrl = window.location.pathname;
    axios
      .get(currentUrl)
      .then(res => {
        this.post = res.data
      })
      .catch(err => {
        console.error(err);
      });
  }
};
</script>