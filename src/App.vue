<script setup>
  import { RouterView } from 'vue-router';
</script>

<template>
  <header>
    <p><strong>Текущий путь маршрута:</strong> {{ $route.fullPath }}</p>
  </header>
  <main>
    <div class="container-centered">
      <RouterView />
    </div>
  </main>
  <footer></footer>
</template>

<style scoped></style>
