<template>
  <div
    class="w-full mb-10 p-4 flex flex-col items-center shadow-lg rounded-md border-2 border-Accent lg:flex-row"
    @click="()=>{this.clicked =!clicked}"
  >
    <div>
      <img class="rounded-full" :src="img" alt="headshot" />
    </div>
    <div class="lg:pl-2 text-Primary text-center lg:text-left">
      <h3 class>{{name}}</h3>
      <div class="lg:p-1 text-Accent">
        <p>{{role}}</p>
        <p>{{department}}</p>
      </div>
      <div v-show="clicked" class="mt-2 text-Tertiary fade-in">
        <p class="font-thin">{{location}}</p>
        <p class="font-thin">Team member for {{tenure}} years</p>
        <p class="font-thin" v-if="email !== null">{{email}}</p>
        <p class="font-thin">{{phone}}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "name",
    "img",
    "email",
    "department",
    "role",
    "start",
    "location",
    "phone"
  ],

  data() {
    return {
      clicked: false
    };
  },

  computed: {
    tenure() {
      let startYear = parseInt(this.start.substring(0, 4));
      let year = this.getCurrentYear();

      return year - startYear;
    }
  },
  methods: {
    getCurrentYear() {
      const mil = Date.now();
      const sec = mil / 1000;
      const min = sec / 60;
      const hour = min / 60;
      const day = hour / 24;
      const year = day / 365;
      const currentYear = Math.round(1970 + year);
      return currentYear;
    }
  }
};
</script>