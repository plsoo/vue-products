<script setup>
  import { defineProps } from 'vue';
  import { RouterLink } from 'vue-router';

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
    </div>
    <div class="bottom-part">
      <RouterLink
        class="name"
        :to="{ name: 'product', params: { slug: item.product_chr_link } }"
        >
        {{ item.product_chr_name }}
      </RouterLink>
      <div class="balance">Остаток: {{ item.product_int_delivery11 }}</div>
      <div class="price">{{ item.product_dec_price1 }} руб.</div>
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
    }

    .bottom-part {
      display: flex;
      flex-direction: column;
      flex-grow: 1;

      .name {
        display: -webkit-box;
        margin: 12px 0;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 16px;
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

      .price {
        display: flex;
        align-items: flex-end;
        flex-grow: 1;
        margin-top: 18px;
        font-size: 24px;
      }
    }
  }
</style>
