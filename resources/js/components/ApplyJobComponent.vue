<template>
  <div>
    <form @submit="formSubmit">
      <button
        v-if="show"
        type="submit"
        class="btn btn-success"
        style="width: 100%"
      >Ажилд орох хүсэлт илгээх</button>
      <div
        v-else
        class="alert alert-success"
      >Ажилд орох хүсэлтийг хүлээн авлаа, Тун удахгүй хариу мэдэгдэх болно.</div>
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
        .then(response => {
          this.show = false;
        })
        .catch();
    }
  }
};
</script>

<style>
</style>
