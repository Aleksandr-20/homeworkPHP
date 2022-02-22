<template>
   <p>{{ answer }}</p>
  
  <form method="post" name="addCake" enctype="multipart/form-data" @submit.prevent="addCake">
    <input type="text" placeholder="Название торта" required>
    <input type="number" placeholder="Цена торта" required>
    <input type="text" placeholder="Описание торта" required>
    <input type="file" accept="image/*">
    <input type="submit" value="Добавить">
  </form>

</template>

<script>
export default {
  name: 'AddCake',
  data() {
    return {
      cake: {
        title: "",
        price: "",
        description: "",
        image: ""
      },
      
      answer: ""
    }
  },
  methods: {
    addCake() {
      let fd = new FormData();
      fd.append('cake_title', this.cake.title);
      fd.append('cake_price', this.cake.price);
      fd.append('cake_description', this.cake.description);
      fd.append('cake_image', this.cake.image);
      fetch('/addCake', {
        method: 'post',
        body: fd
      })
      .then(response => response.json())
      .then(json => {
        if (json.message === 'success') {
          this.answer = 'Торт успешно добавлен';
        } else if (json.message === 'error' && json.reason == 1) {
          this.answer = 'Такой торт уже был добавлен';
        } else {
          this.answer = 'Произошла ошибка, попробуйте позже.';
        }
      });
    }
  }
}
</script>