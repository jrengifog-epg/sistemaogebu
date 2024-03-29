<template>
    <main>
        <main v-if="pagina==0" class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8">
            <main >
                <div class="flex flex-col md:flex-row">
                    <div class="flex-col w-full">
                        <h3 class="text-2xl">Lista de Alumnos</h3>
                        <p class="text-sm text-gray-500 mt-2 mb-4">Alumnos de las facultades de la univerdidad nacional de la amazonia peruana</p>
                    </div>
                </div>
                <div class="my-2 flex sm:flex-row flex-col pb-2 md:justify-end">
                        <div class="flex flex-row mb-1 w-full md:w-auto sm:mb-0">
                            <div class="relative w-3/6 md:w-auto">
                                <label
                                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                                    Filtro
                                </label>
                            </div>
                            <div class="relative  w-4/6 md:w-auto xl:w-52">
                                <select
                                        class="appearance-none h-full rounded-r border md:rounded-r-none   block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                        v-model="filtro"
                                        >
                                        <option value="dni">DNI</option>
                                        <option value="apellidopaterno">Apellido Paterno</option>
                                        <option value="apellidomaterno">Apellido Materno</option>
                                    </select>
                            </div>
                            <div class="relative w-4/6 md:w-auto xl:w-64">
                                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                        <path
                                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                        </path>
                                    </svg>
                                </span>
                                <input placeholder="Buscar"
                                    class="appearance-none rounded-r  rounded-l-none border-t border-r border-b  border-gray-400 block pl-8 pr-6 py-2 w-full bg-white placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" 
                                    v-model="dato"
                                    />
                            </div>
                        </div>
                </div>
                <div class="my-2 flex sm:flex-row flex-col pb-2 md:justify-end">
                        <div class="flex flex-row mb-1 w-full md:w-auto sm:mb-0">
                            <div class="relative w-3/6 md:w-auto">
                                <label
                                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                                    Facultad
                                </label>
                            </div>
                            <div class="relative  w-4/6 md:w-auto xl:w-64">
                                <select
                                    class="appearance-none h-full rounded-r border md:rounded-r-none   block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                    v-model="facultades" @change="Escuelas()"
                                    >
                                    <option value="">Todos</option>
                                    <option v-for="(f,index) in arrayFacultades" :key="index" :value="f.facultad" v-text="f.facultad"></option>
                                </select>
                            </div>  
                            <div class="relative w-3/6 md:w-auto">
                                <label
                                    class="appearance-none h-full rounded-l border block md:rounded-l-none appearance-none w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                                    Escuela
                                </label>
                            </div>
                            <div class="relative  w-4/6 md:w-auto xl:w-64">
                                <select
                                    class="appearance-none h-full rounded-r border   block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                    v-model="escuelas"
                                    >
                                    <option value="">Todos</option>
                                    <option v-for="(e,index) in arrayEscuelas" :key="index" :value="e.escuela" v-text="e.escuela"></option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0  justify-center">
                            <div class="flex flex-row  pt-1 md:px-1 md:pt-0 justify-center">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="Alumnos()">Buscar</button>
                            </div>
                        </div>
                </div>
                <div class="col-span-6 my-3 mx-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Alumno
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Dni
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Escuela
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Facultad
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200" v-if="arrayAlumnos.length > 0">
                                        <tr v-for="(a,index) in arrayAlumnos">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500" v-text="a.apellidopaterno+' '+a.apellidomaterno+' '+a.nombres">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500" v-text="a.dni">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500" v-text="a.escuela">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500" v-text="a.facultad">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <a  href="#" class="text-sm text-blue-700" @click="loadAlumno(a.id_alumno)">Resultados</a>
                                                        </div> 
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                        <tbody class="bg-white divide-y divide-gray-200" v-else>
                                            <tr>
                                                <td  class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center w-full text-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500">
                                                            No hay Registros
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot >
                                            <tr class="pt-6">
                                                <td  class="py-3"
                                                :colspan="10"
                                                >
                                                    <t-pagination
                                                        :total-items="rows"
                                                        :limit="10"
                                                        :per-page="25"
                                                        v-model="page_number"
                                                        @change="Alumnos()"
                                                        class="mx-auto"
                                                    />
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </main>
        <main v-else-if="pagina==1">
            <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-8 mb-8">
                <div class="flex my-4 items-center px-4 sm:px-0">
                    <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Inicio</a></h2>
                    <span>
                        <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                    </span>
                    <h3 class="text-blue-500 ml-2">Resultados evaluación Psicologica</h3>
                </div>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-2xl font-medium leading-6 text-gray-900">evaluación Psicologica</h3>
                                <p class="mt-4 text-sm text-gray-600">Perfil Psicologico del estudiante, podrá ver los resultados de los test y descargar su constancia</p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow sm:rounded-md sm:overflow-hidden mb-4">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="overflow-hidden">
                                        <div class="py-2">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="nombres+' '+apellidos">
                                                
                                            </h3>
                                            <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                Ultima actualización el 21 de mayo de 2022
                                            </p> -->
                                        </div>
                                        <div class="border-t border-gray-200">
                                            <dl>
                                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Foto
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                                                        <div class="w-20 h-20 rounded-full overflow-hidden">
                                                            <img :src="'../vistas/img/alumnos/'+foto" alt="" class="w-20  object-cover ">
                                                        </div>
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-100"></div>
                                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Inventario de Depresión de Beck
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                     {{idb}}
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-100"></div>
                                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Evaluación de Síntoma S.R.Q.
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{srq}}
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-100"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Constancia
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm" >
                                                                <div class="w-0 flex-1 flex items-center">
                                                                    <!-- Heroicon name: solid/paper-clip -->
                                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                            clip-rule="evenodd"/>
                                                                    </svg>
                                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                                        constancia Ficha Psicologica.pdf
                                                                    </span>
                                                                </div>
                                                                <div class="ml-4 flex-shrink-0">
                                                                    <a href="#" @click="generarpdfPsicologica()"
                                                                    class="font-medium text-blue-600 hover:text-indigo-500">
                                                                        Descargar
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
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <main id="psicologica">
                <vue-html2pdf
                :show-layout="false"
                :float-layout="true"
                :enable-download="true"
                :preview-modal="false"
                :paginate-elements-by-height="1100"
                :filename="'CONSTANCIA FICHA PSICOLOGICA-'+dni"
                :pdf-quality="2"
                :manual-pagination="true"
                pdf-format="a4"
                pdf-orientation="portrait"
                pdf-content-width="725px"
                @hasStartedGeneration="hasStartedGeneration()"
                @hasGenerated="hasGenerated($event)"
                ref="psicologica"
                >
                    <section slot="pdf-content" >
                        <div v-if="$root.size > 750" class="pc ml-8">
                            <div class="mt-12 ml-14 flex w-full">
                                <div class="w-3/12">
                                    <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                                </div>
                                <div class="w-6/12 flex-row text-center -ml-24 md:-ml-44 pt-6">
                                    <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                    <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                    <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                    <h1 class="text-md pt-6"><i><b><u>CONSTANCIA DE SALUD MENTAL</u></b></i></h1>
                                </div>
                                <div class="w-3/12 ml-2">
                                    <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60"/>
                                </div>
                            </div>
                            <div class="mt-10 ml-14 flex md:w-7/12">
                                <div class="w-full flex-row  text-justify mb-2">
                                    <h1 class="text-md mb-2"><b>CERTIFICA:</b></h1>
                                    <h1 class="text-md mb-3"><b>HABER EVALUADO PSICOLÓGICAMENTE A:</b></h1>
                                    <p class="text-sm"><i><b><span v-text="nombres+' '+apellidos"></span></b> de <b><span v-text="edad"></span></b> años con N° de DNI: <b><span v-text="dni"></span></b>
                                    Quien a la fecha no presenta indicadores de alteraciones en salud mental; encontrándose por lo tanto dentro de la variable de normalidad.</i></p>
                                </div>
                            </div>
                            <div class="mt-10 ml-14 flex md:w-7/12">
                                <div class="w-full flex-row  text-left">
                                    <p class="text-sm">Se expide la siguiente constancia nombre del interesado (a) para los fines pertinentes.</p>
                                </div>
                            </div>
                            <div class="mt-14 mb-10 ml-14 flex w-7/12">
                                <div class="w-full flex  justify-center">
                                    <img :src="'../vistas/img/firma-psicopedagogica.jpg'" alt="" width="250"/>
                                </div>
                            </div>
                            <div class="mt-18 ml-14 flex w-7/12">
                                <div class="w-full flex-row  text-right">
                                    <p class="text-sm"><i>Iquitos, <b><span v-text="dia_constancia"></span></b> de <b><span v-text="mes_constancia"></span></b> de <b><span v-text="año_constancia"></span></b> </i></p>
                                </div>
                            </div>
                            <div class="mt-28 ml-14 flex w-7/12">
                                <div class="w-full flex-row  justify-start">
                                    <barcode  height="25" width="2" fontSize="14" :value="codigo">-
                                    </barcode>
                                </div>
                            </div>
                        </div>
                        <div v-else class="ml-8">
                            <div class="mt-12 ml-14 flex w-full">
                                <div class="w-3/12">
                                    <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                                </div>
                                <div class="w-6/12 flex-row text-center ml-0  pt-6">
                                    <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                    <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                    <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                    <h1 class="text-md pt-6"><i><b><u>CONSTANCIA DE SALUD MENTAL</u></b></i></h1>
                                </div>
                                <div class="w-3/12 pl-14">
                                    <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60"/>
                                </div>
                            </div>
                            <div class="mt-10 ml-14 flex md:w-7/12">
                                <div class="w-full flex-row  text-justify mb-2">
                                    <h1 class="text-md mb-2"><b>CERTIFICA:</b></h1>
                                    <h1 class="text-md mb-3"><b>HABER EVALUADO PSICOLÓGICAMENTE A:</b></h1>
                                    <p class="text-sm"><i><b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b> de <b><span v-text="edad"></span></b> años con N° de DNI: <b><span v-text="dni"></span></b>
                                    Quien a la fecha no presenta indicadores de alteraciones en salud mental; encontrándose por lo tanto dentro de la variable de normalidad.</i></p>
                                </div>
                            </div>
                            <div class="mt-10 ml-14 flex md:w-7/12">
                                <div class="w-full flex-row  text-left">
                                    <p class="text-sm">Se expide la siguiente constancia nombre del interesado (a) para los fines pertinentes.</p>
                                </div>
                            </div>
                            <div class="mt-14 mb-10 ml-14 flex w-12/12">
                                <div class="w-full flex  justify-center">
                                    <img :src="'../vistas/img/firma-psicopedagogica.jpg'" alt="" width="250"/>
                                </div>
                            </div>
                            <div class="mt-18 ml-14 flex w-12/12">
                                <div class="w-full flex-row  text-right">
                                    <p class="text-sm"><i>Iquitos, <b><span v-text="dia_constancia"></span></b> de <b><span v-text="mes_constancia"></span></b> de <b><span v-text="año_constancia"></span></b> </i></p>
                                </div>
                            </div>
                            <div class="mt-28 ml-14 flex w-7/12">
                                <div class="w-full flex-row  justify-start">
                                    <barcode  height="25" width="2" fontSize="14" :value="codigo">-
                                    </barcode>
                                </div>
                            </div>
                        </div>
                    </section>
                </vue-html2pdf>
            </main>
        </main>
    </main>
