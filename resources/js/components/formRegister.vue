<template>
    <div class="row w-100 m-0 p-0">
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">AP/F NUMBER</label>
                <div class="col-md-8">
                    <input id="ap_f_no" type="text" class="form-control @error('ap_f_no')  @enderror" name="ap_f_no" :value="ap_f_no" required autocomplete="ap_f_no" autofocus>
                </div>
        </div>
       <v-select-rank :rank="rank"></v-select-rank>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="surname" class="col-md-4 col-form-label text-md-end">Surname</label>
                <div class="col-md-8">
                    <input id="surname" type="text" class="form-control @error('surname')  @enderror" name="surname" :value="surname" required autocomplete="surname" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="othername" class="col-md-4 col-form-label text-md-end">Othernames</label>
                <div class="col-md-8">
                    <input id="othername" type="text" class="form-control @error('othername')  @enderror" name="othername" :value="othername" required autocomplete="othername" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                <div class="col-md-8">
                    <select id="gender" class="form-control @error('gender')  @enderror" name="sex" required autofocus>
                        <option value="M" :selected="gender=='M'" >Male</option>
                        <option value="F" :selected="gender=='F'">Female</option>
                    </select>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="tribe" class="col-md-4 col-form-label text-md-end">Tribe</label>
                <div class="col-md-8">
                    <input id="tribe" type="text" class="form-control @error('tribe')  @enderror" name="tribe" :value="tribe"  autocomplete="tribe" autofocus>
                </div>
        </div>
        <v-select-state :state="state" :lga="lga"></v-select-state>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="zone" class="col-md-4 col-form-label text-md-end">Geo-Political Zone</label>
                <div class="col-md-8">
                    <input id="zone" type="text" class="form-control @error('zone')  @enderror" name="zone" :value="zone"  autocomplete="zone" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="dob" class="col-md-4 col-form-label text-md-end">Date of Birth</label>
                <div class="col-md-8">
                    <input id="dob" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('dob')  @enderror" name="dob" :value="dob"  autocomplete="dob" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="doe" class="col-md-4 col-form-label text-md-end">Date of Enlistment</label>
                <div class="col-md-8">
                    <input id="doe" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('doe')  @enderror" name="doe" :value="doe"  autocomplete="doe" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="last_promot" class="col-md-4 col-form-label text-md-end">Date of Last Promotion</label>
                <div class="col-md-8">
                    <input id="last_promot" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('last_promot')  @enderror" name="last_promot" :value="last_promot"  autocomplete="last_promot" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="retirement" class="col-md-4 col-form-label text-md-end">Date of Retirement</label>
                <div class="col-md-8">
                    <input id="retirement" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('retirement')  @enderror" name="retirement" :value="retirement"  autocomplete="retirement" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="date_transfer_to_command" class="col-md-4 col-form-label text-md-end">Date Transfer to Command</label>
                <div class="col-md-8">
                    <input id="date_transfer_to_command" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('date_transfer_to_command')  @enderror" name="date_transfer_to_command" :value="date_transfer_to_command"  autocomplete="date_transfer_to_command" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="command_served_last" class="col-md-4 col-form-label text-md-end">Command Served Last</label>
                <div class="col-md-8">
                    <input id="command_served_last" type="text" class="form-control @error('command_served_last')  @enderror" name="command_served_last" :value="command_served_last"  autocomplete="command_served_last" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="qualification" class="col-md-4 col-form-label text-md-end">Educational Qualification</label>
                <div class="col-md-8">
                    <input id="qualification" type="text" class="form-control @error('qualification')  @enderror" name="qualification" :value="qualification"  autocomplete="qualification" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="discipline" class="col-md-4 col-form-label text-md-end">Discipline</label>
                <div class="col-md-8">
                    <input id="discipline" type="text" class="form-control @error('discipline')  @enderror" name="discipline" :value="discipline"  autocomplete="discipline" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="general_duty_specialist" class="col-md-4 col-form-label text-md-end">General Duty/Specialist</label>
                <div class="col-md-8">
                    <select id="general_duty_specialist" class="form-control @error('gender')  @enderror" name="general_duty_specialist"  autofocus >
                        <option value="GENERAL DUTY" :selected="general_duty_specialist=='GENERAL DUTY' || general_duty_specialist=='GD' ">General Duty</option>
                        <option value="SPECIALIST" :selected="general_duty_specialist=='SPECIALIST' || general_duty_specialist=='SP'">Specialist</option>
                    </select>                    
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="duty_post_division" class="col-md-4 col-form-label text-md-end">Duty Post</label>
                <div class="col-md-8">
                    <input id="duty_post_division" type="text" class="form-control @error('duty_post_division')  @enderror" name="duty_post_division" :value="duty_post_division"  autocomplete="duty_post_division" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="date_transfer_to_division" class="col-md-4 col-form-label text-md-end">Date Transfer To Division</label>
                <div class="col-md-8">
                    <input id="date_transfer_to_division" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('date_transfer_to_division')  @enderror" name="date_transfer_to_division" :value="date_transfer_to_division"  autocomplete="date_transfer_to_division" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="date_reported_in_command" class="col-md-4 col-form-label text-md-end">Date Reported In Command</label>
                <div class="col-md-8">
                    <input id="date_reported_in_command" type="text" data-range="true" data-multiple-dates-separator=" - "  data-language="en" class="date_picker datepicker-here form-control @error('date_reported_in_command')  @enderror" name="date_reported_in_command" :value="date_reported_in_command"  autocomplete="date_reported_in_command" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone Number</label>
                <div class="col-md-8">
                    <input id="phone" type="text" class="form-control @error('phone')  @enderror" name="phone" :value="phone"  autocomplete="phone" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="recruited_as" class="col-md-4 col-form-label text-md-end">Recruited As</label>
                <div class="col-md-8">
                     <select class="form-control @error('gender')  @enderror" id="recruited_as" name="recruited_as"  autofocus>
                        <option value="CONSTABLE" :selected="recruited_as=='CONSTABLE'">CONSTABLE</option>
                        <option value="C/INSPR" :selected="recruited_as=='C/INSPR'">C/INSPR</option>
                        <option value="C/ASP" :selected="recruited_as=='C/ASP' || recruited_as=='CADET ASP' || recruited_as=='ASP CADET'">C/ASP</option>
                    </select>                         
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="address" class="col-md-4 col-form-label text-md-end">address</label>
                <div class="col-md-8">
                    <input id="address" type="text" class="form-control @error('address')  @enderror" name="address" :value="address"  autocomplete="address" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="nok" class="col-md-4 col-form-label text-md-end">Next of Kin</label>
                <div class="col-md-8">
                    <input id="nok" type="text" class="form-control @error('nok')  @enderror" name="nok" :value="nok"  autocomplete="nok" autofocus>
                </div>
        </div>
        <div class="row mb-3 col-md-4 mx-auto">
            <label for="nop" class="col-md-4 col-form-label text-md-end">Next of Kin Phone</label>
                <div class="col-md-8">
                    <input id="nop" type="text" class="form-control @error('nop')  @enderror" name="nop" :value="nop"  autocomplete="nop" autofocus>
                </div>
        </div>
        <div v-if="edit">
            <center>
                <button @click="saveData()" class="btn btn-primary text-white px-4 py-3 mx-1">Save</button>
                <button @click="closeSwal()" class="btn btn-danger text-white px-4 py-3 mx-1">Cancle</button>
            </center>
        </div>
        
    </div>
