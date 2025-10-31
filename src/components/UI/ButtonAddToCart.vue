<template>
  <button class="btn-add-to-cart">
    <svg width="24" height="24" viewBox="0 0 24 24">
      <use href="#heroicons-plus"></use>
    </svg>
  </button>
</template>

<style scoped>
  .btn-add-to-cart {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 52px;
    height: 52px;
    padding: 0;
    border-radius: 50%;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 100ms ease;

    svg {
      stroke: #0F172A;
      transition: 100ms ease;
    }

    &:hover {
      background-color: #3900A0;

      svg {
        stroke: #ffffff;
      }
    }
  }
</style>