<template>
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
                                    <option value="ingreso">Año Ingreso</option>
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
                                                Año Ingreso
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
                                            <td class="px-6 py-4 ">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm text-gray-500" v-text="a.ingreso">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" >
                                                <div class="flex items-center" v-if="a.cant_nutricion > 0">
                                                    <div class="ml-4">
                                                        <a  href="#" class="text-sm text-green-600" @click="loadAlumno(a.id_alumno)">Evaluado</a>
                                                    </div> 
                                                </div>
                                                <div class="flex items-center" v-else>
                                                    <div class="ml-4">
                                                        <a  href="#" class="text-sm text-blue-700" @click="loadAlumno(a.id_alumno)">Iniciar Evaluación</a>
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
                                                    :per-page="10"
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
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==1">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Nutricional</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Evaluación Nutricional</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Evaluación Nutricional</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            El alumno debe Pesarse y Tallarse con anticipacion para que los datos sean correctos. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">


                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">1. Información Personal</legend>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label 
                                            class="block text-sm font-medium text-gray-700">Fecha</label>
                                        <input type="date" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="fecha" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label 
                                            class="block text-sm font-medium text-gray-700">Facultad</label>
                                        <input type="text"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="facultad" :readonly="true">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label  class="block text-sm font-medium text-gray-700">Nombres</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="nombres" :readonly="true">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label  class="block text-sm font-medium text-gray-700">Apellidos</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="apellidos" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
                                        <select id="genero" name="country" autocomplete="genero"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-400" v-model="sexo" :disabled="true">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Masculino</option>
                                            <option value="0">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label 
                                            class="block text-sm font-medium text-gray-700">Fecha Nacimiento</label>
                                        <input type="date" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="fecha_nacimiento" :readonly="true">
                                    </div>
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">2. Evaluación Antropomórfica</legend>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label  class="block text-sm font-medium text-gray-700">Peso Actual en kilos</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  placeholder="En kilos" v-model="peso" @change="calacularImc()">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label  class="block text-sm font-medium text-gray-700">Estatura en centimetros</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " placeholder="En Centimetros" v-model="talla" @change="calacularImc()">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                        <label  class="block text-sm font-medium text-gray-700">Indice masa corporal</label>
                                        <input type="text" readonly
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " placeholder="0.0" v-model="indice_masa">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                        <label  class="block text-sm font-medium text-gray-700">Clasificiación masa corporal</label>
                                         <input type="text" readonly
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  v-model="clasificacion_imc">
                                    </div>
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">3. Tipo de actividad fisica que realiza</legend>
                                    </div>
                                    <div class="col-span-6">
                                        <select id="genero" name="country" autocomplete="genero"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm " v-model="actividad_fisica" >
                                            <option value="">--Seleccione--</option>
                                            <option value="0">SEDENTARIO</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">INTENSA</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">4. Intolorancias o alergias</legend>
                                    </div>
                                    <div class="col-span-6 ">
                                        <textarea rows="5" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  v-model="alergias"></textarea>
                                    </div>
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">5. Diagnostico Nutricional</legend>
                                    </div>
                                    <div class="col-span-6 ">
                                        <textarea rows="5" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  v-model="diagnostico"></textarea>
                                    </div>
                                    <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">6. ¿Debe pasar al servicio de Nutricionista?</legend>
                                        </div>
                                        
                                        <div class="col-span-6">
                                            <select 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="servicio">
                                                <option value="">--</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="limpiarfiltro()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Cancelar
                                    </button>
                                <button type="button" @click="guardarNutricion()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="pt-4">
                <h3 class="text-2xl font-medium leading-6 text-gray-900">Historial Evaluaciones</h3>
                <p class="mt-2 text-sm text-gray-600">historial de evaluaciones nutricional</p>
            </div>
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-8">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Evaluación
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Peso Kg.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Talla Cm.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        IMC
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Diagnostico
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" v-if="arrayHistorial.length > 0">
                                    <tr v-for="h in arrayHistorial">
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{h.fecha}}
                                        </td>
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                           {{h.peso}}
                                        </td>
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{h.talla}}
                                        </td>
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{h.indice_masa}}
                                        </td>
                                        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{h.diagnostico}}
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="bg-white divide-y divide-gray-200" v-else>
                                    <tr>
                                        <td colspan ="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            HISTORIAL VACIO
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            arrayHistorial:[],
           /** Alumno */
            codigo:'',
            arrayAlumno:[],
            nombres:'',
            apellidos:'',
            fecha_nacimiento:'',
            dni:'',
            facultad:'',
            sexo:'',
            peso:'',
            talla:'',
            actividad_fisica:'',
            alergias:'',
            indice_masa:'',
            clasificacion_imc:'',
            diagnostico:'',
            servicio:'',
            /** discapacidad */
            arrayDiscapacidad:[],
            /** Constancia*/
            dia_constancia:'',
            mes_constancia:'',
            año_constancia:'',
            fecha:'',
        }
    },
    components:{
        'barcode': VueBarcode,
        TPagination,
    },
    methods:{
        Alumnos(){
            let me = this;

            var url= '/alumnos_social';
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
            var url= '/totalAlumnos_social';
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
            this.peso='';
            this.talla='';
            this.actividad_fisica='';
            this.alergias='';
            this.indice_masa='';
            this.servicio='';
        },
        loadAlumno(id_alumno){
            let me=this;
            var id = id_alumno;
            var url= '/alumno';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayAlumno=respuesta;
                if(me.arrayAlumno.length > ''){
                    me.nombres=me.arrayAlumno[0]['nombres'];
                    me.apellidos=me.arrayAlumno[0]['apellidopaterno']+' '+me.arrayAlumno[0]['apellidomaterno'];
                    me.dni=me.arrayAlumno[0]['dni'];
                    me.facultad=me.arrayAlumno[0]['facultad'];
                    
                }
                me.fechaConstancia();
                me.codigo=(''+me.año_constancia+''+id+'').padStart(8,'0');
                me.pagina=1;
                me.id_alumno=id;
                me.laodHistorial(id_alumno);
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/fechanacimiento';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(respuesta.length> 0){
                   me.fecha_nacimiento=respuesta[0]['fecha_nacimiento'];
                   me.sexo=respuesta[0]['sexo'];
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
        countInfo(id_alumno){
            var url = '/countnutricion';
            let tabnext1=0;
            axios.post(url,{'id_alumno':id_alumno}).then((response) => {
                var respuesta = response.data;
                if(respuesta.length > 0){
                        tabnext1 = respuesta[0]['cantidad'];
                    return tabnext1;
                }else{
                    return tabnext1;
                }
                

            })
            .catch(function(error) {
                // handle error
                console.log(error);
            });
        },
        guardarNutricion(){
            var url='/guardarnutricion';
            if(this.validarNutricion()){
                swal(
                    'Alerta!!!',
                    'Verifique si todos los campos hayan sido repondidos correctamente',
                    'warning'
                ); 
            }else{
                swal({
                    title: '¿Estás seguro?',
                    text: "Se guardara la Informacion ",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        let me = this;
                        me.calacularImc();
                        axios.post(url,{
                            'peso':me.peso,
                            'talla':me.talla,
                            'indice_masa':me.indice_masa,
                            'actividad_fisica':me.actividad_fisica,
                            'alergias':me.alergias,
                            'fecha':me.fecha,
                            'diagnostico':me.diagnostico,
                            'servicio': me.servicio,  
                            'id_alumno': me.id_alumno
                        }).then(function (response) {
                            
                                me.limpiarfiltro();
                            if(response.data==1){
                                 swal(
                                'Guardado!!!',
                                'se registraron los datos.',
                                'success'
                                ); 
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
        },
        validarNutricion(){
            let me=this;
            if(me.peso=='' || isNaN(me.peso) || me.talla=='' || isNaN(me.talla)  || me.actividad_fisica==''  ){
                return 1;
            }else{
                return 0;
            }
        },
        calacularImc(){
            if(this.talla.length == 3){
                
                var imc= this.peso / Math.pow((this.talla/100),2);
                this.indice_masa=  Math.round(imc * 100) / 100;
            }else{
                var imc= this.peso / Math.pow(this.talla,2);
                this.indice_masa= Math.round(imc * 100) / 100;
            }

            if(this.indice_masa < 18.5){
                this.clasificacion_imc='Bajo Peso';
            }else if(this.indice_masa >= 18.5 && this.indice_masa <= 24.9){
                this.clasificacion_imc='Normal';
            }else if(this.indice_masa >= 25 && this.indice_masa <= 29.9){
                this.clasificacion_imc='Sobrepeso';
            }else if(this.indice_masa >= 30 && this.indice_masa <= 34.9){
                this.clasificacion_imc='Obesidad I';
            }else if(this.indice_masa >= 35 && this.indice_masa <= 39.9){
                this.clasificacion_imc='Obesidad II';
            }else if(this.indice_masa >= 40){
                this.clasificacion_imc='Obesidad III';
            }
        },
        generarPdf(){
             
            this.$refs.html2Pdf.generatePdf();
            
        },
        // discapacidad(id_alumno){
        //     let me = this;
        //     var url1= '/discapacidad';
        //     axios.post(url1,{'id_alumno':id_alumno}).then(function (response) {
        //         let respuesta = response.data;
        //         me.arrayDiscapacidad=respuesta;
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        // },
        laodHistorial(id_alumno){
            let me = this;
            var url1= '/historial_nutricion';
            axios.post(url1,{'id_alumno':id_alumno}).then(function (response) {
                let respuesta = response.data;
                me.arrayHistorial=respuesta;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

    },
    mounted(){
        this.Alumnos();
        this.Facultades();
    }   
}
</script>
<style >
.pc{
        margin-right: -290px;
    }
</style>