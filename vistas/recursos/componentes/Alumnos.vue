<template>
    <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8">
        <main v-if="pagina==0">
            <div class="flex flex-col md:flex-row">
                <div class="flex-col w-full">
                    <h3 class="text-2xl">Alumnos</h3>
                    <p class="text-sm text-gray-500 mt-2 mb-4">Información de todos los alumnos de las facultades de la univerdidad nacional de la amazonia peruana</p>
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
                     <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0  justify-center">
                        <div class="flex flex-row  pt-1 md:px-1 md:pt-0 justify-center">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" @click="exportExcel()">Exportar</button>
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
                                                        <a  href="#" class="text-sm text-blue-700" @click="verAlumno(a.id_alumno)">Ver</a>
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
        <main v-else-if="pagina==1">
            <div class="flex my-4 items-center px-4 sm:px-0">
                <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a :href="'../menu/'" >Inicio</a></h2>
                <span>
                    <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"/>
                </svg>
                </span>
                <h3 class="text-blue-500 ml-2">Perfil del Estudiante</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Datos del Estudiante</h3>
                            <p class="mt-4 text-sm text-gray-600"> 
                            Información básica, como el nombre y la foto, facultad y datos de contacto del estudiante.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden mb-4">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="overflow-hidden">
                                    <div class="py-2  flex flex-row  ">
                                        <div class="w-9/12">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Información básica
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                Ultima actualización el <span v-text="modificacion"></span>
                                            </p>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                               <b>Estado:</b> <span v-if="validacion==0">Información sin validar</span>
                                               <span v-else-if="validacion==1">Información validada</span>
                                            </p>
                                        </div>
                                        <div class="w-4/12">
                                            <button class="bg-green-500 hover:bg-red-500 text-white font-bold py-1 px-2 rounded text-sm mx-2" v-if="validacion==0" @click="validarDatos()">Validar</button>
                                            <button class="bg-yellow-500 hover:bg-red-500 text-white font-bold py-1 px-2 rounded text-sm mx-2" >Modificar</button>
                                        </div>
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
                                                    Nombres
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="nombres">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" >
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Apellidos
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"  v-text="apellidoPaterno+' '+apellidoMaterno" >
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Número de DNI
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="dni">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Genero
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="genero">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" >
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Fecha de nacimiento
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="fecha_nacimiento">
                                                
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Estado civil
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="estado_civil">
                                                
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Edad
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="edad">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Fichas
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
                                                                 Ficha Socio-economica.pdf
                                                                </span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#" @click="fichaSocial()"
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
                        <div class="mt-5 md:mt-0 md:col-span-2 mb-4">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="overflow-hidden">
                                        <div class="py-2">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Información académica
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            </p>
                                        </div>
                                        <div class="border-t border-gray-200">
                                            <dl>
                                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Facultad
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="facultad">
                                                    
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Escuela
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="escuela">
                                                        
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Especialidad
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="escuela">
                                                        
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Código Universitario
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="codigo_universitario">
                                                    
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Año de ingreso
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="ingreso">
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2 mb-4">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="overflow-hidden">
                                        <div class="py-2">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Información de contacto
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            </p>
                                        </div>
                                        <div class="border-t border-gray-200">
                                            <dl>
                                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Dirección actual
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="direccion">
                                                    
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Lugar de nacimiento
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="lugar_nacimiento">
                                                    
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Celular
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="celular">
                                                        73134712
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Teléfono
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="telefono">
                                                    
                                                    </dd>
                                                </div>
                                                <div class="border-t border-gray-50"></div>
                                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Correo electrónico
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="correo">
                                                        
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
            </div>
        </main>
    </main>
</template>
<script>
import {
    TPagination,
    } from 'vue-tailwind/dist/components';
