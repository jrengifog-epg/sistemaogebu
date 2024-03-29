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
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center" v-if="a.cant_medico > 0">
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
                <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#"  @click="limpiarfiltro()">INICIO</a></h2>
                <span>
                    <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"/>
                </svg>
                </span>
                <h3 class="text-blue-500 ml-2">Información Medica</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Evaluación Medica</h3>
                            <p class="mt-4 text-sm text-gray-600">
                                Se debe Pesar y Tallarse alumno con anticipacion para que los datos sean correctos. 
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6 py-5">
                                            <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">Información Personal</legend>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Fecha</label>
                                            <input type="date" 
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="fecha" :readonly="true">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Fecha Nacimiento</label>
                                            <input type="date" 
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="fecha_nacimiento" :readonly="true">
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
                                        <div class="col-span-6 sm:col-span-6">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Facultad</label>
                                            <input type="text"
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-400" v-model="facultad" :readonly="true">
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">1. Signos Vitales</legend>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Presión Arterial</label>
                                              <input type="text"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-m" v-model="presion_arterial" >
                                    
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Puslo</label>
                                            <input type="text"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="pulso">
                                                
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Saturación</label>
                                            <input type="text" 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="respiracion">
                                               
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label 
                                                class="block text-sm font-medium text-gray-700">Temperatura</label>
                                            <input type="text" 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="temperatura">  
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">2. ¿Actualmente, tiene algun sintoma pre-existente?</legend>
                                        </div>
                                        <div class="col-span-6 ">
                                            <textarea rows="5" 
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  v-model="presintoma"></textarea>
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">3. ¿Sufres de alguna enfermedad?</legend>
                                        </div>
                                        
                                        <div class="col-span-6">
                                            <select 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="enfermedad"  >
                                                <option value="">--</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6" v-if="enfermedad==1">
                                            <fieldset>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e1" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e1" class="font-medium text-gray-700">Anemia</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e2" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e2" class="font-medium text-gray-700">Diabetes</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e3" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e3" class="font-medium text-gray-700">Enfermedad psoquiátrica</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e4" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e4" class="font-medium text-gray-700">VIH</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e5" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e5" class="font-medium text-gray-700">Asma</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e6" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e6" class="font-medium text-gray-700">Hipertensión</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e7" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e7" class="font-medium text-gray-700">Enfermedad psicológica</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e8" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="8" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e8" class="font-medium text-gray-700">Alergias</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="otro-1"
                                                            class="block text-sm font-medium text-gray-700">Especificar alergias</label>
                                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca alergias"  v-model="especificacion_alergia" >
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e9" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e9" class="font-medium text-gray-700">Cancer</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e10" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e10" class="font-medium text-gray-700">Infección Urinaria</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e11" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e11" class="font-medium text-gray-700">Hepatitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e12" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="12" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e12" class="font-medium text-gray-700">Cardiopatia</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e13" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="13" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e13" class="font-medium text-gray-700">ITS</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="e14" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="14" v-model="enfermedades" >
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="e14" class="font-medium text-gray-700">Otros</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label 
                                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                                        <input type="text" 
                                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_enfermedad" >
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">4. Alergias a medicamentos</legend>
                                        </div>
                                        
                                        <div class="col-span-6">
                                            <select 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="medicamento">
                                                <option value="">--</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6" v-if="medicamento==1">
                                            <fieldset>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia1" name="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia1" class="font-medium text-gray-700">Penicilinas</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia2" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia2" class="font-medium text-gray-700">Sulfas</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia3" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia3" class="font-medium text-gray-700">Aines</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia4" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia4" class="font-medium text-gray-700">Diclofenaco</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia5" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia5" class="font-medium text-gray-700">Celocoxib</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia6" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia6" class="font-medium text-gray-700">Ibuprofeno</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia7" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia7" class="font-medium text-gray-700">Naproxeno</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia8" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia8" class="font-medium text-gray-700">Aspirina</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia9" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia9" class="font-medium text-gray-700">Indometaxina</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia10" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia10" class="font-medium text-gray-700">Proxican</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="alergia11" ame="alergia" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11" v-model="alergias">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="alergia11" class="font-medium text-gray-700">Otros</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label 
                                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                                        <input  type="text"
                                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_medicamento">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">5. ¿Tiene alguna discapacidad?</legend>
                                        </div>
                                        <div class="col-span-6">
                                            <input type="text"
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-m" v-model="discapacidad" >
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">6. ¿Tuviste COVID?</legend>
                                        </div>
                                        
                                        <div class="col-span-6">
                                            <select 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="covid">
                                                <option value="">--</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                       
                                        <div class="col-span-6" v-if="covid==1">
                                            <legend class="text-base font-medium text-gray-900">¿Que sintomas presentaste?</legend>
                                        </div>

                                        <div class="col-span-6" v-if="covid==1">
                                            <fieldset>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas1" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas1" class="font-medium text-gray-700">Dolor de cabeza</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas2" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas2" class="font-medium text-gray-700">Dolor Muscular</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas3" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas3" class="font-medium text-gray-700">Dolor Articular</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas4" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas4" class="font-medium text-gray-700">Fiebre</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas5" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas5" class="font-medium text-gray-700">Pérdida del sentido del olfato o del gusto</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas6" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas6" class="font-medium text-gray-700">Tos seca</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas7" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas7" class="font-medium text-gray-700">Dificultad para respirar o sensación de falta de aire</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas8" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas8" class="font-medium text-gray-700">Miedo</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="sintomas9" name="sintomas"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="sintomas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="sintomas9" class="font-medium text-gray-700">Ansiedad</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-span-6" v-if="covid==1">
                                            <legend class="text-base font-medium text-gray-900">¿Que secuelas te dejo el COVID?</legend>
                                        </div>

                                        <div class="col-span-6" v-if="covid==1">
                                            <fieldset>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas1" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"   value="1" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas1" class="font-medium text-gray-700">Insomnio</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas2" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas2" class="font-medium text-gray-700">Falta de aire</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas3" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas3" class="font-medium text-gray-700">Falta de concentración</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas4" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas4" class="font-medium text-gray-700">Depresión</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas5" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas5" class="font-medium text-gray-700">Fatiga o Dolor de espalda</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas6" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas6" class="font-medium text-gray-700">Taquicardia</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas7" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas7" class="font-medium text-gray-700">Dolor Muscular</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas8" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas8" class="font-medium text-gray-700">Dolor de pecho</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas9" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas9" class="font-medium text-gray-700">Cansancio</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas10" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas10" class="font-medium text-gray-700">Problemas renales</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas11" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas11" class="font-medium text-gray-700">Caida de cabello</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="secuelas12" name="secuelas" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="12" v-model="secuelas">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="secuelas12" class="font-medium text-gray-700">Otros</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="otro-1"
                                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_secuela">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-span-6" v-if="covid==1">
                                            <legend class="text-base font-medium text-gray-900">¿Has tenido familiares fallecidos por COVID?</legend>
                                        </div>
                                        <div class="col-span-6" v-if="covid==1">
                                            <select 
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="fallecido">
                                                <option value="">--</option>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6" v-if="fallecido==1">
                                            <fieldset>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="familiar1" name="familiar" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1" v-model="familiares">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="familiar1" class="font-medium text-gray-700">Papá</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="familiar2" name="familiar" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="familiares">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="familiar2" class="font-medium text-gray-700">Mamá</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="familiar3" name="familiar" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="familiares">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="familiar3" class="font-medium text-gray-700">Hermano</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="familiar4" name="familiar" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="familiares">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="familiar4" class="font-medium text-gray-700">Hijos</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="familiar5" name="familiar" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="familiares">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="familiar5" class="font-medium text-gray-700">Otros Familiares</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                         <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">7. Diagnostico Salud</legend>
                                        </div>
                                        <div class="col-span-6 ">
                                            <textarea rows="5" 
                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md "  v-model="diagnostico"></textarea>
                                        </div>
                                        <div class="col-span-6">
                                            <legend class="text-base font-medium text-gray-900">8. ¿Debe pasar al servicio Medico?</legend>
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
                                    <button type="button" @click="guardarMedica()"
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
                    <h3 class="text-2xl font-medium leading-6 text-gray-900">Historial Evaluaciones Medicas</h3>
                    <p class="mt-2 text-sm text-gray-600">historial de evaluaciones medicas</p>
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
                                            Preción Arterial
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pulso
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Respiración
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Temperatura
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
                                                {{h.registrar}}
                                            </td>
                                            <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{h.presion_arterial}}
                                            </td>
                                            <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{h.pulso}}
                                            </td>
                                            <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{h.respiracion}}
                                            </td>
                                            <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{h.temperatura}}
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
        <main>
            <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="false"
            :paginate-elements-by-height="1100"
            :filename="'CONSTANCIA MEDICA-'+dni"
            :pdf-quality="2"
            :manual-pagination="true"
            pdf-format="a4"
            pdf-orientation="portrait"
            pdf-content-width="725px"
            @hasStartedGeneration="hasStartedGeneration()"
            @hasGenerated="hasGenerated($event)"
            ref="html2Pdf"
            >
                <section slot="pdf-content" >
                    <div v-if="$root.size > 750" class="pc ml-8">
                        <div class="mt-14 ml-14 flex w-full">
                            <div class="w-3/12">
                                <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                            </div>
                            <div class="w-6/12 flex-row text-center ml-0 md:-ml-44 pt-6">
                                <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                <h1 class="text-md pt-6"><i><b><u>CONSTANCIA MEDICA</u></b></i></h1>
                            </div>
                            <div class="w-3/12 ml-10 md:ml-2">
                                <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60" />
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex md:w-7/12">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm"><i>Se certifica que el estudiante <b><span v-text="nombres+' '+apellidos"></span></b> de la facultad <b><span v-text="facultad"></span></b> con N° de DNI <b><span v-text="dni"></span></b>
                            ha realizado correctamente la evaluación medica.</i></p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-7/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-medico.jpg'" alt="" width="250"/>
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
                        <div class="mt-14 ml-14 flex w-full">
                            <div class="w-2/12">
                                <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                            </div>
                            <div class="w-8/12 flex-row text-center ml-0 md:-ml-44 pt-6">
                                <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                <h1 class="text-sm"><b>DIRECCIÓN BIENESTAR UNIVERSITARIO</b></h1>
                                <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                <h1 class="text-md pt-6"><i><b><u>CONSTANCIA MEDICA</u></b></i></h1>
                            </div>
                            <div class="w-2/12 ">
                                <img class="ml-10 " :src="'../vistas/img/logo-ogebu.png'" alt="" width="60" />
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex md:w-7/12">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm"><i>Se certifica que el estudiante <b><span v-text="nombres+' '+apellidos"></span></b> de la facultad <b><span v-text="facultad"></span></b> con N° de DNI <b><span v-text="dni"></span></b>
                            ha realizado correctamente la evaluación medica.</i></p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-12/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-medico.jpg'" alt="" width="250"/>
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
            tabnext:2,
            tabnext1:2,
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
            fecha_nacimiento:'',
            facultad:'',
            id_alumno:0,
            /**evaluacion medica*/
            presion_arterial:'',
            pulso:'',
            respiracion:'',
            temperatura:'',
            enfermedad:0,
            arrayenfermedades:[],
            enfermedades:[],
            especificacion_alergia:'',
            especificacion_enfermedad:'',
            medicamento:0,
            alergias:[],
            especificacion_medicamento:'',
            covid:0,
            sintomas:[],
            secuelas:[],
            especificacion_secuela:'',
            fallecido:0,
            familiares:[],
            diagnostico:'',
            presintoma:'',
            discapacidad:'',
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
            this.presion_arterial='';
            this.pulso='';
            this.respiracion='';
            this.temperatura='';
            this.enfermedad='';
            this.arrayenfermedades=[];
            this.enfermedades=[];
            this.especificacion_alergia='';
            this.especificacion_enfermedad='';
            this.medicamento='';
            this.alergias=[];
            this.especificacion_medicamento='';
            this.covid='';
            this.diagnostico = '';
            this.presintoma='';
            this.discapacidad='';
            this.sintomas=[];
            this.secuelas=[];
            this.servicio = '';
            this.especificacion_secuela='';
            this.fallecido='';
            this.familiares=[];
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
                me.fechaConstancia();
                me.loadEnfermedad();
                me.laodHistorial(id_alumno);
                me.codigo=(''+me.año_constancia+''+id+'').padStart(8,'0');
                me.pagina=1;
                me.id_alumno=id;
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/fechanacimiento';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(respuesta.length> 0){
                   me.fecha_nacimiento=respuesta[0]['fecha_nacimiento'];
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
        loadEnfermedad(){
            let me=this;
            var id = this.$root.id;
            var url= '/enfermedad_alumno';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayenfermedades=respuesta;
                if(me.arrayenfermedades.length > 0){
                    for(var i=0;i< me.arrayenfermedades.length; i++){
                        me.enfermedades.push(me.arrayenfermedades[i]['enfermedad']);
                        if(me.arrayenfermedades[i]['enfermedad']==8){
                            me.especificacion_alergia=me.arrayenfermedades[i]['especificacion_alergia'];
                        }
                        if(me.arrayenfermedades[i]['enfermedad']==14){
                            me.especificacion_enfermedad=me.arrayenfermedades[i]['especificacion_enfermedad'];
                        }
                    }
                    me.enfermedad = 1;
                }else{
                    me.enfermedad = 0;
                }
                
            })
            .catch(function (error) {
                console.log(error);
            });         
        },
        guardarMedica(){
            var url='/guardarmedica';
            if(this.validarMedica()){
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
                        axios.post(url,{
                            'presion_arterial':me. presion_arterial,
                            'pulso':me.pulso,
                            'respiracion':me.respiracion,
                            'temperatura':me.temperatura,
                            'presintoma': me.presintoma,
                            'enfermedad':me.enfermedad,
                            'medicamento':me.medicamento,
                            'discapacidad':me.discapacidad,
                            'alergias':me.alergias,
                            'especificacion_medicamento':me.especificacion_medicamento,
                            'covid':me.covid,
                            'sintomas':me.sintomas,
                            'secuelas':me.secuelas,
                            'especificacion_secuela':me.especificacion_secuela,
                            'fallecido':me.fallecido,
                            'familiares':me.familiares,
                            'diagnostico':me.diagnostico,
                            'servicio':me.servicio,
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
        validarMedica(){
            let me=this;
            if(me.presion_arterial=='' || me.pulso=='' || me.respiracion=='' ||me.temperatura=='' ){
                return 1;
            }else{
                return 0;
            }
        },
        generarPdf(){
             
            this.$refs.html2Pdf.generatePdf();
            
        },
        laodHistorial(id_alumno){
            let me = this;
            var url1= '/historial_medico';
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