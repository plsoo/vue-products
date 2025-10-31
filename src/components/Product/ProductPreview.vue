<script setup>
  import { defineProps } from 'vue';
  import { RouterLink } from 'vue-router';

  import ButtonAddToFavorite from '../UI/ButtonAddToFavorite.vue';
  import ButtonAddToCart from '../UI/ButtonAddToCart.vue';

  defineProps(['item']);
</script>

<template>
  <article class="product-preview">
    <div class="top-part">
      <div class="article">{{ item.product_chr_article }}</div>
      <div class="photo">
        <RouterLink :to="{ name: 'product', params: { slug: item.product_chr_link } }">
          <img class="img-cover" :src="item.thumb_272x166">
        </RouterLink>
      </div>
      <ButtonAddToFavorite />

      <div class="colors">
        <img 
          v-for="color in JSON.parse(item.product_txt_text3)" 
          :key="color.id"
          :src="`https://mojito-spb.ru${color.photo}`"
          :class="{color: true, imgCover: true, active: item.product_uid_id === color.id}"
          @click="$emit('colorChangeEmit', item.product_uid_id, color.id)"
          >
      </div>
    </div>
    <div class="bottom-part">
      <RouterLink
        class="name"
        :to="{ name: 'product', params: { slug: item.product_chr_link } }"
        >
        {{ item.product_chr_name }}
      </RouterLink>
      <div class="balance">Остаток: {{ item.product_int_delivery11 }}</div>
      <div class="actions">
        <div class="price">{{ item.product_dec_price1 }} руб.</div>
        <ButtonAddToCart />
      </div>
    </div>
  </article>
</template>

<style scoped>
  .product-preview {
    display: flex;
    flex-direction: column;
    padding: 12px;
    min-height: 380px;
    background-color: #ffffff;

    .top-part {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 180px;
    }

    .colors {
      position: absolute;
      left: 0;
      bottom: 0;
      display: flex;
      align-items: center;
      gap: 10px;

      .color {
        display: none;
        width: 42px;
        height: 42px;
        padding: 5px;
        border-radius: 50%;
        border: 1px solid #D5D9DB;
        background-color: #ffffff;
        cursor: pointer;
        transition: 100ms ease;

        &:hover {
          border-color: #3900A0;
        }

        &:nth-of-type(-n+3) {
          display: block;
        }

        &.active {
          border-color: #3900A0;
        }
      }
    }

    .article {
      position: absolute;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      padding: 0 12px;
      max-width: fit-content;
      height: 30px;
      color: #C4C9CC;
      background-color: #F0F3F5;
      border-radius: 100px;
    }

    .btn-add-to-favorite {
      position: absolute;
      right: 0;
      bottom: 0;
    }

    .bottom-part {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .name {
      margin: 12px 0;
      font-family: var(--font-secondary);
      font-size: 16px;
      font-weight: 500;
      color: #23292C;
      text-decoration: none;
      line-height: 1.2;

      &:hover {
        color: #3900A0;
      }
    }

    .balance {
      color: #5A656B;
    }

    .actions {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-grow: 1;
      margin-top: 18px;
    }

    .price {
      font-family: var(--font-secondary);
      font-size: 24px;
      font-weight: 500;
    }
  }
</style>
