<template>
  <div class="home">
    <article class="section fill" id="about">
      <div>
        <header id="header">
          <h1 class="defaultTitle" id="headerTitle">POWERCLONIC</h1>
          <nav id="headerNav">
            <v-btn x-large outlined href="#projects" class="headerButton"
            >projetos</v-btn
            >
            
            <v-btn x-large outlined href="#blog" class="headerButton"
            >blog</v-btn
            >
            
            <v-btn x-large outlined href="#contact" class="headerButton"
            >contato</v-btn
            >
          </nav>
        </header>
      </div>
      
      <div>
        <h2 class="defaultTitle" id="aboutTitle">Web Developer</h2>
        <p id="aboutText">
          Olá! Sou o Matheus, um desenvolvedor web fullstack. Trabalho com
          diversas tecnologias, sendo as principais PHP, utilizando o framework
          Laravel, e JavaScript, utilizando o framework VueJS. Também tenho
          conhecimento nas áreas de DevOps, com Docker, e na de bancos de dados
          relacionais com o MySQL.
        </p>
      </div>
    </article>

    <v-divider id="projects"/>

    <article class="section fill">
      <div class="sectionHeader">
        <h2 class="defaultTitle">
          Projetos
          <v-progress-circular
            indeterminate
            color="primary"
            v-if="projectsLoading"
          />
        </h2>
        <p class="defaultSubtitle">alguns dos meus projetos.</p>
      </div>
      <v-carousel
        v-if="!isProjectsEmpty"
        class="carousel"
        cycle
        hide-delimiters
      >
        <v-carousel-item v-for="(item, index) in projects" :key="index">
          <InfoCard :project="item" />
        </v-carousel-item>
      </v-carousel>
      <p v-else class="emptyMessage">
        Não há nada aqui... ainda. <v-icon>mdi-clock</v-icon>
      </p>
    </article>

    <v-divider id="blog"/>

    <article class="section fill">
      <div class="sectionHeader">
        <h2 class="defaultTitle">
          Blog
          <v-progress-circular
            indeterminate
            color="primary"
            v-if="postsLoading"
          />
        </h2>
        <p class="defaultSubtitle">ideias, pensamentos, conhecimentos.</p>
      </div>
      <v-carousel v-if="!isPostsEmpty" class="carousel" cycle hide-delimiters>
        <v-carousel-item v-for="(item, index) in posts" :key="index">
          <InfoCard :project="item" />
        </v-carousel-item>
      </v-carousel>
      <p v-else class="emptyMessage">
        Não há nada aqui... ainda. <v-icon>mdi-clock</v-icon>
      </p>
    </article>

    <v-divider id="contact" />

    <article class="section fill">
      <div class="sectionHeader">
        <h2 class="defaultTitle">Contato</h2>
        <p class="defaultSubtitle">fale comigo.</p>
      </div>
      <div id="contactContainer">
        <div id="formContainer">
          <v-form @submit.prevent="" id="form">
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
          <v-btn
            text
            target="_blank"
            href="https://linkedin.com/in/matheus-dresch"
            outlined
            class="socialButton"
          >
            LinkedIn
            <v-icon>mdi-open-in-new</v-icon>
          </v-btn>
          <v-btn
            text
            target="_blank"
            href="https://instagram.com/powermatheuss"
            outlined
            class="socialButton"
          >
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
import axios from "axios";

export default {
  name: "HomeView",
  data() {
    return {
      postsLoading: false,
      projectsLoading: false,
      projects: [],
      posts: [],
    };
  },

  components: { InfoCard },

  methods: {
    loadPosts: async function () {
      this.postsLoading = true;

      try {
        const res = await axios.get(
          process.env.VUE_APP_BASE_API + "/api/posts"
        );

        this.posts = res.data.data;
      } catch (err) {
        console.log(err);
      } finally {
        this.postsLoading = false;
      }
    },
    loadProjects: async function () {
      this.projectsLoading = true;

      try {
        const res = await axios.get(
          process.env.VUE_APP_BASE_API + "/api/projects"
        );

        this.projects = res.data.data;
      } catch (err) {
        console.log(err);
      } finally {
        this.projectsLoading = false;
      }
    },
  },

  computed: {
    isPostsEmpty() {
      return !this.posts.length > 0;
    },
    isProjectsEmpty() {
      return !this.projects.length > 0;
    },
  },

  mounted() {
    this.loadPosts();
    this.loadProjects();
  },
};
</script>

<style scoped>
@import url("@/assets/styles/home.css");
</style>