import XLSX from 'xlsx';
export default {
    data() {
        return {
            /** Arrays*/
            arrayAlumnos:[],
            arrayFacultades:[],
            arrayEscuelas:[],
            /** Opciones*/
            filtro:'dni',
            dato:'',
            facultades:'',
            escuelas:'',
            /*pagination*/
            page_number:1,
            rows:0,
            pagina:'',
            /** Alumno */
            arrayAlumno:[],
            id_alumno:0,
            nombres:'',
            apellidoPaterno:'',
            apellidoMaterno:'',
            dni:'',
            escuela:'',
            facultad:'',
            ingreso:'',
            modificacion:'',
            validacion:'',
            /** INFORMACION PERSONAL*/
            arrayInformacion:[],
            genero:'',
            fecha_nacimiento:'',
            edad:'',
            codigo_universitario:'',
            direccion:'',
            celular:'',
            telefono:'',
            correo:'',
            foto:'',
            lugar_nacimiento:'',
            estado_civil:'',
            
        }
    },
    components: {
        TPagination,
    },
    methods: {
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
        limpiarfiltro(){
        },
        convertDateFormat(string) {
            var info = string.split('-').reverse().join('/');
            return info;
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
        verAlumno(id_alumno){
            let me=this;
            var url= '/alumno';
            axios.post(url,{'id_alumno':id_alumno}).then(function (response) {
                let respuesta = response.data;
                me.arrayAlumno=respuesta;
                if(me.arrayAlumno.length>0){
                    me.id_alumno=id_alumno;
                    me.nombres=me.arrayAlumno[0]['nombres'];
                    me.apellidoPaterno=me.arrayAlumno[0]['apellidopaterno'];
                    me.apellidoMaterno=me.arrayAlumno[0]['apellidomaterno'];
                    me.dni=me.arrayAlumno[0]['dni'];
                    me.escuela=me.arrayAlumno[0]['escuela'];
                    me.facultad=me.arrayAlumno[0]['facultad'];
                    me.ingreso=me.arrayAlumno[0]['ingreso'];
                    me.informacionPersonal(id_alumno);
                    me.pagina=1;
                    me.modificacion=me.arrayAlumno[0]['modificar'];
                    me.validacion=me.arrayAlumno[0]['validar'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        informacionPersonal(id_alumno){
            let me=this;
            var url= '/informacionPersonal';
            axios.post(url,{'id_alumno':id_alumno}).then(function (response) {
                let respuesta = response.data;
                me.arrayInformacion=respuesta;
                if(me.arrayInformacion.length>0){
                    me.genero=me.arrayInformacion[0]['genero'];
                    if(me.genero==0){
                        me.genero='FEMENINO';
                    }else{
                        me.genero='MASCULINO';
                    }
                    me.estado_civil=me.arrayInformacion[0]['estado_civil'];
                    me.fecha_nacimiento=me.convertDateFormat(me.arrayInformacion[0]['fecha_nacimiento']);
                    me.edad = me.calcularEdad(me.arrayInformacion[0]['fecha_nacimiento']);
                    me.codigo_universitario=me.arrayInformacion[0]['codigo_universitario'];
                    me.direccion=me.arrayInformacion[0]['direccion']+' / '+me.arrayInformacion[0]['distrito_direccion'];
                    me.telefono=me.arrayInformacion[0]['telefono'];
                    me.celular=me.arrayInformacion[0]['celular'];
                    me.correo=me.arrayInformacion[0]['correo'];
                    me.lugar_nacimiento=me.arrayInformacion[0]['region']+' / '+me.arrayInformacion[0]['provincia'] +' / '+me.arrayInformacion[0]['distrito'];
                    me.foto=me.arrayInformacion[0]['foto'];
                    me.modificacion=me.convertDateFormat(me.arrayInformacion[0]['modificar']);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        fichaSocial(){
             let me=this;
            var url= '/fichaSocial';
           axiPDF.post(url,{'id_alumno':me.id_alumno}).then(function (response) {
               alert('si we');
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        exportExcel(){
            
            var d = new Date()
            var y= d.getFullYear();
            var mes= d.getMonth();
            var dia = d.getDate();
            let me= this;
            var url= '/Exportalumnos';
            axios.post(url,{ 'filtro':me.filtro, 'dato':me.dato, 'facultad': me.facultades, 'escuela': me.escuelas}).then(function (response) {
                let respuesta = response.data;
                var arrayExport=respuesta;
                const fileName = 'Reporte Alumnos '+y+'-'+(mes+1)+'-'+(dia)+'.xlsx';
                const ws = XLSX.utils.json_to_sheet(arrayExport);
                /** TOTAL**/
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws,'Reporte Alumnos');
                XLSX.writeFile(wb, fileName);
            
            })
            .catch(function (error) {
                console.log(error);
            });
            
        
        },
        validarDatos(){
            let me=this;
            var url= '/validarDatos';
            swal({
                    title: '¿Estás seguro?',
                    text: "Se validara la Informacion ",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        let me = this;
                        axios.put(url,{
                            'id_alumno': me.id_alumno
                        }).then(function (response) {
                            
                            if(response.data==1){
                                swal(
                                'validado!!!',
                                'Los datos se validaron',
                                'success'
                                );
                                me.verAlumno(me.id_alumno);
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
    mounted() {
        this.Alumnos();
        this.Facultades();
    },
}
</script>