window.Vue = require('vue');
window.axi = require('axios');
/**AXIOS */
window.axios = axi.create({
    baseURL: "../controlador/app.php"

});
window.simg = axi.create({
    baseURL: "../controlador/subirfoto.php"

});
window.axiPDF= axi.create({
    baseURL: "../controlador/pdf.php"

});
/**VUE */
Vue.component('social', require('./componentes/FichaSocial.vue').default);
Vue.component('nutricion', require('./componentes/FichaNutricion.vue').default);
Vue.component('psicologica', require('./componentes/FichaPsicologica.vue').default);
Vue.component('psicologo', require('./componentes/Psicologo.vue').default);
Vue.component('salud', require('./componentes/FichaSalud.vue').default);
Vue.component('perfil', require('./componentes/Perfil.vue').default);
Vue.component('login', require('./componentes/Login.vue').default);
Vue.component('config', require('./componentes/Config.vue').default);
Vue.component('alumnos', require('./componentes/Alumnos.vue').default);
Vue.component('citas', require('./componentes/Citas.vue').default);
const app = new Vue({
    el: '#app',
    data: {
        menu: -1,
        id: 0,
        size:0,
        tabnext1:0,
        show:true,
        open:false,
        open1:false,
        validate:false,
        rol:0,

    },
    created() {
        window.addEventListener("resize", this.myEventHandler);
    },
    destroyed() {
        window.removeEventListener("resize", this.myEventHandler);
    },
    methods: {
        myEventHandler() {
            this.size = window.innerWidth;
        },
        loadOpen1(){
            if(this.open1==false){
                this.open1=true;
            }else{
                this.open1=false;
            }
        },
        loadInfo(){
            let me = this;
            var url1 = '/countinfopersonal';
            axios.post(url1,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext1 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext1 =0;
                    }
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
            });
        },
        roles(){
            let me = this;
            if(me.rol==1){
                me.menu=6;
            }else if(me.rol==2){
                me.menu=0;
            }else if(me.rol==3){
                me.menu=6;
            }else if(me.rol==4){
                me.menu=3;
            }
            else if(me.rol==5){
                me.menu=8;
            }
            else if(me.rol==6){
                me.menu=1;
            }
        }
    },
   
    mounted() {
        this.myEventHandler();
        this.loadInfo();
        this.roles();
          
    }
});