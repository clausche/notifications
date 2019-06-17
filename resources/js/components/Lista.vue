<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="form-group">
        <h1 v-if="message.length > 5">
          Hola
          <span v-text="message"></span>
        </h1>
        <h1 v-else>Escribe tu nombre aqui</h1>

        <input
          v-model="message"
          type="text"
          class="form-control"
          aria-describedby="Help"
          :placeholder="placeholder"
        >
        <small id="emailHelp" class="form-text text-muted" v-text="consejo"></small>
        <button @click="reverse">Invertir</button>
      </div>
      <ul>
        <h2>Lista de tareas</h2>
        <h4 v-if="completedTask">Tareas completas  : {{completedTask}}</h4>
        <h4 v-if="incompletedTask">Tareas incompletas  : {{incompletedTask}}</h4>
        <li v-for="task in tasks">
          <span v-text="task.title"></span>
          <span @click="taskCompleted(task)" :class="taskClasses(task)"></span>
          <!-- <span @click="task.completed = ! task.completed"
                v-bind:class="{
                    'fa': true,
                    'fa-check-square': task.completed,
                    'fa-square': ! task.completed
                }"></span> -->
          <!-- <span @click="task.completed = false" v-if="task.completed" class="fas fa-check-square"></span> -->
          <!-- <span @click="task.completed = true" v-else class="fas fa-square"></span> -->
          <!-- <small v-if="task.completed"><strong>Completa</strong></small>
          <small v-else><strong>Incompleta</strong></small> -->
        </li>
        <li class="form-inline">
          <input v-on:keyup.enter="addTask" v-model="newTask" type="text" class="form-control">
          <!-- <button @click="addTask" class="btn btn-primary">+</button> -->
        </li>
      </ul>
    </div>
    <pre>{{$data}}</pre>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newTask: "",
      message: "",
      placeholder: "Escribe aqui",
      consejo: "Nunca compartas tu email con nadie!",
      tasks: [
        { title: "Ruta de las tradiciones", completed: true },
        { title: "Mes del Patrimonio", completed: false },
        { title: "Feria Internacional", completed: false }
      ]
    };
  },
  methods: {
    reverse: function() {
      this.message = this.message
        .split("")
        .reverse()
        .join("");
    },
    addTask: function() {
        if(this.newTask.length < 1) return alert('La tarea no puede estra vacia!');
        this.tasks.push({
            title: this.newTask,
            completed: false
        });
        this.newTask = '';
    },
    taskClasses: function(task){
      return ['fa', task.completed ? 'fa-check-square' : 'fa-square'];
    },
    taskCompleted: function(task){
      task.completed = ! task.completed;
    }
  },
  computed: {
    
    completedTask: function() {
      return this.tasks.filter(function(task){
        return task.completed;
      }).length;
    },
    incompletedTask: function() {
      return this.tasks.filter(function(task){
        return ! task.completed;
      }).length;
    }
  }
};
</script>
<style>
.fa-square, .fa-check-square{
    cursor: pointer;
    color: f00c;
    size: 5x;
}
</style>
