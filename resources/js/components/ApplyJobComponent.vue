<template>
  <div>
    <h1>{{ jobId }}</h1>
    <form @submit="formSubmit">
      <button
        v-if="show"
        type="submit"
        class="btn btn-success"
        style="width: 100%"
      >Ажилд орох хүсэлт илгээх</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ["jobid"],
  data() {
    return {
      show: true
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    formSubmit(e) {
      e.preventDefault();
      axios
        .post("/applications/" + this.jobid)
        .then()
        .catch();
    }
  }
};
</script>

<style>
</style>
