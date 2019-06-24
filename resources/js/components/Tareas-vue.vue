<template>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex md6>
        <v-card class="mb-3" v-for="(item, index) in listaPosts" :key="index" >
          <v-card-text >
            <v-chip class="ml-0" label color="pink" text-color="white">
              <v-icon left>label</v-icon>{{item.titulo}}
            </v-chip>
            <p class="pa-0 mt-3" v-text="item.descripcion"></p>
            <v-btn color="success" class="ml-0">Editar</v-btn>
            <v-btn color="warning">Eliminar</v-btn>
          </v-card-text>
        </v-card>
      </v-flex>
      <v-flex md6>
        <v-card class="mb-3">
          <v-card-text>
            <v-form @submit.prevent="agregarPost" >
            <v-text-field box label="Titulo" v-model="titulo"></v-text-field>
            <v-textarea class="pl-2" label="Texto aqui" v-model="descripcion"></v-textarea>
            <v-btn round block color="success" type="submit">Agregar Post</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data: function() {
    return {
      listaPosts: [
        {
          id: "1",
          titulo: "Post No.1",
          descripcion:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula iaculis ipsum, vitae ullamcorper nisl lobortis quis. Suspendisse potenti. Ut in risus vel pu"
        },
        {
          id: "2",
          titulo: "Post No.2",
          descripcion:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula iaculis ipsum, vitae ullamcorper nisl lobortis quis. Suspendisse potenti. Ut in risus vel pu"
        }
      ],
      titulo: '',
      descripcion: ''
    };
  },
  methods:{
    agregarPost(){
      this.listaPosts.push({

        id: Date.now(),
        titulo: this.titulo,
        descripcion: this.descripcion
        
      })
      this.titulo = ''
      this.descripcion = ''
    }
  }
};
</script>