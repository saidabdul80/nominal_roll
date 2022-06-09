<template>
    <div class="row m-0">                
        <div class="col-md-12 mx-0 px-0" ></div>
        <button class="btn btn-info text-white" style="width:200px" @click="PrintElem('table1212')">Print</button>
        <div id="table1212" class="col-md-12 row w-100 p-0 mx-auto mb-3"  style="overflow-y:scroll;height:80vh;  overflow-x:hidden;margin-top: 15px;"    >
          <div v-for="(users, index) in data" :key="index" style="width: 100%;" >      
            <h5>{{ users[0].command.head }}</h5>
            <table id="" class="dataTablex display table p-0 table-bordered table-hover bg-white"  >
                <thead class="table-invert">
                <tr>
                    <th>S/N</th>
                    <th>AP/F NUMBER</th>
                    <th>Rank</th>
                    <th>Surname</th>
                    <th>Othernames</th>
                    <th>Division</th>                
                    <th>Phone Number</th>
                </tr>
                </thead>            
                <tbody>
                  <tr
                    v-for="(user,index) in users"
                    :key="user.id"
                    style="cursor: pointer"
                >
                    <td >{{ pnumber(index)  }}</td>
                    <td >{{ user.ap_f_no }}</td>
                    <td v-if="user.rank == null">-</td>
                    <td v-else>{{ user.rank.abbr }}</td>             
                    <td >{{ user.surname }}</td>
                    <td >{{ user.othername }}</td>
                    <td >{{ user.command.name }}</td>                
                    <td >{{ user.phone }}</td>                
                </tr> 
                </tbody>            
            </table>
          </div>             
        </div>             
    </div>
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
  props:['link'],
  data() {
    return {
      data:[]
    };
  },
  methods: {  
    PrintElem(id)
    {        
        var mywindow = window.open('', 'new div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/
        mywindow.document.write(`<link rel="stylesheet" href="${this.link}" type="text/css" />`);
        mywindow.document.write(`</head><body >
          <h1 class="text-center">Phone Book</h1>
        `);
        mywindow.document.write($("#"+id).html());
        mywindow.document.write('</body></html>');

        mywindow.print();
        

        //return true;
    },  
    pnumber(n){
      return  Number.parseInt(n) + 1;
    },
    tableInitializer:function(url,columns){      
      var $this = this;
      
       this.table = $("#dataTablex").DataTable({
            //fixedHeader: true,                                  
             pageLength: 3,       
            "columns": columns,
       
           // "lengthMenu": [[2, 3,5, 10, 25, 50, -1], [2, 3, 5, 10, 25, 50, "All"]],            
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
              $("#dataTablex_length, .dt-buttons.btn-group").css({                  
                  "float": "left",
                  "position":"absolute",
                  /* "top":"21%" */
              });
              $("#dataTablex_filter").css({
                "position":"absolute",
                "right":"0%"
              })
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
    let $this = this;
    axios.get('/phoneBook').then(function(res){
      $this.data = res.data
    })
  },
  mounted() {

       
    this.$nextTick(function () {
    });
  },
};
</script>

