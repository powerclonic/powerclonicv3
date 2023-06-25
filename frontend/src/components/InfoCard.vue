<template>
  <a class="card" :href="project.link" :style="`background-image: url(${project.image})`">
    <div class="cardDetails">
      <h3 class="cardTitle">{{ project.title }}</h3>
      <p class="cardInfo">{{ project.info }}</p>
    </div>
  </a>
</template>

<script>
export default {
  name: "ProjectCard",
  props: {
    project: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>
@import url("@/assets/styles/projectcard.css");
</style>
