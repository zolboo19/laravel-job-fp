<template>
  <div>
    <input
      type="text"
      v-model="keyword"
      v-on:keyup="searchJob"
      placeholder="Хайх утгаа оруулна уу?"
      class="form-control"
    />
    <!-- {{ jobResults }} -->
    <div class="card-footer" v-if="jobResults.length">
      <ul class="list-group">
        <li class="list-group-item" v-for="result in jobResults">
          <a :href="/jobs/ + result.id + '/' + result.slug + '/'">
            {{ result.title }}
            <br />
            <small class="badge badge-success">{{ result.position }}</small>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: "",
      jobResults: []
    };
  },
  methods: {
    searchJob() {
      this.jobResults = [];
      console.log(this.keyword);
      if (this.keyword) {
        axios
          .get("/jobs/search", { params: { keyword: this.keyword } })
          .then(response => {
            this.jobResults = response.data;
            console.log(jobResults);
          })
          .catch();
      }
    }
  }
};
</script>

<style>
</style>
