<script setup>
  import { onMounted, ref } from 'vue';
  import { useRoute, useRouter } from 'vue-router';

  const route = useRoute();
  const router = useRouter();

  const data = ref([]);

  onMounted(async () => {
    try {
      const response = await fetch(
        `http://localhost:8000/api/products.php?action=get&product=${route.params.slug}`
      );
      if (!response.ok) throw new Error('Connection error');

      const result = await response.json();
      data.value = result.product;
      console.log(data.value);
    }
    catch (e) {
      console.error(e);
    }
    finally {
      console.log('Done!');
    }
  });
</script>

<template>
  <h1>{{ data.product_chr_name }}</h1>
</template>
