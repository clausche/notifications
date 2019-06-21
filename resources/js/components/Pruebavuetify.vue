<template>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex md6>
        <v-card class="mb-3" v-for="(item, index) in listaTareas" :key="index">
          <v-card-text>
            <VChip label color="pink" text-color="white">
              <VIcon left>label</VIcon>
              {{item.titulo}}
            </VChip>
            <p class="ml-1">{{item.descripcion}}</p>
            <v-btn color="warning" class="ml-0" @click="editar(index)">Editar</v-btn>
            <v-btn color="info" @click="eliminarTarea(item.id)">Eliminar</v-btn>
          </v-card-text>
        </v-card>
      </v-flex>
      <v-flex md6 v-if="formAgregar">
        <v-card class="mb-3 pa-3 elevation-12">
          <v-form @submit.prevent="agregarTarea">
            <VTextField box label="Titulo de la tarea" v-model="titulo"></VTextField>
            <v-textarea label="Escribe tu texto" v-model="descripcion"></v-textarea>
            <v-btn type="submit" block round color="primary" dark>Agregar Tarea</v-btn>
          </v-form>
        </v-card>
      </v-flex>
      <v-flex md6 v-if="! formAgregar">
        <v-card class="mb-3 pa-3 elevation-12">
          <v-form @submit.prevent="editarTarea">
            <VTextField box v-model="titulo"></VTextField>
            <v-textarea v-model="descripcion"></v-textarea>
            <v-btn type="submit" block round color="warning" dark>Editar Tarea</v-btn>
          </v-form>
        </v-card>
      </v-flex>
    </v-layout>
    <v-snackbar v-model="snackbar">
      {{ mensaje }}
      <v-btn color="pink" flat @click="snackbar = false">Close</v-btn>
    </v-snackbar>
  </v-container>
</template>
<script>
export default {
  data: function() {
    return {
      snackbar: false,
      mensaje: "",
      listaTareas: [
        {
          id: "1",
          titulo: "Lista Tarea #1",
          descripcion:
            'm pulvinar arcu n faucibus orci luctus et ultrices posuere cubilia Curae; Quisque\
            pellentesque lorem rutrum lacus interdum posuere. Donec tempor dolor eget massa laoreet, \
            et congue turpis tempus. Morbi tortor erat, porta nec molestie in, tristique non dui. \
            Nam sed sapien condimentum, maximus massa eu, interdum nisi. Nulla maximus porta faucibus. \
            Fusce posuere lacus nec lobortis aliquet. Vivamus gravida nisl at ligula finibus, eu lobortis metus aliquam.'
        },
        {
          id: "2",
          titulo: "Lista Tarea #2",
          descripcion:
            "Lorem ipsum dolorlv in faucib interdum posuere. Donec tempor dolor eget massa laoreet, et congue turpis tempus. \
            Morbi tortor erat, porta nec molestie in, tristique non dui. Nam sed sapien condimentum, maximus massa eu, interdum \
            nisi. Nulla maximus porta faucibus. Fusce posuere lacus nec lobortis aliquet. Vivamus gravida nisl at ligula finibus,\
             eu lobortis metus aliquam."
        }
      ],
      titulo: "",
      descripcion: "",
      formAgregar: true,
      indexTarea: ''
    };
  },
  methods: {
    agregarTarea: function() {
      var sec = new Date();
          
      // console.log(this.titulo, this.descripcion);
      if (this.titulo === "" || this.descripcion === "") {
        this.snackbar = true;
        this.mensaje = "Rellena los campos vacios";
      } else {
        this.listaTareas.push({
          id: sec.getSeconds(),
          titulo: this.titulo,
          descripcion: this.descripcion
        });
      }
      this.titulo = "";
      this.descripcion = "";
      this.snackbar = true;
      this.mensaje = "Tarea agregada!";
    },
    eliminarTarea: function(id) {
        this.listaTareas = this.listaTareas.filter(i=>i.id != id)
    },
    editar: function(index) {
      this.formAgregar = false
      this.titulo = this.listaTareas[index].titulo
      this.descripcion = this.listaTareas[index].descripcion
      this.indexTarea = index

    },
    editarTarea: function() {
      this.listaTareas[this.indexTarea].titulo = this.titulo
      this.listaTareas[this.indexTarea].descripcion = this.descripcion
      this.formAgregar = true
      this.titulo = ''
      this.descripcion = ''
    }
  }
};
</script>
