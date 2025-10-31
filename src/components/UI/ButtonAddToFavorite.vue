<template>
  <button class="btn-add-to-favorite">
    <svg width="16" height="16" viewBox="0 0 16 16">
      <use href="#bootstrap-heart"></use>
    </svg>
  </button>
</template>

<style scoped>
  .btn-add-to-favorite {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 42px;
    height: 42px;
    padding: 0;
    background-color: #F0F3F5;
    border-radius: 50%;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 100ms ease;

    svg {
      transition: 100ms ease;
    }

    &:hover {
      background-color: #3900A0;

      svg {
        fill: #ffffff;
      }
    }
  }
</style>