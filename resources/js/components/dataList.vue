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
    <div style="position:relative;">
        <span id="ribbonx3Btn" @click="toggleRibbon" style="top: -25px;position:absolute;right:25px;" class="d-block badge text-white bg-primary" type="button" >toggle</span>
    </div>
    <div class="row m-0">            
        <div id="ribbonx3" class="col-md-12 mx-0 row bg-white p-3">
            <div id="tableheader" class="d-flex col-md-6">
                        
            </div>
            <div class="row col-md-6" style="padding:7px; border:1px solid #eee; border-radius:5px;">                                            
                <div class="col-md-12">
                    General Search
                </div>
                    <div class="pr-2 pl-0 m-0 col-md-6" >
                        <select id="gColumn" class="form-control my-1 " style="">
                            <option value="">Column</option>
                            <option value="ap_f_no">AP/F NUMBER</option>
                            <option value="rank_id">RANK</option>
                            <option value="surname">SURNAME</option>
                            <option value="othername">OTHERNAME</option>
                            <option value="sex">SEX</option>
                            <option value="state_of_origin">STATE OF ORIGIN</option>
                            <option value="lga">LGA</option>
                            <option value="tribe">TRIBE</option>
                            <option value="zone">ZONE</option>
                            <!-- <option value="dob">DOB</option> -->
                            <!-- <option value="doe">doe</option> -->
                            <!-- <option value="last_promot">last_promot</option> -->
                            <!-- <option value="retirement">retirement</option> -->
                            <!-- <option value="date_transfer_to_command">date_transfer_to_command</option> -->
                            <option value="command_served_last">COMMAND SERVED LAST</option>
                            <option value="qualification">QUALIFICATION</option>
                            <option value="discipline">DISCIPLINE</option>
                            <option value="general_duty_specialist">GENERAL DUTY POST</option>
                            <option value="duty_post_division">DUTY POST/DIVISION</option>
                            <!-- <option value="date_transfer_to_division">date_transfer_to_division</option> -->
                            <!-- <option value="date_reported_in_command">date_reported_in_command</option> -->
                            <option value="phone">phone</option>
                            <option value="recruited_as">recruited_as</option>
                            <!-- <option value="address">address</option> -->
                            <!-- <option value="nok">nok</option> -->
                            <!-- <option value="nop">nop</option> -->
                        </select>
                    </div>
                    <div class="pl-2 pr-0 m-0 col-md-6" >
                        <input id="gText" type="text" placeholder="search text from column" title="search text from column" class=" form-control my-1  w-100">
                    </div>
                    <button @click="searchWholeList" class="d-inline-block btn mt-2 mx-auto text-white" style="background:#6c757d; width:96%;height:34px;" >Search</button>                                
            </div>
            
        </div>
        <div class="col-md-12 mx-0 px-0" style="border-bottom:1px solid #ccc;"></div>
        <div id="table1212" class="col-md-12 row w-100 p-0 mx-auto" style="overflow:hidden; shadow-sm; overflow:scroll;overflow-y:hidden;margin-top: 31px;"    >
        <table
            id="dataTablex" class="display table p-0 table-bordered table-hover bg-white" style="width: 100%; box-shadow: 1px 2px 4px #ccc"
        >
            <thead class="table-invert">
            <tr>
                <th>S/N</th>
                <th>AP/F NUMBER</th>
                <th>Rank</th>
                <th>Surname</th>
                <th>Othernames</th>
                <th>Gender</th>
                <th>State of Origin</th>
                <th>LGA</th>
                <th>Tribe</th>
                <th>Geo-Political Zone</th>
                <th>Date of Birth</th>
                <th>Date of Enlistment</th>
                <th>Date of Last Promotion</th>
                <th>Date of Retirement</th>
                <th>Date Transfer to Command</th>
                <th>Command Served Last</th>
                <th>Educational Qualification</th>
                <th>Discipline</th>
                <th>General Duty/Specialist</th>
                <th>Duty Post</th>
                <th>Date Transfer To Division</th>
                <th>Date Reported In Command</th>
                <th>Phone Number</th>
                <th>Recruited As</th>
                <th>address</th>
                <th>Next of Kin</th>
                <th>Next of Kin Phone</th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="user in listUsed"
                :key="user.id"
                style="cursor: pointer"
            >
                <td>{{ user.sn }}</td>
                <td>{{ user.ap_f_no }}</td>
                <td v-if="user.rank == null">-</td>
                <td v-else>{{ user.rank.abbr }}</td>
                <td>{{ user.surname }}</td>
                <td>{{ user.othername }}</td>
                <td>{{ user.sex }}</td>
                <td>{{ user.state_of_origin }}</td>
                <td>{{ user.lga }}</td>
                <td>{{ user.tribe }}</td>
                <td>{{ user.zone }}</td>
                <td>{{ user.dob }}</td>
                <td>{{ user.doe }}</td>
                <td>{{ user.last_promot }}</td>
                <td>{{ user.retirement }}</td>
                <td>{{ user.date_transfer_to_command }}</td>
                <td>{{ user.command_served_last }}</td>
                <td>{{ user.qualification }}</td>
                <td>{{ user.discipline }}</td>
                <td>{{ user.general_duty_specialist }}</td>
                <td>{{ user.duty_post_division }}</td>
                <td>{{ user.date_transfer_to_division }}</td>
                <td>{{ user.date_reported_in_command }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.recruited_as }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.nok }}</td>
                <td>{{ user.nop }}</td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-12" style="position: fixed;  bottom: 0%;z-index:100; display: flex;justify-content: center;width: 80%;">
            
            <input type="number" min="1" value="1" id="from" @change="execPag()" placeholder="view from 1" class="form-control mr-2 p-1" style="width: 100px;height: 35px;box-shadow: rgb(204 204 204) 1px 2px 3px;background: lightyellow;"/>
            <!-- <button class="btn btn-primary px-5 py-1 mx-1" style="height: 35px">Prev</button> -->
            <div id="tablefooter" class="mx-1"></div>
            <!-- <button class="btn btn-primary px-5 py-1 mx-1" style="height: 35px">Next</button> -->
            <input type="number" value="100" min="100" @change="execPag()" id="to" class="form-control p-1" placeholder="to 100" style="width: 100px;height: 35px;box-shadow: rgb(204 204 204) 1px 2px 3px;background: lightyellow;"/>
        </div>
    </div>
  </div>
