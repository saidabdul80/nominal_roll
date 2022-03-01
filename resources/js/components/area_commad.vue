<template>
    <div class="m-0 row">
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">AP/F NUMBER</label>
                <div class="col-md-8">
                    <input id="ap_f_no" v-model="ap_f_no" type="text" class="form-control @error('ap_f_no')  @enderror" name="ap_f_no" required autocomplete="ap_f_no" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">Area command</label>
                <div class="col-md-8">
                    <select id="area_command" v-model="command" class="form-control" @change="checkdiv">
                        <option value="">---</option>
                        <option v-for="com in area_commands" :value="com.command.id" :key="com.command.id">{{com.command.name}}</option>
                    </select>                
            </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">Division</label>
                <div class="col-md-8">
                    <select id="division" v-model="division"  class="form-control">
                         <option value="">---</option>
                        <option v-for="div in divisions" :value="div.id" :key="div.id">{{div.name}}</option>
                    </select>                
            </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">Formed Unit</label>
                <div class="col-md-8">
                    <select id="form_unit" v-model="form_unit" class="form-control">
                        <option value="">---</option>
                         <option v-for="uni in formed_units" :value="uni.id" :key="uni.id">{{uni.name}}</option>
                    </select>                
            </div>
        </div>
        <div class="col-md-12 mx-auto">
            <button class="btn btn-primary" @click="update">Submit</button>
        </div>


    </div>
</template>
<style scoped>
</style>
<script>
import Swal from "sweetalert2";
export default {    
  component: {    
  },
  data() {
    return {
        area_commands:[],
        ap_f_no:"",
        divisions:[],
        command:"",
        division:"",
        form_unit:"",
        formed_units:[]
      
    };
  },
  methods: {    
      checkdiv:function(evt){      
                let value = this.command;
                console.log(value)
                let rs = this.area_commands.filter((item) => {
                    console.log(item.command.id)
                    return item.command.id == value;
                })
                this.divisions = rs[0].divisions;            
            },
            groupBy: function(array, key){
                  // Return the end result
                return array.reduce((result, currentValue) => {
                    // If an array already present for key, push it to the array. Else create an array and push the object
                    (result[currentValue[key]] = result[currentValue[key]] || []).push(
                    currentValue
                    );
                    // Return the current iteration `result` value, this will be taken as next iteration `result` value and accumulate
                    return result;
                }, {}); // empty object is the initial value for result object
            },
            update:function(){
                axios.post('/update_area_command', {ap_f_no:this.ap_f_no,command:this.command, form_unit:this.form_unit, division:this.division})
                .then((response) => 
                {
                    console.log(response);
                })
            }
    
  },
  created() {
    var $this = this;
      axios.get('/area_commands').then((response) => 
    {
        let track = $this.groupBy(response.data, 'by_class');
        let stack = [];
        Object.values(track).map((item, i)=>{
            stack[i] = {};
            stack[i].command = item[0];
            stack[i].divisions = item.filter((item,index)=> {return index != 0});
        })
        /* for(let i in track){
            stack.pushtrack[i];
            } */        
            $this.area_commands = stack;

      
    }).catch((error) => console.log(error));
      axios.get('/formed_units').then((response) => 
    {
        this.formed_units = response.data
    }).catch((error) => console.log(error));;
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