</template>
<script>
import selectRank from './selectRank.vue';
import selectState from './selectState.vue';
import Swal from 'sweetalert2';

export default{     
 name:"form",
 component: {
     'v-select-state':selectState,
     'v-select-rank':selectRank,
 },
 
 data(){
     return{
        ap_f_no:"",
        rank:"",
        surname:"",
        othername:"",
        gender:"",
        state:"",
        lga:"",
        tribe:"", 
        zone:"",
        dob:"",
        doe:"",
        last_promot:"",
        retirement:"",
        date_transfer_to_command:"",
        command_served_last:"",
        qualification:"",
        discipline:"",
        general_duty_specialist:"",
        duty_post_division:"",
        date_transfer_to_division:"",
        date_reported_in_command:"",
        phone:"",
        recruited_as:"",
        address:"",
        nok:"",
        nop:"",
     }
 },

 props:{
     propsData:{
         type: Array,
         default: null
     },
     edit:{
         type:Boolean,
         default:false
     }
 },
 methods:{
     closeSwal:function(){
         Swal.close();
     },
     saveData(){
         //Swal.fire("Configure this in formRegister.vue")
         let $this = this;
            var datax = {
            ap_f_no :this.ap_f_no,  
            rank_id :Number($('#rank').val()),  
            rank: {
                id:Number($('#rank').val()),  
                abbr:$("#rank option:selected").text()
            },
            surname :this.surname,  
            othername :this.othername,  
            sex :this.gender,  
            state_of_origin :$('#state').val(),  
            lga :$('#lga').val(),  
            tribe :this.tribe,  
            zone :this.zone,  
            dob :this.dob,  
            doe :this.doe,  
            last_promot :this.last_promot,  
            retirement :this.retirement,  
            date_transfer_to_command :this.date_transfer_to_command,  
            command_served_last :this.command_served_last,  
            qualification :this.qualification,  
            discipline :this.discipline,  
            general_duty_specialist :this.general_duty_specialist,  
            duty_post_division :this.duty_post_division,  
            date_transfer_to_division :this.date_transfer_to_division,  
            date_reported_in_command :this.date_reported_in_command,  
            phone :this.phone,  
            recruited_as :this.recruited_as,  
            address :this.address,  
            nok :this.nok,  
            nop :this.nop }
            axios.post('/updateUser', datax).then(response => { 
                if(response.data == 200){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 2000
                    });
                    eventBus.$emit("update-data",datax)                    
                   // return 0;
                }else{
                    closeSwal();                

                }
            }).catch(error => console.log(error))
     }
 },
 mounted(){

     if(this.propsData != null){  
        // console.log(this.propsData)   
        this.ap_f_no = this.propsData[1]
        this.rank = this.propsData[2]
        this.surname = this.propsData[3]
        this.othername = this.propsData[4]
        this.gender = this.propsData[5]
        this.state = this.propsData[6]
        this.lga = this.propsData[7]
        this.tribe = this.propsData[8]
        this.zone = this.propsData[9]
        this.dob = this.propsData[10]
        this.doe = this.propsData[11]
        this.last_promot = this.propsData[12]
        this.retirement = this.propsData[13]
        this.date_transfer_to_command = this.propsData[14]
        this.command_served_last = this.propsData[15]
        this.qualification = this.propsData[16]
        this.discipline = this.propsData[17]
        this.general_duty_specialist = this.propsData[18]
        this.duty_post_division = this.propsData[19]
        this.date_transfer_to_division = this.propsData[20]
        this.date_reported_in_command = this.propsData[21]
        this.phone = this.propsData[22]
        this.recruited_as = this.propsData[23]
        this.address = this.propsData[24]
        this.nok = this.propsData[25]
        this.nop = this.propsData[26]
    }
    this.$nextTick(function(){              
        $(document).ready(function(){
            setTimeout(() => {                
                $('.date_picker').datepicker({ format: "dd/mm/yyyy" });                
            }, 500);
        })
    }); 
 }
}
</script>
 