</template>
<style scoped>

#tableheader div {
  margin: 20px !important;
}

</style>
<script>
import Swal from "sweetalert2";
import vform from "./formRegister.vue";
Vue.component("vform2", require("./formRegister.vue").default);
export default {
    name:"dataList",
  component: {
    vform: vform,
  },
  data() {
    return {
      isloading: true,
      allLists: [],
      ranks: {},
      listUsed: [],
      skip: false,
      table:"",
      start:0
    };
  },
  methods: {    
      searchWholeList:function(){
          let gColumn = $("#gColumn").val();
          let gText = $("#gText").val();
          if(gColumn == ""){
              $("#gColumn").css("border","1px solid #d9a");
              Swal.fire("Select Column to Search From!");
              return 0;
          }
          if(gText == ""){
              $("#gText").css("border","1px solid #d9a");
              Swal.fire("Searched Text Field cannot be empty");
              return 0;
          }
          $("#gText").css("border","1px solid #ccc");
            this.isloading = true
         this.table.destroy();
         this.listUsed = this.allLists.filter((item)=>{             
             if(gColumn== 'rank_id'){
                 return item.rank.abbr == gText.toUpperCase();
             }else if(gColumn == 'sex'){                 
                 return item.sex == gText;
             }else{
                 return item.gColumn == gText;
             }
          });
          console.log(this.listUsed);
          this.tableInitializer();
      },
      toggleRibbon:function(){
          $("#ribbonx3").slideToggle()
      },
    getbunch: function (a, b) {
        if(a >0){            
            a -= 1;
        }else{
            a = 0;            
        }
        this.isloading = true
      if (this.allLists.length != 0) {
        this.listUsed = this.allLists.filter((item, index) => {          
          return index >= a && index <= b;
        });       
      }
      
    },

    execPag() {
      let a = $("#from").val();
      let b = $("#to").val();
      /* this.skip = true;
      this.skip = false;
      this.listUsed = []; */
      this.table.destroy();
      this.getbunch(a, b); 
      this.tableInitializer();   
    },
    tableInitializer:function(length=3){
        var $this = this;

      setTimeout(() => {
          $this.table = $("#dataTablex").DataTable({
            fixedHeader: true,
            pageLength: length,
            /* stateSave:true, */
            dom: "Bfrtip",
            destroy: true,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            initComplete: function (settings, json) {
              $this.isloading = false;
              $("#tableheader").html($("#dataTablex_filter").detach()).append($(".dt-buttons").detach());
              /* $("#tableheader").append("<button class='btn btn-success'>Keep Record</button>"); */
              /* $("#tablefooter").html($(".pagination").detach());      */         

              $(".dt-buttons").addClass("ml-4").attr("id", "buttonxlm");
              
              try {
                document.querySelector("#buttonxlm").style.marginTop = "18px";
                document.querySelector("#buttonxlm").style.marginLeft = "10px";
                document.querySelector("#buttonxlm").style.height = "35px";
              } catch (err) {
                console.log(err);
              }
    
              $("#dataTablex tbody").on("click", "tr", function () {
                var data = table.row(this).data();
                $this.VueSweetAlert2("v-form", { propsData: data, edit: true });
              });
            },
          });
          $("#tablefooter ul:not(:first-child)").remove();
      }, 200);
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
    axios
      .get("/allrank")
      .then((response) => (this.ranks = response.data))
      .catch((error) => console.log(error));
    axios
      .get("/alllist")
      .then((response) => {          
        this.allLists = response.data

        this.getbunch(0, 100);
        $(document).ready(function () {
          $this.table = $("#dataTablex").DataTable({
            fixedHeader: true,
            pageLength: 3,
            //stateSave:true,
             // colReorder: true,
            dom: "Bfrtip",
            buttons: ["copy", "csv", "print"],
            initComplete: function (settings, json) {
              $this.isloading = false;
              $("#tableheader").html($("#dataTablex_filter").detach());
              $("#tableheader").append($(".dt-buttons").detach());
              $("#tableheader").append('<a style="height:34px;  margin-top:18px;" class="btn btn-info text-white mx-2" href="/all-list">View All</a>')
              
//              $("#tablefooter").html($(".pagination").detach());

              $(".dt-buttons").addClass("ml-4 mr-2").attr("id", "buttonxlm");
              /* setInterval(() => {           
                                                }, 1000); */
              try {
                document.querySelector("#buttonxlm").style.marginTop = "18px";
                document.querySelector("#buttonxlm").style.marginLeft = "10px";
                document.querySelector("#buttonxlm").style.height = "35px";
              } catch (err) {
                console.log(err);
              }

              $("#dataTablex tbody").on("click", "tr", function () {
                var data = $this.table.row(this).data();
                $this.VueSweetAlert2("v-form", { propsData: data, edit: true });
                /* setTimeout(() => {
                    this.$refs.vForm.$on('returnedData',(e)=>{
                           console.log(e)
                       })                    
                }, 1000); */
              });
            },
          });
        });
      })
      .catch((error) => console.log(error));
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

