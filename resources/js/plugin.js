import Swal from 'sweetalert2'
export default {
    install(Vue, options) {
        Vue.mixin({

            methods:{                
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