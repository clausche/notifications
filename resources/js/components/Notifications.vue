<template>
  <li class="dropdown">
    <a class="nav-link dropdown-toggle" href="/notificaciones"  data-toggle="dropdown">Notificaiones
    <span class="glyphicon glyphicon-bell"></span>
    <span class="badge" v-text="notifications.lenght"></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="#">Notification 2 </a>
    </ul>
  </li>
</template>

<script>
export default {
  data() {
    return {
      notifications: []
    }
  },

  mounted() {
    axios.get('/notificaciones')
    .then(res => {
      this.notifications = res.data;
    })
  }
};
</script>
