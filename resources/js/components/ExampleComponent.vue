<template>
  <div class="row">
    <div class="col-md-12">
      {{user}}
    </div>
  </div>
</template>

<script>
export default {
    data:{
        user
    },
  mounted() {
    console.log("Component mounted.");
  },
  methods:{
      async loaddata(){
          this.user = await this.axios.get('/api/user')
      }
  }
};
</script>
