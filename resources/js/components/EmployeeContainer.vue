<template>
  <div class="flex items-center shadow-lg p-4 m-2" @click="()=>{this.clicked =!clicked}">
    <div>
      <img class="rounded-full" :src="img" alt="headshot" />
    </div>
    <div class="pl-2">
      <h3>{{name}}</h3>
      <p>{{role}}</p>
      <p>{{phone}}</p>
      <div v-show="clicked">
        <p>{{department}}</p>
        <p>{{location}}</p>
        <p>Start Date:{{start}}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["name", "img", "department", "role", "start", "location", "phone"],

  data() {
    return {
      clicked: false
    };
  },
  methods: {
    // toggleDetails() {
    //   this.clicked =
    // }
  }
};
</script>