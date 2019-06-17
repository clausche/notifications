<template>
  <li class="dropdown">
    <a @click="isDropDownOpen = ! isDropDownOpen" class="nav-link dropdown-toggle" :href="linkToNotifications">
    <span class="fas fa-bell"></span>
    <span class="badge" v-if="notifications.length" v-text="notifications.length" :href="linkToNotifications"></span>
    </a>
    <ul :class="dropdownmenuClasses" v-if="notifications.length">
      <li v-for="notification in notifications">
        <a class="dropdown-item" @click="markAsRead(notification)" :href="notification.data.link" v-text="notification.data.text"></a>
      </li>
      <li class="dropdown-divider"></li>
      <li><a @click="markAllAsRead" class="dropdown-item" href="#">Marcar Todo Como Leidos</a></li>
      <li class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="notificaciones/allread">Marcar Todo Como Leidos</a></li>
      <li class="dropdown-divider"></li>
      <li class="dropdown-item">
        <a href="notificaciones" class="dropdown-item">Ir a todas las notificaciones</a>
      </li>
    </ul>
  </li>
</template>

<script>
export default {
  data() {
    return {
      notifications: [],
      isDropDownOpen: false
    }
  },
  created() {
    axios.get('/notificaciones')
    .then(res => {
      this.notifications = res.data;
    })
  },
  methods: {
    markAsRead(notification){
      axios.patch('/notificaciones/' + notification.id)
      .then(res => {
        this.notifications = res.data;
      })
    },
    markAllAsRead(){
      this.notifications.forEach(notification => {
        this.markAsRead(notification);
      });
    }
  },
  computed: {
    linkToNotifications() {
      return this.notifications.length ? "#" : "/notificaciones";
    },
    dropdownmenuClasses() {
      return ['dropdown-menu', this.isDropDownOpen ? 'show' : ''];
    }
  }
};
</script>
