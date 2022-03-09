<template>

  <div id="navigation">
    <router-link to="/cakes">Все торты</router-link>
    <router-link to="/addCake">Добавить торт</router-link>
    <router-link to="/editCake">Редактировать торты</router-link>
  </div>

  <section>
    <router-view/>
  </section>
  
</template>