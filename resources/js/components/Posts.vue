<template>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex>
        <v-card>
          <v-card-text>
            <v-data-table :headers="headers" :items="posts" class="elevation-1">
              <template v-slot:items="props">
                <td>{{ props.item.id }}</td>
                <td class="text-xs-right">{{ props.item.description }}</td>
                <td class="text-xs-right">{{ props.item.id }}</td>
                <td class="text-xs-right">{{ props.item.body }}</td>
                <td class="text-xs-right">{{ props.item.created_at }}</td>
                <td class="text-xs-right">{{ props.item.updated_at }}</td>
              </template>
            </v-data-table>
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
      headers: [
        {
          text: "Dessert (100g serving)",
          align: "left",
          sortable: false,
          value: "id"
        },
        { text: "Calories", value: "description" },
        { text: "Fat (g)", value: "id" },
        { text: "Carbs (g)", value: "body" },
        { text: "Protein (g)", value: "created_at" },
        { text: "Iron (%)", value: "updated_at" }
      ],
      posts: []
    };
  },
  mounted: function() {
    axios
      .get("/mycrud")
      .then(res => {
        this.posts = res.data;
      })
      .catch(err => {
        console.error(err);
      });
  }
};
</script>