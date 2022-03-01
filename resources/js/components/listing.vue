<template>
  <div class="m-0">
    <div v-show="isloading"      style="position: fixed;height: 100vh;width: 100%;top: 0;left: 0;background: rgba(0, 0, 0, 0.7);">
      <div class="m-0">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block;" width="193px" height="103px" viewBox="0 0 100 60" preserveAspectRatio="xMidYMid">
          <defs>
            <clipPath id="ldio-yj7mf4kw41h-cp" x="0" y="0" width="100" height="100">
              <path d="M81.3,58.7H18.7c-4.8,0-8.7-3.9-8.7-8.7v0c0-4.8,3.9-8.7,8.7-8.7h62.7c4.8,0,8.7,3.9,8.7,8.7v0C90,54.8,86.1,58.7,81.3,58.7z"
              ></path>
            </clipPath>
          </defs>
          <path fill="none" stroke="rgba(166, 166, 166, 0)" stroke-width="2.7928" d="M82 63H18c-7.2,0-13-5.8-13-13v0c0-7.2,5.8-13,13-13h64c7.2,0,13,5.8,13,13v0C95,57.2,89.2,63,82,63z"
          ></path>
          <g clip-path="url(#ldio-yj7mf4kw41h-cp)">
            <g>
              <rect x="-100" y="0" width="25" height="100"fill="#d4edf1" ></rect>
              <rect x="-75" y="0" width="25" height="100" fill="#95d5e4"></rect>
              <rect x="-50" y="0" width="25" height="100" fill="#58caef"></rect>
              <rect x="-25" y="0" width="25" height="100" fill="#8fd2ff"></rect>
              <rect x="0" y="0" width="25" height="100" fill="#d4edf1"></rect>
              <rect x="25" y="0" width="25" height="100" fill="#95d5e4"></rect>
              <rect x="50" y="0" width="25" height="100" fill="#58caef"></rect>
              <rect x="75" y="0" width="25" height="100" fill="#8fd2ff"></rect>
              <animateTransform
                attributeName="transform"
                type="translate"
                dur="0.5988023952095808s"
                repeatCount="indefinite"
                keyTimes="0;1"
                values="0;100"
              ></animateTransform>
            </g>
          </g>
        </svg>
        <h5 class="text-center text-white mt-0">Loading Please Wait...</h5>
      </div>
    </div>
    <!-- <div style="position:relative;">
        <span id="ribbonx3Btn" @click="toggleRibbon" style="top: -25px;position:absolute;right:25px;" class="d-block badge text-white bg-primary" type="button" >toggle</span>
    </div> -->
    <div class="row m-0">            
        <!-- <div id="ribbonx3" class="col-md-12 mx-0 row bg-white">                                            
        </div> -->
        <div class="col-md-12 mx-0 px-0" ></div>
        <div id="table1212" class="col-md-12 row w-100 p-0 mx-auto mb-3"  style="overflow:hidden; shadow-sm; overflow:scroll;overflow-y:hidden;margin-top: 15px;"    >
        <table
            id="dataTablex" class="display table p-0 table-bordered table-hover bg-white" style="margin-top:46px !important; width: 100%; box-shadow: 1px 2px 4px #ccc"
        >
            <thead class="table-invert">
            <tr>
                <th>S/N</th>
                <th>AP/F NUMBER</th>
                <th>Rank</th>
                <th>Surname</th>
                <th>Othernames</th>
                <th v-if="componentType!='phone'">Gender</th>
                <th v-if="componentType!='phone'">State of Origin</th>
                <th v-if="componentType!='phone'">LGA</th>
                <th v-if="componentType!='phone'">Tribe</th>
                <th v-if="componentType!='phone'">Geo-Political Zone</th>
                <th v-if="componentType!='phone'">Date of Birth</th>
                <th v-if="componentType!='phone'">Date of Enlistment</th>
                <th v-if="componentType!='phone'">Date of Last Promotion</th>
                <th v-if="componentType!='phone'">Date of Retirement</th>
                <th v-if="componentType!='phone'">Date Transfer to Command</th>
                <th v-if="componentType!='phone'">Command Served Last</th>
                <th v-if="componentType!='phone'">Educational Qualification</th>
                <th v-if="componentType!='phone'">Discipline</th>
                <th v-if="componentType!='phone'">General Duty/Specialist</th>
                <th v-if="componentType!='phone'">Duty Post</th>
                <th>Date Transfer To Division</th>
                <th v-if="componentType!='phone'">Date Reported In Command</th>
                <th>Phone Number</th>
                <th v-if="componentType!='phone'">Recruited As</th>
                <th v-if="componentType!='phone'">address</th>
                <th v-if="componentType!='phone'">Next of Kin</th>
                <th v-if="componentType!='phone'">Next of Kin Phone</th>

                <th v-if="componentType=='death' && componentType!='phone'">Death Date</th>
                <th v-if="componentType=='dismissal' && componentType!='phone'">Dismissal Date</th>
                <th v-if="componentType=='transfer' && componentType!='phone'">Transfer Out Date</th>                
            </tr>
            </thead>
            <!-- 
            <tbody>
              <tr
                v-for="user in listUsed"
                :key="user.id"
                style="cursor: pointer"
            >
                <td >{{ user.sn }}</td>
                <td >{{ user.ap_f_no }}</td>
                <td v-if="user.rank == null">-</td>
                <td v-else>{{ user.rank.abbr }}</td>
                <td v-if="componentType!='phone'">{{ user.surname }}</td>
                <td v-if="componentType!='phone'">{{ user.othername }}</td>
                <td v-if="componentType!='phone'">{{ user.sex }}</td>
                <td v-if="componentType!='phone'">{{ user.state_of_origin }}</td>
                <td v-if="componentType!='phone'">{{ user.lga }}</td>
                <td v-if="componentType!='phone'">{{ user.tribe }}</td>
                <td v-if="componentType!='phone'">{{ user.zone }}</td>
                <td v-if="componentType!='phone'">{{ user.dob }}</td>
                <td v-if="componentType!='phone'">{{ user.doe }}</td>
                <td v-if="componentType!='phone'">{{ user.last_promot }}</td>
                <td v-if="componentType!='phone'">{{ user.retirement }}</td>
                <td v-if="componentType!='phone'">{{ user.date_transfer_to_command }}</td>
                <td v-if="componentType!='phone'">{{ user.command_served_last }}</td>
                <td v-if="componentType!='phone'">{{ user.qualification }}</td>
                <td v-if="componentType!='phone'">{{ user.discipline }}</td>
                <td v-if="componentType!='phone'">{{ user.general_duty_specialist }}</td>
                <td >{{ user.duty_post_division }}</td>
                <td v-if="componentType!='phone'">{{ user.date_transfer_to_division }}</td>
                <td v-if="componentType!='phone'">{{ user.date_reported_in_command }}</td>
                <td >{{ user.phone }}</td>
                <td v-if="componentType!='phone'">{{ user.recruited_as }}</td>
                <td v-if="componentType!='phone'">{{ user.address }}</td>
                <td v-if="componentType!='phone'">{{ user.nok }}</td>
                <td v-if="componentType!='phone'">{{ user.nop }}</td>
                
                <td v-if="componentType=='death' && componentType != 'phone'">{{ user.death_date }}</td>
                <td v-if="componentType=='dismissal' && componentType != 'phone'">{{ user.dismissal_date }}</td>
                <td v-if="componentType=='transfer' && componentType != 'phone'">{{ user.date_transfer_out_of_command }}</td>
                
            </tr> 
            </tbody>
            -->
        </table>
        </div>             
    </div>
  </div>
