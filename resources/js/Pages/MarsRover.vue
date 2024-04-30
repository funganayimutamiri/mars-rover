<template>
    <div>
      <div v-for="photo in photos" :key="photo.id">
        <img :src="photo.img_src" :alt="photo.camera.full_name">
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        photos: []
      };
    },
    mounted() {
      this.fetchPhotos();
    },
    methods: {
      fetchPhotos() {
        fetch('/api/photos')
          .then(response => response.json())
          .then(data => {
            this.photos = data;
          })
          .catch(error => {
            console.error('Error fetching photos:', error);
          });
      }
    }
  };
  </script>
  