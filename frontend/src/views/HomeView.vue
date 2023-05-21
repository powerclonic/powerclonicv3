<template>
  <div class="home">
    <header class="section" id="header">
      <h1 class="defaultTitle" id="headerTitle">POWERCLONIC</h1>
      <v-btn x-large outlined href="#contactTitle" id="headerButton"
        >contato</v-btn
      >
    </header>

    <article class="section" id="about">
      <h2 class="defaultTitle" id="aboutTitle">Web Developer</h2>
      <p id="aboutText">
        Olá! Sou o Matheus, um desenvolvedor web fullstack. Trabalho com
        diversas tecnologias, sendo as principais PHP, utilizando o framework
        Laravel, e JavaScript, utilizando o framework VueJS. Também tenho
        conhecimento nas áreas de DevOps, com Docker, e na de bancos de dados
        relacionais com o MySQL.
      </p>
    </article>

    <v-divider />

    <article class="section">
      <div class="sectionHeader">
        <h2 class="defaultTitle">Projetos</h2>
        <p class="defaultSubtitle">alguns dos meus projetos.</p>
      </div>
      <v-carousel class="carousel" cycle hide-delimiters>
        <v-carousel-item v-for="(item, index) in projects" :key="index">
          <InfoCard :project="item" />
        </v-carousel-item>
      </v-carousel>
    </article>

    <v-divider />

    <article class="section">
      <div class="sectionHeader">
        <h2 class="defaultTitle">Blog</h2>
        <p class="defaultSubtitle">ideias, pensamentos, conhecimentos.</p>
      </div>
      <v-carousel class="carousel" cycle hide-delimiters>
        <v-carousel-item v-for="(item, index) in posts" :key="index">
          <InfoCard :project="item" />
        </v-carousel-item>
      </v-carousel>
    </article>

    <v-divider />

    <article class="section">
      <div class="sectionHeader">
        <h2 class="defaultTitle" id="contactTitle">Contato</h2>
        <p class="defaultSubtitle">fale comigo.</p>
      </div>
      <div id="contactContainer">
        <div id="formContainer">
          <v-form @submit.prevent="">
            <v-text-field label="Seu nome" outlined dense />
            <v-text-field label="Seu e-mail" outlined dense />
            <v-textarea label="Assunto" outlined dense />
            <v-btn
              outlined
              id="formButton"
              class="d-block mx-auto"
              type="submit"
              >Enviar</v-btn
            >
          </v-form>
        </div>
        <div id="socialsContainer">
          <p id="socialText">
            ou, se prefeir, entre em contato comigo por alguma de minhas redes
            sociais.
          </p>
          <v-btn text target="_blank" href="https://linkedin.com/in/matheus-dresch" outlined class="socialButton">
            LinkedIn
            <v-icon>mdi-open-in-new</v-icon>
          </v-btn>
          <v-btn text target="_blank" href="https://instagram.com/powermatheuss" outlined class="socialButton">
            Instagram
            <v-icon>mdi-open-in-new</v-icon>
          </v-btn>
        </div>
      </div>
    </article>

    <footer class="section">
      <p id="footerText" class="defaultTitle">
        powerclonic - {{ new Date().getFullYear() }}
      </p>
    </footer>
  </div>
</template>

<script>
import InfoCard from "@/components/InfoCard.vue";

export default {
  name: "HomeView",
  data() {
    return {
      projects: [
        {
          title: "Lorem ipsum",
          info: "Site",
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: "Site",
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: "Site",
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: "Site",
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
      ],
      posts: [
        {
          title: "Lorem ipsum",
          info: new Date().toLocaleDateString("pt-br"),
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: new Date().toLocaleDateString("pt-br"),
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: new Date().toLocaleDateString("pt-br"),
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
        {
          title: "Lorem ipsum",
          info: new Date().toLocaleDateString("pt-br"),
          link: "https://google.com",
          image:
            "https://static.vecteezy.com/system/resources/previews/004/877/163/original/location-pin-pointer-doodle-illustration-isolated-on-white-free-vector.jpg",
        },
      ],
    };
  },
  components: { InfoCard },
};
</script>

<style scoped>
@import url("@/assets/styles/home.css");
</style>