</template>
<style scoped>

#tableheader div {
  margin: 20px !important;
}
.dataTablex_paginate{
  position:fixed !important;
  bottom:0px;
}
#dataTablex_length{

}
.dt-buttons.btn-group{
  float: left !important;
}

</style>
<script>
import Swal from "sweetalert2";
import vform from "./formRegister.vue";
Vue.component("vform2", require("./formRegister.vue").default);
export default {    
    props:{
        componentType:{
            type:String,
            default:"datalist"
        }   
    },
  component: {
    vform: vform,
  },
  data() {
    return {
      isloading: true,
      allLists: [],
      ranks: {},
      listUsed: [],
      columns : [
              {'data': 'sn'},
              {'data': 'ap_f_no'},
              {'data': 'rank.abbr'},
              {'data': 'surname'},
              {'data': 'othername'},
              {'data': 'sex'},
              {'data': 'state_of_origin'},
              {'data': 'lga'},
              {'data': 'tribe'},
              {'data': 'zone'},
              {'data': 'dob'},
              {'data': 'doe'},
              {'data': 'last_promot'},
              {'data': 'retirement'},
              {'data': 'date_transfer_to_command'},
              {'data': 'command_served_last'},
              {'data': 'qualification'},
              {'data': 'discipline'},
              {'data': 'general_duty_specialist'},
              {'data': 'duty_post_division'},
              {'data': 'date_transfer_to_division'},
              {'data': 'date_reported_in_command'},
              {'data': 'phone'},
              {'data': 'recruited_as'},
              {'data': 'address'},
              {'data': 'nok'},
              {'data': 'nop'},
            ]
    };
  },
  methods: {      
    tableInitializer:function(url,columns){      
      var $this = this;
      
       this.table = $("#dataTablex").DataTable({
            //fixedHeader: true,
            
            processing: true,
            serverSide: true,
            ajax:url,
            deferRender: false,
             pageLength: 3,
           /*
            draw:1, */
            "columns": columns,
            /* pageLength: $this.length, */
            "lengthMenu": [[2, 3,5, 10, 25, 50, -1], [2, 3, 5, 10, 25, 50, "All"]],            
            dom: "lBfrtip",
            
            buttons:[
                  {
                    extend: 'csv',
                    text:'Excel',
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                /* 'colvis', 'csv' */
            ],
            //["copy", "csv", "print"],

          initComplete: function (settings, json) {
            $this.isloading = false;
            $('#dataTablex_paginate').css({
              'position':'fixed', 'bottom':'0px'
            })
            $("#dataTablex tbody").on("click", "tr", function () {
                var data = $this.table.row(this).data();
                //console.log(data);
                $this.VueSweetAlert2("v-form", { propsData: data, edit: true });
            });
           
      
              $("#dataTablex_length, .dt-buttons.btn-group").css({                  
                  "float": "left",
                  "position":"absolute",
                  /* "top":"21%" */
              });
            /*   $(".dt-buttons.btn-group").css({
                "left":"30%"
              }); */
              $("#dataTablex_filter").css({
                "position":"absolute",
                "right":"0%"
              })
          /*     $(".dt-buttons.btn-group").css({
                "top": "18%",                   
              }) */

                 $(".dt-buttons.btn-group").css({
                      "width":"86px",
                      "float":" left",
                      "position":" absolute",
                      "left":" 175px",
                      "top":" -7px",
                  })/* 
              if($(window).width()<768){                

              }
                if($(window).width()<634){                  
            
                } */

                 
              }, 
          });
    }
  },
  created() {
      
    var $this = this;
    eventBus.$on('update-data', function(data){
        $this.listUsed.map((item,index,array)=>{
                        if(item.ap_f_no == data.ap_f_no){
                            item = data;
                            //console.log(data);
                            $this.$set($this.listUsed, index, data)
                        }
                    })
    })
    var url;
    if(this.componentType == "datalist"){
        url ="/alllistx";    
        $(document).ready(function(){
          $this.tableInitializer(url,$this.columns)
        })    
    }
    else if(this.componentType == "dismissal"){
        url = "/dismissalList";      
        $this.columns.push({'data': 'dismissal_date'});        
        $(document).ready(function(){  
          $this.tableInitializer(url,$this.columns)
        })
    }
    else if(this.componentType == "transfer"){
        url = "/transferList";
        $this.columns.push({'data': 'date_transfer_out_of_command'});
        $(document).ready(function(){
         $this.tableInitializer(url,$this.columns)
        })
    }
    else if(this.componentType == "death"){
        url = "/deathList";
        
        $this.columns.push({'data': 'death_date'});
        $(document).ready(function(){
         $this.tableInitializer(url,$this.columns)
        })

    }
    else if(this.componentType == "phone"){
        url = "/phoneBook";
        url ="/alllistx";   
        let columns = this.columns.filter((item) => {
                        if(item.data == 'sn'){
                          return item;
                        }else if
                        (item.data == 'ap_f_no'){
                          return item;
                        }else if
                        (item.data == 'rank'){
                          return item;
                        }else if
                        (item.data == 'phone'){
                          return item;
                        }else{
                          return false;
                        }
                      })
            
         this.tableInitializer(url,columns)
    }    
       
  },
  mounted() {
    /*     Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            }) */
       
    this.$nextTick(function () {
      var $this = this;
         $('#select-id').on("change",function(e){                           
                    e.preventDefault();         
                      var column;
                      var  arr =$(this).val();
                      console.log(arr)
                      arr.map((item, index, arrx)=>{
                        arrx[index] = Number(item);
                      })

                      console.log(arr)
                          // Get the column API object
                          for(let i=0; i<=26; i++){
                            //alert($(this).val().indexOf(i))
                            if(arr.indexOf(i) === -1){                 
                              column = $this.table.columns(i);                      
                              column.visible( true );           
                            }else{
                              column = $this.table.column(i);                      
                              column.visible( false );           
                            }
                          }              
                        });
    });
  },
};
</script>

