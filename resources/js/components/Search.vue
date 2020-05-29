<template>
  <div class="flex flex-col items-center fade-in-up">
    <div class>
      <img
        class="w-full h-auto"
        src="https://res.cloudinary.com/jlucompany/image/upload/v1590634241/EmployeeLookup/cropped_banner_wgglbp.jpg"
      />
    </div>
    <div
      :class="{ 'w-full flex flex-col items-center' : !searched,  'w-full flex flex-col items-center large-fade-in' : searched}"
    >
      <div
        class="relative w-full -mt-8 pb-20 z-30 flex flex-col items-center rounded-sm bg-Primary bg-opacity-75 lg:-mt-24 lg:w-3/4"
      >
        <h1 class="p-4 text-center text-Accent">Search for an Employee</h1>
        <div class="w-full flex justify-center text-lg text-Primary lg:h-10 lg:mt-10">
          <form
            class="w-full h-16 pr-2 bg-white border-2 boarder-gray-200 flex justify-center flex-wrap text-base lg:w-4/6 lg:flex-no-wrap xl:w-1/2"
            v-on:submit.prevent="onSubmitSearch"
            action="/results"
          >
            <input
              class="w-4/6 h-full text-center lg:w-5/6"
              type="text"
              v-model.lazy="search"
              v-bind:placeholder="'Search by ' + catagory "
            />
            <select
              class="w-2/6 h-12 my-2 self-center rounded-md bg-Accent opacity-25 text-center appearance-none lg:w-3/12 lg:mr-1"
              name="searchCatagory"
              v-model.lazy="catagory"
            >
              <option value="name" selected>Name</option>
              <option value="state">Location</option>
              <option value="department">Department</option>
            </select>

            <button
              class="w-2/3 flex justify-center bg-Accent text-white round p-2 mt-4 shadow-lg hover:bg-white hover:text-Accent lg:bg-white lg:w-auto lg:m-0 lg:shadow-none lg:text-Accent lg:self-center lg:p-0 lg:pl-1 lg:opacity-75"
              type="submit"
            >
              <svg
                class="fill-current lg:hover:text-Primary"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"
                />
              </svg>
              <span class="lg:hidden lg:pl-1">Search</span>
            </button>
          </form>
        </div>
      </div>
      <div id="searchResults" class="w-full" v-if="searched">
        <SearchResults
          v-for="input in searchInput"
          v-bind:key="input.id "
          v-bind:search="input.search"
          v-bind:type="input.type"
        />
      </div>
    </div>
  </div>
</template>

<script>
import SearchResults from "./SearchResults";

export default {
  components: {
    SearchResults
  },

  data() {
    return {
      searchId: 0,
      search: "",
      catagory: "",
      searched: false,
      searchInput: []
    };
  },

  beforeUpdate() {
    if (document.getElementById("searchResults") !== null) {
      let searchResults = document.getElementById("searchResults");
      let oldSearch = searchResults.childNodes[0];
      return searchResults.removeChild(oldSearch);
    }
  },

  methods: {
    onSubmitSearch() {
      let id = this.searchId;
      let search = {
        id,
        search: this.search,
        type: this.catagory
      };
      this.searchInput.push(search);
      this.searched = true;
      this.searchId += 1;
      this.search = "";
    }
  }
};
</script>
