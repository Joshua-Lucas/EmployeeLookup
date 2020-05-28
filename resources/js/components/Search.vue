<template>
  <div class="flex flex-col items-center m-auto pt-12">
    <!-- <div class="h-64">
      <img
        class="h-64"
        src="https://res.cloudinary.com/jlucompany/image/upload/c_crop,g_south,h_3078,q_100,y_952/v1590601736/EmployeeLookup/dylan-gillis-KdeqA3aTnBY-unsplash_un5qg2.jpg"
      />
    </div>-->
    <div class="flex flex-col items-center">
      <h1 class="text-Accent">Search for an Employee</h1>
      <div class="w-full flex justify-center text-lg">
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
