<script setup>
  import ProductPreview from '@/components/ProductPreview.vue';

  import { onMounted, ref } from 'vue';

  const data = ref([]);

  onMounted(async () => {
    try {
      const response = await fetch('http://localhost:8000/api/products.php?action=get');
      if (!response.ok) throw new Error('Connection error');

      const result = await response.json();
      data.value = result.products;
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
  <div class="products-list">
    <ProductPreview
      v-for="item in data"
      :key="item.product_uid_id"
      :item="item"
    />
  </div>
</template>

<style scoped>
  .products-list {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 4px;
  }
</style>
