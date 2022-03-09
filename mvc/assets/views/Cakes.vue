<template>
  <card v-for="cake in cakes" :key="cake.id" :object="cake"/>
</template>

<script>
import Card from "../components/Card";
export default {
  name: 'Cakes',
  components: {Card},
  data() {
    return {
      cakes: []
    }
  },
  mounted() {
    fetch('/cakes')
        .then(response => response.json())
        .then(json => {
          this.cakes = json;
        })
  }
}
</script>