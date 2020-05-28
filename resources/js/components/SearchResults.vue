<template>
  <div class>
    <p>'You searcehd {{search}} by {{type}}</p>
    <EmployeeContainerVue
      v-for="result in results"
      :key="result.id"
      :name="result.name.first + ' ' + result.name.last"
      :img="result.headshot.large"
      :department="result.id"
      :role="result.job_title"
      :start="result.date_started"
      :location="result.location.state"
      :phone="result.phone"
    />
  </div>
</template>

<script>
import EmployeeContainerVue from "./EmployeeContainer.vue";
export default {
  components: {
    EmployeeContainerVue
  },
  props: ["search", "type"],

  data() {
    return {
      results: [
        {
          id: 1,
          name: {
            title: "Mrs",
            first: "Janice",
            last: "Ramos"
          },
          location: {
            street: "1606 Ranchview Dr",
            city: "Santa Maria",
            state: "Rhode Island",
            postcode: 58031
          },
          coordinates: {
            latitude: "41.703790",
            longitude: "-71.447700"
          },
          phone: "(439)-042-2478",
          headshot: {
            large: "https://randomuser.me/api/portraits/women/94.jpg",
            medium: "https://randomuser.me/api/portraits/med/women/94.jpg",
            thumbnail: "https://randomuser.me/api/portraits/thumb/women/94.jpg"
          },
          department: "Executive",
          job_title: "President",
          date_started: "10/28/1987",
          manager_id: 1,
          is_manager: true
        },
        {
          id: 2,
          name: {
            title: "Mr",
            first: "Soham",
            last: "Harvey"
          },
          location: {
            street: "7856 Spring St",
            city: "Lubbock",
            state: "Oklahoma",
            postcode: 29360,
            coordinates: {
              latitude: "33.577862",
              longitude: "-101.855164"
            },
            timezone: {
              offset: "-5:00",
              description: "Central Daylight Time"
            }
          },
          phone: "(690)-695-4385",
          headshot: {
            large: "https://randomuser.me/api/portraits/men/25.jpg",
            medium: "https://randomuser.me/api/portraits/med/men/25.jpg",
            thumbnail: "https://randomuser.me/api/portraits/thumb/men/25.jpg"
          },
          department: "Executive",
          job_title: "Chief Technology Officer",
          date_started: "7/12/1996",
          skills: [
            {
              id: "FGD"
            },
            {
              id: "Employer Branding"
            }
          ],
          manager_id: 1,
          is_manager: true
        }
      ]
    };
  },

  created() {
    if (this.type === "name.first") {
      this.filteredByName();
    } else if (this.type === "location.state") {
      this.filteredByLocation();
    } else if (this.type === "department") {
      this.filteredByDepartment();
    } else {
      return "Sorry no one by that " + this.Type;
    }
  },

  methods: {
    filteredByName() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return el.name.first.includes(input);
      });

      this.results = arry;
      return console.log(arry);
    },

    filteredByLocation() {
      let input = this.search;
      const arry = this.results.filter(function(el) {
        return el.location.state.includes(input);
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


	