<template>
  <div class="flex flex-col items-center bg-white mt-32">
    <p class="my-4">'You searcehd {{search}} by {{type}}</p>
    <div class="w-5/6 m-auto grid lg:grid-flow-col lg:gap-4 lg:grid-flow-row">
      <EmployeeContainerVue
        v-for="result in results"
        :key="result.id"
        :name="result.firstName + ' ' + result.lastName"
        :img="result.large_headshot"
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
const axios = require('axios');
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

  computed :{
    emptyArray(){
     if(this.results.length === 0){
       return this.noResult = true;
     }
    }
  },
  mounted () {
    axios
      .get('http://employeesearch.test/api/employees')
      .then(response => (this.results = response.data))
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
        return el.firstName.includes(input);
      });

      this.results = arry;
      return console.log(arry);
    },

    filteredByLocation() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return el.state.includes(input);
      });

      this.results = arry;
      return console.log(arry);
    },

    filteredByDepartment() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return el.department.includes(input);
      });

      this.results = arry;
      return console.log(arry);
    }
  }
};
</script>


	