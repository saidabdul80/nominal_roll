<template>
    <vlist componentType="death" length=10000 ></vlist>
</template>
<style scoped>
</style>
<script>
import Swal from "sweetalert2";
import list from "./listing.vue";
export default {
    name:"dataList",
  component: {
    vlist: list,
  },
  data() {
    return {
      
    };
  },
  methods: {    
    
  },
  created() {
  },
  mounted() {
    /*     Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            }) */
       
    this.$nextTick(function () {
    });
  },
};
</script>

