import Swal from 'sweetalert2'
import selectState from './components/selectState.vue'
export default {
    install(Vue, options) {
        Vue.mixin({        
            data() {
                return {
                    app_url:'http://localhost:8000'
                }
            },
            methods:{                
                alertWithDateRequest(text,name,route, appno,type=0){
                    let xhtml = `
                        <div id='VueSweetAlert4'>
                        <input type='date' class='form-control' id='alert-datex'>
                        </div>`; 
                        if(type ==1){
                         xhtml =  `
                            <div id='VueSweetAlert4'>
                                <div class="row mb-3 mx-auto">
                                    <label for="state" class="col-md-4 col-form-label text-md-end">Date</label>
                                    <div class="col-md-8">  <input type='date' class='form-control' id='alert-datex'></div>
                                </div>
                            </div>
                            `;
                        }
                    let width = $(window). width();                                                              
                    Swal.fire({
                        title: text,                        
                        html:xhtml,
                        showCancelButton: true,
                        confirmButtonText: name,
                        
                        showLoaderOnConfirm: true,
                        focusConfirm: false,
                        preConfirm: () => {                            
                            let date = document.getElementById('alert-datex').value,state='',lga ='';                        
                            try{    
                                if(date ==""){
                                    Swal.showValidationMessage(`Date Field is Required`)
                                    return false;
                                }                                              
                                if(type == 1){
                                    state = $('#VueSweetAlert4 #state').val()
                                    lga = $('#VueSweetAlert4 #state').val()
                                    if(state =='' || lga == ''){
                                        Swal.showValidationMessage(`State and lga transfer to, is Required`)
                                        return false;
                                    }
                                }
                                return axios.post(this.app_url+'/api'+route, {ap_f_no:appno,date: date,state:state,lga:lga}).then(function(response){
                                        if(response.data.status == 200){
                                            return response.data.msg
                                        }else{
                                            Swal.showValidationMessage(
                                                `Request failed: Try Again`
                                            )
                                        }
                                    });                          
                            }catch(e){
                                Swal.showValidationMessage(
                                    `Request failed: ${e}`
                                  )
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                      }).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire({
                            title: `${result.value}`,                            
                          })
                        }
                      })

                    if(type == 1){

                        let ComponentClass = Vue.extend(Vue.component("vform2", require("./components/selectState.vue").default));
                        
                        let instance = new ComponentClass().$mount();                             
                        document.getElementById('VueSweetAlert4').appendChild(instance.$el);
                        $('#VueSweetAlert4 div').removeClass('col-md-6');
                        $('#VueSweetAlert4 .mx-0.px-0').removeClass('col-md-8');
                    }
                },
                undoRequestAlert(text,route,appno){                    
                                                                        
                Swal.fire({
                    title: 'Please Confirm this Action',           
                    html:text+'<p><b class="text-danger">Note:</b> this action will roll back this user to the old information state</p>',                             
                    showCancelButton: true,
                    confirmButtonText: 'Continue',                    
                    showLoaderOnConfirm: true,
                    focusConfirm: false,
                    preConfirm: () => {                                                 
                        try{                                                                   
                            return axios.post(this.app_url+'/api'+route, {ap_f_no:appno}).then(function(response){
                                if(response.data.status == 200){
                                    return response.data.msg
                                }else{
                                    Swal.showValidationMessage(
                                        `Request failed: Try Again`
                                    )
                                }
                            });                          
                        }catch(e){
                            Swal.showValidationMessage(
                                `Request failed: ${e}`
                              )
                        }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire({
                        title: `${result.value}`,                            
                      }).then((result) => {window.reload()})
                    }
                  })             
                },
                VueSweetAlert2: function(component,propsData)
                {         
                    Swal.fire({
                        html: '<div id="VueSweetAlert2" refs="vForm"></div>',
                        showConfirmButton: false,
                        width:'100%',
                        height:'100vh',
                        willOpen: () => {
                            let ComponentClass = Vue.extend(Vue.component(component));
                            
                             let instance = new ComponentClass({
                                propsData: propsData,
                            }).$mount(); 
                            //instance.$mount();
                            //instance.$createElement()
                            

                            document.getElementById('VueSweetAlert2').appendChild(instance.$el);
                        }
                    });
                }
            }
        })
    }



}