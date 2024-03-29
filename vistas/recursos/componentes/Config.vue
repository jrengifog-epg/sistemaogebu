<template> 
    <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8">
        <h3 class="text-3xl text-center font-light mt-4">Configuración general</h3>
        <p class="text-sm text-gray-500 mt-2 mb-2 text-center">Información básica del sistema</p>
        <div class="md:px-6 py-2 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-xl leading-6 text-gray-900">
                        Información básica
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm font-light text-gray-500">
                        Información personal del estudiante, datos recopilados de la fichas.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nombres
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="nombres"> 
                                
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Apellidos
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="apellidoPaterno+' '+apellidoMaterno">
                                
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Usuario
                            </dt>
                            <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="">
                                    <li class="pr-4 flex items-center justify-between text-sm">
                                        <div class="">
                                            <input type="text" v-model="usuario" :disabled="desabilitar" :class="{'border-0 focus:outline-none text-sm p-0': estado==0,'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md':estado==1}" >
                                        </div>
                                    </li>
                                </ul>
                                
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Contraseña
                            </dt>
                            <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="">
                                    <li class="pr-4 flex items-center justify-between text-sm">
                                        <div class="">
                                            <input type="password" v-model="clave" :disabled="desabilitar" :class="{'border-0 focus:outline-none text-sm p-0': estado==0,'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md':estado==1}">
                                            <span class="block text-gray-500 font-light mt-1" v-if="estado==0">Última modificación: 24 may 2021</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0" v-if="estado==0">
                                            <a href="#" @click="cambiar()" class="font-medium text-blue-600 hover:text-blue-500">
                                                Cambiar
                                            </a>
                                        </div>
                                        <div class="ml-4 flex-shrink-0" v-else-if="estado==1">
                                            <a href="#" @click="modificarUser()" class="font-medium text-blue-600 hover:text-blue-500">
                                                Guardar
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    data() {
        return {
            /** Alumno */
            codigo:'',
            arrayAlumno:[],
            nombres:'',
            apellidoPaterno:'',
            apellidoMaterno:'',
            dni:'',
            escuela:'',
            facultad:'',
            ingreso:'',
            usuario:'',
            clave:'',
            /**Estados*/
            estado:0,
            desabilitar:true,
        }
    },
    methods: {
        loadAlumno(){
            let me=this;
            var id = this.$root.id;
            var url= '/alumno';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayAlumno=respuesta;
                if(me.arrayAlumno.length>0){
                    me.nombres=me.arrayAlumno[0]['nombres'];
                    me.apellidoPaterno=me.arrayAlumno[0]['apellidopaterno'];
                    me.apellidoMaterno=me.arrayAlumno[0]['apellidomaterno'];
                    me.dni=me.arrayAlumno[0]['dni'];
                    me.usuario=me.arrayAlumno[0]['usuario'];
                    me.clave=me.arrayAlumno[0]['clave'];
                }
                me.codigo=(''+me.dni+'').padStart(10,'0');
                me.fechaConstancia();
                me.loadImc();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        cambiar(){
            let me=this;
            me.estado=1;
            me.desabilitar=false;
        },
        modificarUser(){
            var url='/modificarUser';
             if(this.usuario.length==0 || this.clave.length < 8 ){
                swal(
                    'Alerta!!!',
                    'el usuario no puede ir vacio y utilize una clave de al menos 8 digitos',
                    'warning'
                ); 
            }else{
                swal({
                title: '¿Estás seguro?',
                text: "Se actualizara los datos",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: 'Sí',
                cancelButtonText: 'No'
                }).then((result) => {
                   
                        let me = this;
                        axios.put(url,{ 
                            'usuario':me.usuario,
                            'clave':me.clave,
                            'id_alumno': me.$root.id

                        }).then(function (response) {
                            if(response.data==1){
                                swal(
                                'Modificado!!!',
                                'se actualizo con éxito los datos.',
                                'success'
                                ); 
                                me.loadAlumno();
                                me.estado=0;
                                me.desabilitar=true;
                            }else{
                                swal(
                                'Error!!!',
                                'error al registrar los datos.',
                                'error'
                                ); 
                            }
                           
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });
            }
        }
    },
    mounted() {
        this.loadAlumno();
    },
}
</script>