<template>
  <div>
    <button v-if="show" @click.prevent="unsave()" class="btn btn-dark" style="width: 100%;">Устгах</button>
    <button v-else @click.prevent="save()" class="btn btn-primary" style="width: 100%;">Хадгалах</button>
  </div>
</template>

<script>
export default {
  props: ["jobid", "favourited"],
  data() {
    return {
      show: true
    };
  },
  mounted() {
    this.show = this.jobFavourited ? true : false;
  },
  computed: {
    jobFavourited() {
      return this.favourited;
    }
  },
  methods: {
    save() {
      axios
        .post("/jobs/save/" + this.jobid)
        .then((this.show = true))
        .catch(errors => alert("Алдаа гарлаа"));
    },
    unsave() {
      axios
        .post("/jobs/unsave/" + this.jobid)
        .then((this.show = false))
        .catch(errors => alert("Алдаа гарлаа"));
    }
  }
};
</script>

<style>
</style>
