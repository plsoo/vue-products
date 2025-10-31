<script setup>
  import ProductPreview from '@/components/Product/ProductPreview.vue';

  import { onMounted, ref } from 'vue';

  const data = ref([]);

  onMounted(async () => {
    try {
      const response = await fetch('http://localhost:8000/api/products.php?action=get');
      if (!response.ok) throw new Error('Connection error');

      const result = await response.json();
      data.value = result.products;
      // console.log(data.value);
    }
    catch (e) {
      console.error(e);
    }
    finally {
      console.log('Done!');
    }
  });

  function colorChange(productId, colorId) {
    const target = data.value.find(product => product.product_uid_id === productId);
    const color = JSON.parse(target.product_txt_text3).find(color => color.id === colorId);

    target.thumb_272x166 = `https://mojito-spb.ru${color.photo}`;
    target.product_chr_name = color.name;
    target.product_uid_id = color.id;
    target.product_dec_price1 = parseFloat(color.price, 2).toFixed(2);
    target.product_int_delivery11 = color.balance;
    target.product_chr_article = color.article;
  }

</script>

<template>
  <div class="products-list">
    <ProductPreview
      v-for="item in data"
      :key="item.product_uid_id"
      :item="item"
      @colorChangeEmit="colorChange"
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