</template>
<script>
import VueHtml2pdf from 'vue-html2pdf';
import VueBarcode from 'vue-barcode';
import {
    TPagination,
    } from 'vue-tailwind/dist/components';
export default {
    data(){
        return{
           /*pagination*/
            page_number:1,
            rows:0,
            pagina:0,
            /** Opciones*/
            filtro:'dni',
            dato:'',
            facultades:'',
            escuelas:'',
            /**Array */ 
            arrayAlumnos:[],
            arrayFacultades:[],
            arrayEscuelas:[],
           /** Alumno */
            codigo:'',
            arrayAlumno:[],
            nombres:'',
            apellidos:'',
            fecha_nacimiento:'',
            dni:'',
            facultad:'',
            id_alumno:0,
            foto:'',
            edad:0,
             /** Constancia*/
            dia_constancia:'',
            mes_constancia:'',
            año_constancia:'',
            fecha:'',
            /**resultados */
            idb:'',
            srq:'',
        }
    },
    components:{
        TPagination,
        'barcode': VueBarcode,
    },
    methods:{
        Alumnos(){
            let me = this;

            var url= '/alumnos';
            axios.post(url,{ 'page_number': me.page_number, 'filtro':me.filtro, 'dato':me.dato, 'facultad': me.facultades, 'escuela': me.escuelas}).then(function (response) {
                let respuesta = response.data;
                me.arrayAlumnos=respuesta;
                me.totalAlumnos();
                me.pagina=0;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        totalAlumnos(){
            let me = this;
            var url= '/totalAlumnos';
            axios.post(url,{'filtro':me.filtro, 'dato':me.dato, 'facultad': me.facultades, 'escuela': me.escuelas}).then(function (response) {
                let respuesta = response.data;
                me.rows= parseInt(respuesta[0]['cantidad']);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        Facultades(){
            let me = this;
            var url= '/facultades';
            axios.get(url).then(function (response) {
                let respuesta = response.data;
                me.arrayFacultades=respuesta;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        Escuelas(){
            let me = this;
            if(me.facultades == ''){
                var facultades='-';
                me.escuelas='';
            }else{
                var facultades= me.facultades;
                me.escuelas='';
            }
            var url= '/escuelas';
            axios.post(url,{ 'facultad': facultades}).then(function (response) {
                let respuesta = response.data;
                me.arrayEscuelas=respuesta;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        limpiarfiltro(){
            this.Alumnos();
            this.Facultades();
            this.id_alumno=0;
        },
        loadAlumno(id_alumno){
            let me=this;
            var id = id_alumno;
            var url= '/alumno';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayAlumno=respuesta;
                if(me.arrayAlumno.length>0){
                    me.nombres=me.arrayAlumno[0]['nombres'];
                    me.apellidos=me.arrayAlumno[0]['apellidopaterno']+' '+me.arrayAlumno[0]['apellidomaterno'];
                    me.dni=me.arrayAlumno[0]['dni'];
                    me.facultad=me.arrayAlumno[0]['facultad'];
                }
                me.pagina=1;
                me.id_alumno=id;
                me.loadIndices(id);
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/informacionPersonal';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(respuesta.length>0){
                    me.edad = me.calcularEdad(respuesta[0]['fecha_nacimiento']);
                     me.foto=respuesta[0]['foto'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        fechaConstancia(){
            let date = new Date();
            let años = date.getFullYear();
            let meses = date.getMonth() ;
            let dia = date.getDate();
            
            this.año_constancia=años;
            /**Dia*/
            if(dia < 10){
                if((meses+1) < 10){
                    this.fecha =años+'-0'+(meses+1)+'-0'+dia;
                }else{
                    this.fecha =años+'-'+(meses+1)+'-0'+dia;
                }
                
                this.dia_constancia ='0'+dia;
            }else{
                
                if((meses+1)  < 10){
                    this.fecha =años+'-0'+(meses+1)+'-'+dia;
                }else{
                    this.fecha =años+'-'+(meses+1)+'-'+dia;
                }
                this.dia_constancia =dia;
            }
            switch (meses){
                case 0:
                    this.mes_constancia='Enero';
                break;
                case 1:
                    this.mes_constancia='Febrero';
                break;
                case 2:
                    this.mes_constancia='Marzo';
                break;
                case 3:
                    this.mes_constancia='Abril'
                break;
                case 4:
                    this.mes_constancia='Mayo'
                break;
                case 5:
                    this.mes_constancia='Junio'
                break;
                case 6:
                    this.mes_constancia='Julio'
                break;
                case 7:
                    this.mes_constancia='Agosto'
                break;
                case 8:
                    this.mes_constancia='Septiembre'
                break;
                case 9:
                    this.mes_constancia='Obtubre'
                break;
                case 10:
                    this.mes_constancia='Noviembre'
                break;
                case 11:
                    this.mes_constancia='Diciembre'
                break;
            }
        },
        generarpdfPsicologica(){
            this.top();
            this.$refs.psicologica.generatePdf();
            
        },
        top(){
            
            $('body, html').animate({
                scrollTop: '0px',
                
            }, 0);
            return true;
        },
        calcularEdad(fecha_nacimiento){
            var hoy = new Date();
            var cumpleanos = new Date(fecha_nacimiento);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();
            var  info='';
            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            if(isNaN(edad)){
                info='';
                return info;

            }else{

                info=edad;
                return info;
            }
        },
        loadIndices(id_alumno){
            let me = this;
            var url1 = '/countidb';
            axios.post(url1,{'id_alumno':id_alumno}).then((response) => {
                    var respuesta = response.data;
                    console.log(respuesta);
                   if(parseInt(respuesta[0]['cantidad']) > 0){
                        me.idb = "EVALUADO"
                    }else{
                        me.idb = "NO EVALUADO"
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url2 = '/countsqr';
            axios.post(url2,{'id_alumno':id_alumno}).then((response) => {
                    var respuesta = response.data;
                    if(parseInt(respuesta[0]['cantidad']) > 0){
                        me.srq = "EVALUADO"
                    }else{
                        me.srq = "NO EVALUADO"
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        }
    },
    mounted(){
        this.Alumnos();
        this.Facultades();
    }   
}
</script>