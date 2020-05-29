<template>
  <div class="flex flex-col items-center bg-white -mt-8 pt-16">
    <h6 class="my-2 pb-2">You searcehd {{search}} by {{type}}</h6>
    <div
      class="fade-in w-11/12 mx-1 md:w-5/6 m-auto grid md:grid-cols-2 md:gap-4 md:grid-flow-row lg:grid-cols-3"
    >
      <EmployeeContainerVue
        v-for="result in results"
        :key="result.id"
        :name="result.firstname + ' ' + result.lastname"
        :img="result.large_headshot"
        :email="result.email"
        :department="result.department"
        :role="result.job_title"
        :start="result.date_started"
        :location="result.state"
        :phone="result.phone"
      />
      <no-result v-if="emptyArray" />
    </div>
  </div>
</template>

<script>
import EmployeeContainerVue from "./EmployeeContainer.vue";
import NoResult from "./NoResultFound.vue";
const axios = require("axios");

export default {
  components: {
    EmployeeContainerVue,
    NoResult
  },

  props: ["search", "type"],

  data() {
    return {
      results: [],
      noResult: false
    };
  },

  computed: {
    emptyArray() {
      if (this.results.length === 0) {
        return (this.noResult = true);
      }
    }
  },
  mounted() {
    axios
      .get("http://employeesearch.test/api/employees")
      .then(response => (this.results = response.data));
  },

  beforeUpdate() {
    if (this.type === "name") {
      this.filteredByName();
    } else if (this.type === "state") {
      this.filteredByLocation();
    } else if (this.type === "department") {
      this.filteredByDepartment();
    }
  },

  methods: {
    filteredByName() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return (
          el.firstname.includes(input) ||
          el.lastname.includes(input) ||
          el.firstname.toLowerCase().includes(input) ||
          el.lastname.toLowerCase().includes(input)
        );
      });

      this.results = arry;
      return console.log(arry);
    },

    filteredByLocation() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return (
          el.state.includes(input) || el.state.toLowerCase().includes(input)
        );
      });

      this.results = arry;
      return console.log(arry);
    },

    filteredByDepartment() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return (
          el.department.includes(input) ||
          el.department.toLowerCase().includes(input)
        );
      });

      this.results = arry;
      return console.log(arry);
    }
  }
};
</script>


	