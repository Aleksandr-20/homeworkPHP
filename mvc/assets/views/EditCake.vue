<template>
  <div v-for="cake in cakes" :key="cake.title">

    <input type="text" disabled v-model="cake.title">
    <input type="number" placeholder="цена торта" v-model="cake.price">
    <input type="text" placeholder="описание торта" v-model="cake.description">
    <input type="file" name="image" accept="image/*" v-model="cake.image">
    <input type="button" value="Изменить" @click="changeCake(cake.title, cake.price, cake.description, cake.image)">
  
  </div>
</template>

<script>
export default {
  data(){
    return {
      cakes: []
    }
  },
  mounted () {
    fetch('/cake')
    .then(response => response.json())
    .then(json => {
      this.cakes = json;
    })
  },
  methods: {
    changeCake(title, price, description, image){
      let fdata = JSON.stringify({
        title: title,
        price: price,
        description: description,
        image: image
      });
      fetch('/cake', {
        method: 'put'
        body: fdata
      })
        .then(response => response.json())
        .then(json => console.log(json));
    }
  }
}
</script>
