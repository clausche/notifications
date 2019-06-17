<template>
    <div class="form-group">
        
        <ul v-for="tarea in tareas">
            <li v-text="tarea.title">
               
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tareas: [
                {title: "Ruta de las Tradiciones", completada: true},
                {title: "Ruta de la Lluvia", completada: false},
                {title: "FEria de Turismo", completada: false}
            ]
        };
    },
    methods: {

    }
}
</script>
