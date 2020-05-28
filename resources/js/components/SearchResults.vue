<template>
  <div class="flex flex-col items-center bg-white mt-32">
    <p class="my-4">'You searcehd {{search}} by {{type}}</p>
    <div class="w-5/6 m-auto grid lg:grid-flow-col lg:gap-4 lg:grid-flow-row">
      <EmployeeContainerVue
        v-for="result in results"
        :key="result.id"
        :name="result.name.first + ' ' + result.name.last"
        :img="result.headshot.large"
        :department="result.department"
        :role="result.job_title"
        :start="result.date_started"
        :location="result.location.state"
        :phone="result.phone"
      />
    </div>
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
        },
        {
          id: 3,
          name: {
            title: "Mrs",
            first: "Irene",
            last: "Lucas"
          },
          location: {
            street: "1601 Daisy Dr",
            city: "Bakersfield",
            state: "Oregon",
            postcode: 59692,
            coordinates: {
              latitude: "35.373291",
              longitude: "-119.018715"
            },
            timezone: {
              offset: "-7:00",
              description: "Pacific Daylight Time"
            }
          },
          phone: "(850)-893-0168",
          headshot: {
            large: "https://randomuser.me/api/portraits/women/3.jpg",
            medium: "https://randomuser.me/api/portraits/med/women/3.jpg",
            thumbnail: "https://randomuser.me/api/portraits/thumb/women/3.jpg"
          },
          department: "Executive",
          job_title: "Chief Financial Officer",
          date_started: "8/25/2014",
          skills: [
            {
              id: "Key Account Relationship Building"
            },
            {
              id: "ABAP-OO"
            }
          ],
          manager_id: 1,
          is_manager: true
        },
        {
          id: 4,
          name: {
            title: "Ms",
            first: "Monica",
            last: "Green"
          },
          location: {
            street: "6954 Fincher Rd",
            city: "Abilene",
            state: "Maine",
            postcode: 69242,
            coordinates: {
              latitude: "32.448734",
              longitude: "-99.733147"
            },
            timezone: {
              offset: "-4:00",
              description: "Eastern Daylight Time"
            }
          },
          phone: "(976)-971-5430",
          headshot: {
            large: "https://randomuser.me/api/portraits/women/36.jpg",
            medium: "https://randomuser.me/api/portraits/med/women/36.jpg",
            thumbnail: "https://randomuser.me/api/portraits/thumb/women/36.jpg"
          },
          department: "Executive",
          job_title: "Chief Operations Officer",
          date_started: "9/16/2009",
          skills: [
            {
              id: "Ksh"
            },
            {
              id: "Knee"
            },
            {
              id: "EWP"
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


	