<template>
  <div class="flex flex-col items-center">
    <div class>
      <img
        class="w-full h-auto"
        src="https://res.cloudinary.com/jlucompany/image/upload/v1590634241/EmployeeLookup/cropped_banner_wgglbp.jpg"
      />
    </div>
    <div class="w-1/2 flex flex-col items-center bg-Primary bg-opacity-75 -m-24">
      <h1 class="p-4 text-Accent">Search for an Employee</h1>
      <div class="w-2/3 flex justify-center p-4 text-lg">
        <form class="w-full flex justify-center text-lg" v-on:submit.prevent="onSubmitSearch">
          <input
            class="w-1/2 h-12 border-2 border-accent border-2 border-r-0"
            type="text"
            v-model="search"
            v-bind:placeholder="catagory"
          />
          <select
            class="w-1/2 h-12 border-2 border-l-0 bg-Accent opacity-25"
            name="searchCatagory"
            v-model="catagory"
          >
            <option value="name.first">Name</option>
            <option value="location.state">Location</option>
            <option value="department">Department</option>
          </select>

          <button type="w-1/2 submit">Search</button>
        </form>
      </div>
    </div>
    <div class="w-full" v-if="searched">
      <SearchResults
        v-for="input in searchInput"
        v-bind:key="input.id "
        v-bind:search="input.search"
        v-bind:type="input.type"
      />
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
      searchId: 1,
      search: "",
      catagory: "",
      searched: false,
      searchInput: []
    };
  },

  methods: {
    onSubmitSearch() {
      let search = {
        id: this.searchId,
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
