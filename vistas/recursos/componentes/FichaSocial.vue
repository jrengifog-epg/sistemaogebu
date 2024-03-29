<template>
    <main v-if="pagina==0">
        <t-modal v-model="$root.show" :hideCloseButton="true" >    
            <template v-slot:header >
                <div class=" w-full flex flex-col p-4 "> 
                    <h2 class="text-sm leading-6 font-medium text-blue-600" >
                        ESTIMADO ALUMNO(A):
                    </h2>
                    <h3 class="text-lg leading-6 font-medium text-gray-800" v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></h3>
                </div>
            </template>
            <template v-slot:default>
                <div class="mt-3  sm:mt-0  sm:text-left">
                    <div class="mt-2 px-8">
                        <p class="text-sm text-gray-500">
                            La Universidad Nacional de la Amazonía Peruana a través de la Dirección de Bienestar Universitario 
                            se complace en darte la más cordial bienvenida a este claustro universitario, que te albergará 
                            durante los años que dure tu formación profesional.
                            De acuerdo a la normatividad (Ley 30220), esta Dirección brinda servicios complementarios de obligatorio 
                            cumplimiento (indicadores 43, 44, 45,46 y 47) que te ayudará en la formación académica, durante los años 
                            que realices tus estudios.
                            
                        </p>
                        <p class="text-sm text-gray-500 pt-4">
                            Para poder cumplir esta función cada estudiante deberá llenar los formularios que se encuentran en este aplicativo, 
                            donde ingresaras tu información personal a través de las fichas de salud, social-económica, nutricional y 
                            psicopedagógica.
                        </p>
                    </div>
                </div>
            </template>
            <template v-slot:footer class="rounded-lg rounded-b">
                <div class="flex justify-end ">
                    <button type="button" @click="$root.show=false"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-3 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                ACEPTAR
                    </button>
                </div>
            </template>
        </t-modal>
        <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" >
            <div class="flex flex-col md:flex-row">
                <div class="flex-col w-full">
                    <h3 class="text-2xl">Ficha social del estudiante</h3>
                    <p class="text-sm text-gray-500 mt-2 mb-4">La información que consignes en esta ficha debe ajustarse a la verdad y
                        nos servirá como base para poderte entregar un servicio eficiente y eficaz.</p>
                </div>
                <div class="flex md:w-4/12 justify-end items-center mb-4 hidden">
                    <a href="#" class="text-white hover:text-red-600 bg-blue-400 rounded-lg px-3 py-2"  @click="generarPdf()" v-if=" (tabnext1==1) && (tabnext2==1) && (tabnext3==1) && (tabnext4==1) && (tabnext5==1) && (tabnext6==1) && (tabnext7==1)">Descargar Constancia</a>
                </div>
            </div>
            <div class="w-full flex flex-col sm:flex-row">
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                    <div class="bg-ficha-personal h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=1" v-if="tabnext1==0">Información Personal</a>
                            <a href="#"  v-else-if="tabnext1 > 0 ">Información Personal</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext1==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext1==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext1 > 0">Completado</p>
                        <div class=" flex" v-if="tabnext1 > 0">
                            <div class="border-2 w-full rounded h-1 border-green-400 my-2 " >
                            </div>
                            <div class=" ml-2 -mt-4 rounded-full   px-3 py-1"> 
                                <a href="#"   @click="Update(1)" title="Modificar Información"><i class="fas fa-pen text-yellow-400"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                    <div class="bg-ficha-educacion h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=2" v-if="tabnext2==0">Información Educacional</a>
                            <a href="#"  v-else-if="tabnext2  > 0" >Información Educacional</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext2==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext2==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext2  > 0">Completado</p>
                        <div class=" flex" v-if="tabnext2  > 0">
                            <div class="border-2 w-full rounded h-1 border-green-400 my-2 " >
                            </div>
                            <div class=" ml-2 -mt-4 rounded-full   px-3 py-1"> 
                                <a href="#"   @click="Update(2)" title="Modificar Información"><i class="fas fa-pen text-yellow-400"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm">
                    <div class="bg-ficha-familia h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=3" v-if="tabnext3==0">Información Familiar</a>
                            <a href="#"  v-else-if="tabnext3  > 0">Información Familiar</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext3==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext3==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext3  > 0">Completado</p>
                        <div class=" flex" v-if="tabnext3  > 0">
                            <div class="border-2 w-full rounded h-1 border-green-400 my-2 " >
                            </div>
                            <div class=" ml-2 -mt-4 rounded-full   px-3 py-1"> 
                                <a href="#"   @click="Update(3)" title="Modificar Información"><i class="fas fa-pen text-yellow-400"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:ml-4">
                    <div class="bg-ficha-economica h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=4" v-if="tabnext4==0">Información Económica</a>
                            <a href="#"  v-else-if="tabnext4  > 0">Información Económica</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext4==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext4==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext4  > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext4==1"></div>
                    </div>
                </div>
            </div>
            <div class="flex sm:mt-4 flex-col sm:flex-row">
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                    <div class="bg-ficha-vivienda h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=5" v-if="tabnext5==0">Información de vivienda</a>
                            <a href="#"  v-else-if="tabnext5  > 0">Información de vivienda</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext5==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext5==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext5  > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext5==1"></div>
                    </div>
                </div>
                <!--<div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                    <div class="bg-ficha-salud h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=6" v-if="tabnext6==0">Información de salud</a>
                            <a href="#"  v-else-if="tabnext6==1">Información de salud</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext6==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext6==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext6==1">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext6==1"></div>
                    </div>
                </div>-->
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm">
                    <div class="bg-ficha-deportes h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#"></a>
                            <a href="#" @click="pagina=7" v-if="tabnext7==0">Recreación y cultura</a>
                            <a href="#"  v-else-if="tabnext7  > 0">Recreación y cultura</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col">
                        <p class="text-xs text-gray-500" v-if="tabnext7==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext7==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext7  > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext7 > 0"></div>
                    </div>
                </div>
                <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:ml-4">
                    <div class="bg-ficha-resultados h-36 p-4 flex items-end rounded-t-xl">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="$root.menu=4">Perfil del Estudiante</a>
                        </h4>
                    </div>
                    <div class="px-4 flex items-center h-12">
                        <p class="text-xs text-gray-500">Datos Personales</p>
                        
                    </div>
                </div>
            </div>
        </main>
        <template>
            <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="false"
            :paginate-elements-by-height="1100"
            :filename="'CONSTANCIA FICHA SOCIAL-'+dni"
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
                            <div class="w-6/12 flex-row text-center -ml-44 pt-6">
                                <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                <h1 class="text-md pt-6"><i><b><u>CONSTANCIA</u></b></i></h1>
                            </div>
                            <div class="w-3/12 ml-2">
                                <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60"/>
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex w-7/12">
                            <div class="w-full flex-row  text-justify">
                                <p class="text-sm"><i>El area de Servicio Social, hace constar que el (la) alumno (a) <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b>
                                de la facultad de <b><span v-text="facultad"></span></b>, Escuela Profesional de <b><span v-text="escuela"></span></b> ha cumplido con la Entrevista Personal y el 
                                llenado de la ficha Socio Económica.  </i></p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-7/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-social.jpg'" alt="" width="250"/>
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
                    <div v-else   class="pc ml-8">
                        <div class="mt-14 ml-14 flex w-full">
                            <div class="w-3/12">
                                <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                            </div>
                            <div class="w-6/12 flex-row text-center -ml-44 pt-6">
                                <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                <h1 class="text-md pt-6"><i><b><u>CONSTANCIA</u></b></i></h1>
                            </div>
                            <div class="w-3/12 ml-2">
                                <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60"/>
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex w-7/12">
                            <div class="w-full flex-row  text-justify">
                                <p class="text-sm"><i>El area de Servicio Social, ,hace constar que el (la) alumno (a) <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b>
                                de la facultad de <b><span v-text="facultad"></span></b>, Escuela Profesional de <b><span v-text="escuela"></span></b> ha cumplido con la Entrevista Personal y el 
                                llenado de la ficha Socio Económica.  </i></p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-7/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-social.jpg'" alt="" width="250"/>
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
                </section>
            </vue-html2pdf>
        </template>
    </main>
    
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==1">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información personal</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información personal</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Foto de perfil
                                    </label>
                                </div>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <div class="text-center w-full ml-8">
                                            <img class="" width="150px" height="180px" :src="avatar" alt="Imagen de Productos" @click="subirImagen()">
                                            <input type="file" accept="image/*" ref="file" style="display: none" @change="getImage">
                                        </div>
                                        <div class="flex text-sm text-gray-700">
                                            <label for="file-upload"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Subir un archivo</span>
                                            </label>
                                            <p class="pl-1">o arrastrar y soltar</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6 py-5">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">Apellido
                                            paterno</label>
                                        <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="apellidoPaterno" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido
                                            materno</label>
                                        <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="apellidoMaterno" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email_address"
                                            class="block text-sm font-medium text-gray-700">Nombres</label>
                                        <input type="text" name="email_address" id="email_address" autocomplete=""
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="nombres" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                                        <input type="text" name="dni" id="dni" autocomplete="family-name"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="dni" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="nacimiento" class="block text-sm font-medium text-gray-700">Fecha
                                            nacimiento</label>
                                        <input type="date" name="state" id="nacimiento"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  v-model="fecha_nacimiento" @change="calcularEdad()" >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                                        <input type="text" name="postal_code" id="edad" autocomplete="edad"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="edad" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="estado-civil" class="block text-sm font-medium text-gray-700">Estado
                                            civil</label>
                                        <select id="estado-civil" name="country" autocomplete="estado civil"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="estado_civil">
                                            <option value="1">Soltero</option>
                                            <option value="2">Conviviente</option>
                                            <option value="3">Separado(a)</option>
                                            <option value="4">Casado(a)</option>
                                            <option value="5">Divorciado(a)</option>
                                            <option value="6">Viudo(a)</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label for="genero" class="block text-sm font-medium text-gray-700">Genero</label>
                                        <select id="genero" name="country" autocomplete="genero"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="sexo">
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Masculino</option>
                                            <option value="0">Femenino</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="ingreso"
                                            class="block text-sm font-medium text-gray-700">Año de ingreso</label>
                                        <input type="text" name="ingreso" id="ingreso" autocomplete="ingreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-gray-500" v-model="ingreso" :readonly="true">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="facultad"
                                            class="block text-sm font-medium text-gray-700">Facultad</label>
                                        <input id="facultad"  autocomplete="facultad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-500" v-model="facultad" :readonly="true" />
                                            
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="escuela" class="block text-sm font-medium text-gray-700">Escuela</label>
                                        <input id="escuela"  autocomplete="escuela" type="text"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-500" v-model="escuela" :readonly="true" >
                                            
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="especialidad" class="block text-sm font-medium text-gray-700">Especialidad</label>
                                        <input id="especialidad" autocomplete="especialidad" type="text"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-500" v-model="escuela" :readonly="true">
                                        
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="codigo_universitario" class="block text-sm font-medium text-gray-700">Código
                                            universitario</label>
                                        <input type="text"  id="codigo_universitario" autocomplete="DNI"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Si es ingresante escribir su dni" v-model="codigo_universitario">
                                    </div>

                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-700">Lugar de nacimiento</legend>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="departamento" class="block text-sm font-medium text-gray-700">Region</label>
                                        <select id="departamento"  autocomplete="departamento"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="region_nacimiento" @change="provincia_nac()">
                                                <option value="">--Region--</option>
                                                <option v-for='region in  arrayRegion' :key="region.cod_region" :value="region.cod_region" v-text="region.nombre_ubigeo" ></option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="provincia"
                                            class="block text-sm font-medium text-gray-700">Provincia</label>
                                        <select id="provincia"  autocomplete="provincia" 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="provincia_nacimiento" @change="distrito_nac()">
                                                <option value="">--Provincia--</option>
                                                <option v-for='provincia in  arrayProvincia' :key="provincia.cod_provincia" :value="provincia.cod_provincia" v-text="provincia.nombre_ubigeo"></option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="distrito"
                                            class="block text-sm font-medium text-gray-700">Distrito</label>
                                        <select id="distrito" name="country" autocomplete="distrito"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="distrito_nacimiento">
                                                <option value="">--Distrito--</option>
                                                <option v-for='distrito in  arrayDistrito' :key="distrito.cod_distrito" :value="distrito.cod_distrito" v-text="distrito.nombre_ubigeo"></option>
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-700">Dirección actual</legend>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street_address" class="block text-sm font-medium text-gray-700">Dirección</label>
                                        <input type="text" name="street_address" id="street_address"
                                            autocomplete="street-address"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="direccion">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="referencia"
                                            class="block text-sm font-medium text-gray-700">Referencia (las calles con las que colinda su dirección)</label>
                                        <input type="text" name="postal_code" id="referencia" autocomplete="referencia"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="referencia">
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="departamento" class="block text-sm font-medium text-gray-700">Region</label>
                                        <select id="departamento" name="country" autocomplete="departamento"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="region_procedencia" @change="provincia_dir()">
                                                <option value="">--Region--</option>
                                                <option v-for='region in  arrayRegionDir' :key="region.cod_region" :value="region.cod_region" v-text="region.nombre_ubigeo" ></option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="provincia"
                                            class="block text-sm font-medium text-gray-700">Provincia</label>
                                        <select id="provincia" name="country" autocomplete="provincia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="provincia_procedencia" @change="distrito_dir()">
                                                <option value="">--Provincia--</option>
                                                <option v-for='provincia in  arrayProvinciaDir' :key="provincia.cod_provincia" :value="provincia.cod_provincia" v-text="provincia.nombre_ubigeo"></option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="distrito"
                                            class="block text-sm font-medium text-gray-700">Distrito</label>
                                        <select  v-model="distrito_procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="">--Distrito--</option>
                                                <option v-for='distrito in  arrayDistritoDir' :key="distrito.cod_distrito" :value="distrito.cod_distrito" v-text="distrito.nombre_ubigeo"></option>
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-700">Lugar de procedencia</legend>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="procedencia"
                                            class="block text-sm font-medium text-gray-700">Procedencia</label>
                                        <input type="text" name="procedencia" id="procedencia"
                                            autocomplete="street-address"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="lugar">
                                    </div>
                                    <div class="col-span-6">    
                                        <legend class="text-base font-medium text-gray-700">Teléfonos</legend>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="celular"
                                            class="block text-sm font-medium text-gray-700">Celular</label>
                                        <input type="tel" name="celular" id="celular" autocomplete="celular"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="celular">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="telefono-fijo"
                                            class="block text-sm font-medium text-gray-700">Teléfono fijo</label>
                                        <input type="tel" name="celular" id="telefono-fijo" autocomplete="celular"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="telefono">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="correo"
                                            class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                        <input type="email" name="correo" id="correo" autocomplete="correo"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="correo">
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" v-if="tipoAccion==1"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="guardarInfoPersonal()" >
                                    Guardar
                                </button>
                                <button type="button" v-if="tipoAccion==2"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"  @click="modificarInfoPersonal()" >
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==2">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información educacional y de proyección</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información educacional y de
                            proyección</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">
                                    
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Fecha egreso
                                            secundaria</label>
                                        <input type="date" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="fecha_secundaria">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Colegio
                                            de procedencia</label>
                                        <select id="colegio-procedencia" name="colegio-procedencia"
                                                autocomplete="colegio procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="colegio">
                                            <option value="">--PROCEDENCIA--</option>
                                            <option value="1">Público / Estatal</option>
                                            <option value="2">FFAA/PNP</option>
                                            <option value="3">Preuniversitario</option>
                                            <option value="4">Parroquial</option>
                                            <option value="5">Particular</option>
                                            <option value="6">Otro</option>
                                        </select>
                                    </div>

                                    <!-- <div class="col-span-6 sm:col-span-2">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si selecciona otros"  v-model="especificacion_colegio">
                                    </div> -->

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="modalidad" class="block text-sm font-medium text-gray-700">Modalidad de
                                            ingreso a la UNAP</label>
                                        <select id="modalidad" name="colegio-procedencia" autocomplete="modalidad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="modalidad">
                                            <option value="">--Modalidad--</option>
                                            <option value="15">General</option>
                                            <option value="1">1° y 2° Puesto IE</option>
                                            <option value="2">1° y 2° Puesto IE Frontera</option>
                                            <option value="3">Comunidades Indígenas</option>
                                            <option value="4">Victimas del Terrorismo</option>
                                            <option value="5">Traslado Interno</option>
                                            <option value="6">Traslado Externo</option>
                                            <!-- <option value="7">Convenio IPAE</option>
                                            <option value="8">Convenio IST PADAH</option>
                                            <option value="9">Tercio Superior 5º Sec.</option> -->
                                            <option value="10">Discapacitados</option>
                                            <option value="11">Deportistas Calificado</option>
                                            <option value="12">Profesionales</option>
                                            <option value="13">CEPREUNAP</option>
                                            <option value="14">COAR</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Preparación universitaria</label>
                                        <select id="preparacion" name="colegio-procedencia" autocomplete="preparacion"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="preparacion">
                                            <option value="">--PREPARACION--</option>
                                            <option value="1">Academia</option>
                                            <option value="2">Círculo de estudios</option>
                                            <option value="3">CEPREUNA</option>
                                            <option value="4">Casa</option>
                                            <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <!-- <div class="col-span-6 sm:col-span-2">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si selecciona otros"  v-model="especificacion_preparacion">
                                    </div> -->

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Señale 3 Aspectos importantes que tenga la Universidad</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto1" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto1" class="font-medium text-gray-700">Infraestructura y mobiliarios adecuados adecuados</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto2" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto2" class="font-medium text-gray-700">Calidad en a enseñanza</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto3" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto3" class="font-medium text-gray-700">Exigencia académica o educativa</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto4" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto4" class="font-medium text-gray-700">Transparencia administrativa</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto5" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto5" class="font-medium text-gray-700">Tutoria y orientacion academica o educativa</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto6" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto6" class="font-medium text-gray-700">Espacios recreativos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto7" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto7" class="font-medium text-gray-700">Buen trato</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto8" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto8" class="font-medium text-gray-700">Medios de información y difusión (boletines, revistas, radio, Tv)

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="aspecto9" name="aspecto" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="aspectos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="aspecto9" class="font-medium text-gray-700">Profesores competentes y con valores
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">¿Ha realizado otros estudios?</legend>
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-center">
                                                    <input id="push_everything" name="push_notifications" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="1" v-model="otros_estudios">
                                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="push_email" name="push_notifications" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="0" v-model="otros_estudios">
                                                    <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="otros_estudios==1">
                                        <label for="estudios" class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <select id="estudios" name="country" autocomplete="estudios"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="tipo_estudio">
                                            <option value="" >--</option>
                                            <option value="1" >Completo</option>
                                            <option value="0" >Incompleto</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="otros_estudios==1">
                                        <label for="tipo-estudios" class="block text-sm font-medium text-gray-700">Tipo de estudios</label>
                                        <select id="tipo-estudios" name="country" autocomplete="estudios"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="estudio">
                                             <option value="" selected>--Estudios--</option>
                                            <option value="1">Cursos o carreras cortas (menos de 1 año)</option>
                                            <option value="2">Instituto superior</option>
                                            <option value="3">Estudios Universitarios</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="otros_estudios==1">
                                        <label for="tipo-estudios-nombre" class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="ingreso" id="tipo-estudios-nombre" autocomplete="ingreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique Estudio" v-model="especificacion_estudio" >
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="otros_estudios==1">
                                        <label for="nivel" class="block text-sm font-medium text-gray-700">Nivel alcanzado</label>
                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_estudio">
                                                <option value="" selected>--Nivel--</option>
                                                <option value="1">Egresado</option>
                                                <option value="2">Bachiller</option>
                                                <option value="3">Titulado</option>
                                                <option value="4">Incompleto</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">¿Estudia actualmente en otra Universidad o Instituto Superior Tecnológico o Pedagógico?</legend>
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-center">
                                                    <input id="p1" name="uni" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="1" v-model="otra_universidad">
                                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="p2" name="uni" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="0" v-model="otra_universidad">
                                                    <label for="p2" class="ml-3 block text-sm font-medium text-gray-700">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6" v-if="otra_universidad==1">
                                        <label for="univer" class="block text-sm font-medium text-gray-700">Especifique Universdad</label>
                                        <input type="text" name="ingreso" id="univer" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="especificacion_universidad">
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">¿Domina otro idioma ademas del Castellano?</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="arrayidiomas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Inglés</label>
                                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_idioma[0]">
                                                                <option value="" selected>--Nivel--</option>
                                                                <option value="1">Basico</option>
                                                                <option value="2">Intermedio</option>
                                                                <option value="3">Avanzado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="arrayidiomas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Frances</label>
                                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_idioma[1]">
                                                                <option value="" selected>--Nivel--</option>
                                                                <option value="1">Basico</option>
                                                                <option value="2">Intermedio</option>
                                                                <option value="3">Avanzado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="arrayidiomas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Alemán</label>
                                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_idioma[2]">
                                                                <option value="" selected>--Nivel--</option>
                                                                <option value="1">Basico</option>
                                                                <option value="2">Intermedio</option>
                                                                <option value="3">Avanzado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="arrayidiomas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Portugues</label>
                                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_idioma[3]">
                                                                <option value="" selected>--Nivel--</option>
                                                                <option value="1">Basico</option>
                                                                <option value="2">Intermedio</option>
                                                                <option value="3">Avanzado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="arrayidiomas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Lengua Amazónica</label>
                                                        <select id="nivel" name="country" autocomplete="estado civil"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="nivel_idioma[4]">
                                                                <option value="" selected>--Nivel--</option>
                                                                <option value="1">Basico</option>
                                                                <option value="2">Intermedio</option>
                                                                <option value="3">Avanzado</option>
                                                        </select>
                                                         <div class="flex items-center h-5 pt-5">
                                                            <input type="text"  
                                                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique Lengua amazonica"  v-model="especificacion_idioma">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">¿Usted trabaja?</legend>
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-center">
                                                    <input  type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="1" v-model="trabajo">
                                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input  type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300" value="0" v-model="trabajo">
                                                    <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6 sm:col-span-2" v-if="trabajo==1">
                                        <label for="estado-civil" class="block text-sm font-medium text-gray-700">¿Cuanto gana?</label>
                                        <input type="text" name="ingreso" id="ingreso" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="sueldo">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2" v-if="trabajo==1">
                                        <label for="genero" class="block text-sm font-medium text-gray-700">Centro de trabajo</label>
                                        <input type="text" 
                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="centro_trabajo">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2" v-if="trabajo==1">
                                        <label for="ingreso"
                                            class="block text-sm font-medium text-gray-700">Puesto</label>
                                        <input type="text" name="ingreso" id="ingreso" autocomplete="ingreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="cargo">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="trabajo==1">
                                        <label for="facultad"
                                            class="block text-sm font-medium text-gray-700">Condición laboral</label>
                                        <select id="facultad" name="country" autocomplete="facultad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="condicion">
                                            <option value="">--</option>
                                            <option value="1">Estable</option>
                                            <option value="2">Eventual</option>
                                            <option value="3">Trabajo por horas</option>
                                            <option value="4">Trabajo familiar no remunerado</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 " >
                                        <label for="escuela" class="block text-sm font-medium text-gray-700">¿De quién depende económicamente?</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"   v-model="dependencia_economica">
                                            <option value="">--</option>
                                            <option value="1">Padre</option>
                                            <option value="2">Madre</option>
                                            <option value="3"> Otros familiares</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 ">
                                        <label for="especialidad" class="block text-sm font-medium text-gray-700">¿Recibe pensión?</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="pension">
                                            <option value="">--</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="pension==1">
                                        <label for="estado-civil" class="block text-sm font-medium text-gray-700">¿Cuanto?</label>
                                        <input type="text" name="ingreso" id="ingreso" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="monto">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3" v-if="pension==1">
                                        <label for="facultad"
                                            class="block text-sm font-medium text-gray-700">¿Con que frecuencia?</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"  v-model="frecuencia">
                                            <option value="">--</option>
                                            <option value="1">Semanal</option>
                                            <option value="2">Quincenal</option>
                                            <option value="3">Mensual</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" v-if="tipoAccion==1"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="guardarInfoEducacional()">
                                    Guardar
                                </button>
                                <button type="button" v-if="tipoAccion==2"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"  @click="modificarInfoEducacional()" >
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main> 
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==3">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información familiar</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información familiar</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">
                                    
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Composición familiar</legend>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Nombres y Apellidos</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="familiar">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Fecha nacimiento</label>
                                        <input type="date" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="parienteEdad">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="parentesco">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Estado civil</label>
                                        <select id="modalidad" name="colegio-procedencia" autocomplete="modalidad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="pariente_civil">
                                                <option value="" >--Estado civil--</option>
                                                <option value="soltero(a)" >Soltero(a)</option>
                                                <option value="casado(a)" >Casado(a)</option>
                                                <option value="conviviente" >Conviviente</option>
                                                <option value="separado(a)" >Separado(a)</option>
                                                <option value="viudo(a)" >Viudo(a)</option>
                                                <option value="divorciado(a)" >Divorciado(a)</option>

                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="modalidad" class="block text-sm font-medium text-gray-700">Grado Instrucción</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="grado_instruccion">
                                                <option value="" >--Grado instruccion--</option>
                                                <option value="sin estudios" >Sin estudios</option>
                                                <option value="Primaria" >Primaria</option>
                                                <option value="Secundaria" >Secundaria</option>
                                                <option value="Tecnico" >Tecnico</option>
                                                <option value="Universitario" >Universitario</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Ocupación</label>
                                        <input type="text"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="ocupacion">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Centro Laboral</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="centro_laboral">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Ingresos S/.</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="ingreso_pariente">
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-0">
                                        <button type="button"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="addPariente()">
                                            Añadir
                                        </button>
                                    </div>

                                    <div class="col-span-6">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Nombre y Apellidos
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                F. nacimiento
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Parentesco
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Estado Civil
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                G. Instruccion
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Ocupación
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Centro laboral
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Ingresos (S/)
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200" v-if="arrayParientes.length > 0">
                                                        <tr v-for="(t,index) in arrayParientes">
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.familiar">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.parienteEdad">
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.parentesco">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.pariente_civil">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.grado_instruccion">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.ocupacion">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500"v-text="t.centro_laboral">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500" v-text="t.ingreso">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm text-gray-500">
                                                                            <a  href="#" @click="eliminarPariente(index)" class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">eliminar</a>
                                                                        </div>
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
                                                                        No hay Registro de Parientes
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>           
                                </div>
                            </div>

                            <!--<div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">

                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Si procede de otra localidad, ¿con quienes vives?</legend>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Nombres y Apellidos</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="familiar2">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Fecha nacimiento</label>
                                        <input type="date" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="parienteEdad2">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="parentesco2">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Estado civil</label>
                                        <select id="modalidad" name="colegio-procedencia" autocomplete="modalidad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="pariente_civil2">
                                                <option value="" >--Estado civil--</option>
                                                <option value="soltero(a)" >Soltero(a)</option>
                                                <option value="casado(a)" >Casado(a)</option>
                                                <option value="conviviente" >Conviviente</option>
                                                <option value="separado(a)" >Separado(a)</option>
                                                <option value="viudo(a)" >Viudo(a)</option>
                                                <option value="divorciado(a)" >Divorciado(a)</option>

                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="modalidad" class="block text-sm font-medium text-gray-700">Grado Instrucción</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="grado_instruccion2">
                                                <option value="" >--Grado instruccion--</option>
                                                <option value="sin estudios" >Sin estudios</option>
                                                <option value="Primaria" >Primaria</option>
                                                <option value="Secundaria" >Secundaria</option>
                                                <option value="Tecnico" >Tecnico</option>
                                                <option value="Universitario" >Universitario</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Ocupación</label>
                                        <input type="text"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="ocupacion2">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Centro Laboral</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="centro_laboral2">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="preparacion" class="block text-sm font-medium text-gray-700">Ingresos S/.</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="ingreso_pariente2">
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-0">
                                        <button type="button"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="addPariente2()">
                                            Añadir
                                        </button>
                                    </div>
                                    <div class="col-span-6">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Nombre y Apellidos
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                F. nacimiento
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Parentesco
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Estado Civil
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                G. Instruccion
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Ocupación
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Centro laboral
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Ingresos (S/)
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200" v-if="arrayParientes2.length > 0">
                                                        | <tr v-for="(t,index) in arrayParientes2">
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.familiar">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.parienteEdad">
                                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.parentesco">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.pariente_civil">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.grado_instruccion">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.ocupacion">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500"v-text="t.centro_laboral">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500" v-text="t.ingreso">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="ml-4">
                                                                            <div class="text-sm text-gray-500">
                                                                                <a  href="#" @click="eliminarPariente2(index)" class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">eliminar</a>
                                                                            </div>
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
                                                                            No hay Registro de Parientes
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>           
                                </div>
                            </div>-->

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">

                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Si no vive con sus padres indique</legend>
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Lugar de residencia del Padre</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="residencia_padre">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Dirección</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="direccion_padre">
                                    </div>      
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="telefono_padre">
                                    </div>      
                                </div>

                                <div class="grid grid-cols-6 gap-6 py-5">

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Lugar de residencia de la Madre</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="residencia_madre">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Dirección</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="direccion_madre">
                                    </div>      
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="telefono_madre">
                                    </div>      
                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" v-if="tipoAccion==1" @click="guardarInfoFamiliar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Guardar
                                </button>
                                <button type="button" v-if="tipoAccion==2"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"  @click="modificarInfoFamiliar()" >
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==4">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información Economica</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información Economica</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">

                                <div class="grid grid-cols-6 gap-6 py-5">
                                    
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Ingresos extras al presupuesto principal de la familia</legend>
                                    </div>

                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Alquiler de inmueble S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="alquiler_inmueble" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Alquiler de vehiculos S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="alquiler_vehiculos" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Trabajos eventuales S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="trabajos_eventuales" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Negocio Propio S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="negocio_propio" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Sueldos S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="sueldo" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Pension de viudez S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="pension_viudez" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Pension de orfandad S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="pension_orfandad" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Pension por incapacidad S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="pension_incapacidad" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Pension alimenticia S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="pension_alimenticia" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Envio del extranjero S/: </label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="envio_extranjero" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Envio de Provincias S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="envio_provincias" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Otros S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="ingresos_otros" @change="calcularIngreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-base font-bold text-gray-700">Monto total S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="monto_ingreso" :readonly="true">
                                    </div>

                                </div>

                                <div class="grid grid-cols-6 gap-6 py-5">
                                    
                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Egresos de la familia: Gastos mensuales en:</legend>
                                    </div>

                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Alimentación S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  v-model="alimentacion" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Agua S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="agua" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Utiles de Limpieza S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="limpieza" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Vivienda S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="vivienda" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Telefono S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  v-model="egreso_telefono" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Pago de Prestamos S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="prestamos" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Educación S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="educacion" @chage="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Cable S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="cable" @change="calcunlarEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Recreación S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="recreacion" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Transporte S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="transporte" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Internet S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="internet" @change="calcularEgreso()" >
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Luz S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="luz" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-3">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Salud S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="salud" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-3">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Otros S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="egresos_otros" @change="calcularEgreso()">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="egreso" class="block text-base font-bold text-gray-700">Monto total S/:</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="monto_egreso" :readonly="true">
                                    </div>

                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarInfoEconomia()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==5">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información de Vivienda</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información de Vivienda</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-base font-medium text-gray-900">Tenencia</label>
                                        <select id="colegio-procedencia" name="colegio-procedencia"
                                                autocomplete="colegio procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="tenencia">
                                                <option value="">--Tenencia--</option>
                                                <option value="1">Propia</option>
                                                <option value="2">Agregado(a)</option>
                                                <option value="3">Alquilada</option>
                                                <option value="4">Guardiania</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Define si marca otro" v-model="especificacion_tenencia"> 
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="otro-1"
                                            class="block text-base font-medium text-gray-900">N° de pisos que tiene la vivienda</label>
                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0"  v-model="numero_pisos" >
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="colegio-procedencia" class="block text-base font-medium text-gray-900">Tipo</label>
                                        <select id="colegio-procedencia" name="colegio-procedencia"
                                                autocomplete="colegio procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="tipo_vivienda" >
                                                <option value="">--Tipo--</option>
                                                <option value="1">Independiente</option>
                                                <option value="2">Quinta</option>
                                                <option value="3">Departamento</option>
                                                <option value="4">Cuarto de vivienda</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Material de construccion</label>
                                        <select id="colegio-procedencia" name="colegio-procedencia"
                                                autocomplete="colegio procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="material_vivienda" >
                                                <option value="1">Noble</option>
                                                <option value="2">Madera</option>
                                                <option value="3">Mixto</option>
                                                <option value="4">Rustico</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="" id="otro-1" autocomplete="otro"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" laceholder="Especifique si marca otros"  v-model="especificacion_vivienda">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Techo</label>
                                        <select id="colegio-procedencia" name="colegio-procedencia"
                                                autocomplete="colegio procedencia"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="techo_material">
                                                <option value="" selected>--Material--</option>
                                                <option value="1">Palma</option>
                                                <option value="2">Calamina</option>
                                                <option value="3">Aligerado</option>
                                                <option value="4">Mixto</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros" v-model="techo_especificacion">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Puertas</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="puerta_material">
                                                <option value="" selected>--Material--</option>
                                                <option value="1">Madera</option>
                                                <option value="2">Fierro</option>
                                                <option value="3">Vidrio</option>
                                                <option value="4">Mixto</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros" v-model="puerta_especificacion">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Ventanas</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="ventana_material">
                                                <option value="" selected>--Material--</option>
                                                <option value="1">Madera</option>
                                                <option value="2">Fierro</option>
                                                <option value="3">Vidrio</option>
                                                <option value="4">Mixto</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="ventana_especificacion">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Piso</label>
                                        <select 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="piso_material">
                                                <option value="" selected>--Material--</option>
                                                <option value="1">Tierra</option>
                                                <option value="2">Madera</option>
                                                <option value="3">Cemento</option>
                                                <option value="4">Mixto</option>
                                                <option value="5">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text" name="" id="otro-1" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="piso_especificacion">
                                    </div>


                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Servicios</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="1">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Agua Potable</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="2">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Desague</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="3">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Teléfono</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="4">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Luz</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="5">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Letrina o silo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="6">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Agua de Pozo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="7">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Servicios Higiénicos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="8">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Cable</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="servicios" value="9">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="especificacion_servicio">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Ambientes de su vivienda</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="1" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Sala</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="2" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Comedor</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="3" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Cocina</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="4" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Baños</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="5" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Sala comedor</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="6" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Comedor Cocina</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="7" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Dormitorios</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="8" >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Un solo ambiente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" v-model="ambientes" value="9">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_ambiente">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Equipamiento</legend>
                                            <p class="text-sm text-gray-600 my-3">Muebles</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Sala</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Comedor</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Cocina</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Baños</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Sala comedor</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Comedor Cocina</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Dormitorios</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Un solo ambiente</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="muebles">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_muebles">
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Cocina</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1"  v-model="cocinas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Carbon</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2"  v-model="cocinas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Leña</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3"  v-model="cocinas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Kerosene</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4"  v-model="cocinas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Gas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5"  v-model="cocinas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Eléctrica</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Artefactos</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Televisor</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Equipo de sonido</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Lavadora</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Juego de video</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Aspiradora</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Licuadora</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Plancha</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Refrigeradora</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Maquina de coser</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Ventilador</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Microondas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="12"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Computadora</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="13"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">DVD</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="14"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Camara Digital</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="15"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Vehiculo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="16"  v-model="artefactos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="candidates" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_artefactos">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>

                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="guardarInfoVivienda()">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==6">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información de Salud y Alimentación</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información de Salud y Alimentación</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">¿Sufre de alguna Enfermedad?</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e1" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e1" class="font-medium text-gray-700">Anemia</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e2" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e2" class="font-medium text-gray-700">Diabetes</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e3" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e3" class="font-medium text-gray-700">Enfermedad psoquiátrica</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e4" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e4" class="font-medium text-gray-700">VIH</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e5" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e5" class="font-medium text-gray-700">Asma</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e6" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e6" class="font-medium text-gray-700">Hipertensión</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e7" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e7" class="font-medium text-gray-700">Enfermedad psicológica</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e8" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="8" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e8" class="font-medium text-gray-700">alergias</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especificar alergias</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca alergias"  v-model="especificacion_alergia">
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e9" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e9" class="font-medium text-gray-700">Cancer</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e10" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e10" class="font-medium text-gray-700">Infección Urinaria</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e11" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e11" class="font-medium text-gray-700">Hepatitis</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e12" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="12" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e12" class="font-medium text-gray-700">Cardiopatia</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e13" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="13" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e13" class="font-medium text-gray-700">ITS</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="e14" name="enfermdedad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="14" v-model="enfermedades">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="e14" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" id="otro-1" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_enfermedad">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">¿Presenta alguna discapacidad?</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d1" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d1" class="font-medium text-gray-700">De piernas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d2" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d2" class="font-medium text-gray-700">De brazos</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d3" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d3" class="font-medium text-gray-700">Sordera</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d4" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d4" class="font-medium text-gray-700">Cegera</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d5" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d5" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
						                        <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d6" name="discapacidad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="discapacidad">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d6" class="font-medium text-gray-700">NO</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" id="otro-1" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_discapacidad">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Enfermedades en la familia</legend>
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="egreso" class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="parentescoEnfermedad">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Enfermedad</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="enfermedad">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="colegio-procedencia" class="block text-sm font-medium text-gray-700">Centro Medico</label>
                                        <input type="text" name="egreso" id="egreso" autocomplete="egreso"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="centro_medico">
                                    </div>

                                    <div class="px-4 py-3  text-left sm:px-0">
                                        <button type="button"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="addParienteEnfermedad()">
                                            Añadir
                                        </button>
                                    </div>

                                    <div class="col-span-6">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead class="bg-gray-50">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        Parentesco
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        Enfermedad
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        Centro medico donde se atiende
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200" v-if="arrayEnfermedadPariente.length > 0">
                                                                <tr class="hover:bg-gray-100 border-b border-gray-200 py-10"  v-for="(e,index) in arrayEnfermedadPariente">
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="flex items-center">
                                                                            <div class="ml-4">
                                                                                <div class="text-sm text-gray-500" v-text="e.parentesco">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="flex items-center">
                                                                            <div class="ml-4">
                                                                                <div class="text-sm text-gray-500" v-text="e.enfermedad">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="flex items-center">
                                                                            <div class="ml-4">
                                                                                <div class="text-sm text-gray-500" v-text="e.centro_medico">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="flex items-center">
                                                                            <div class="ml-4">
                                                                                <div class="text-sm text-gray-500" >
                                                                                    <a  href="#" @click="eliminarParienteEnfermedad(index)" class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">eliminar</a>
                                                                                </div>
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
                                                                                No hay Registro de Parientes
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Lugar donde toma sus alimentos</label>
                                        <select id="modalidad" 
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" v-model="lugar_alimento" >
                                                <option  value="">---</option>
                                                <option  value="1">Hogar</option>
                                                <option  value="2">Pensión</option>
                                                <option value="3">Menú</option>
                                                <option value="4">Mercado</option>
                                                <option value="5">Casa de parientes</option>
                                                <option value="6">Casa de amigos</option>
                                                <option value="7">Otros</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">Especifique</label>
                                        <input type="text"  id="otro-1"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_alimento">
                                    </div>

                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="guardarInfoSalud()">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==7">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha Social</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Información de Recreación y Cultura</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Información de Recreación y Cultura</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servirá como base
                            para poderte entregar un servicio eficiente y eficaz.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6 py-5">

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Señale 5 lugares de distraccion a los que acude con mayor frecuencia</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d1" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d1" class="font-medium text-gray-700">Bares</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d2" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d2" class="font-medium text-gray-700">Cine</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d3" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d3" class="font-medium text-gray-700">Fiestas Populares</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d4" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d4" class="font-medium text-gray-700">Internet</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d5" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d5" class="font-medium text-gray-700">Campo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d6" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d6" class="font-medium text-gray-700">Discoteca</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d7" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d7" class="font-medium text-gray-700">Club Deportivo/social</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d8" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d8" class="font-medium text-gray-700">Plazas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="d9" name="distraccion" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="lugares_distraccion">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="d9" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_distraccion">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">Señale 5 actividades culturales y/o deportivas en las cuales  participa y/o practica con mas frecuencia.</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a1" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a1" class="font-medium text-gray-700">Musica/Banda</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a2" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a2" class="font-medium text-gray-700">Atletismo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a3" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a3" class="font-medium text-gray-700">Voley</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a4" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a4" class="font-medium text-gray-700">Ajedrez</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a5" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a5" class="font-medium text-gray-700">Karate</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a6" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a6" class="font-medium text-gray-700">Basquet</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a7" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a7" class="font-medium text-gray-700">Teatro</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a8" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a8" class="font-medium text-gray-700">Ping Pong</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a9" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="9" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a9" class="font-medium text-gray-700">Futbol</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a10" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="10" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a10" class="font-medium text-gray-700">Danza</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a11" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="11" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a11" class="font-medium text-gray-700">Futsal</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a12" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="12" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a12" class="font-medium text-gray-700">Natación</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="a13" name="actividad" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="14" v-model="actividades_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="a13" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label 
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_actividad">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">¿En cual de estas actividades les gustaria participar?</legend>
                                            <p class="text-sm text-gray-600 my-3">Charlas Educativas</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="c1" name="charla" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1" v-model="charlas_educativas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="c1" class="font-medium text-gray-700">Metodos de estudio</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="c2" name="charla" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="charlas_educativas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="c2" class="font-medium text-gray-700">Desarrollo Personal</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="c3" name="charla" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="charlas_educativas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="c3" class="font-medium text-gray-700">Salud preventiva</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="c4" name="charla" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="charlas_educativas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="c4" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label 
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_charla">
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Talleres Productivos</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="p1"  name="productivo" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="talleres_productivos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="p1" class="font-medium text-gray-700">Artesanias</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="p2"  name="productivo" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="talleres_productivos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="p2" class="font-medium text-gray-700">Cocina</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="p3"  name="productivo" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="talleres_productivos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="p3" class="font-medium text-gray-700">Tejido</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="p4"  name="productivo" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="talleres_productivos">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="p4" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_productivo">
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Talleres Culturales</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cultura1" name="cultura"  type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="1" v-model="talleres_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cultura1" class="font-medium text-gray-700">Música</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cultura2" name="cultura" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="talleres_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cultura2" class="font-medium text-gray-700">Danza</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cultura3" name="cultura" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="talleres_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cultura3" class="font-medium text-gray-700">Teatro</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cultura6" name="cultura" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="talleres_culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cultura6" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique simarca otros"  v-model="especificacion_cultural">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>

                                    <div class="col-span-6">
                                        <fieldset>
                                            <legend class="text-base font-medium text-gray-900">¿Que habilidad posee?</legend>
                                            <p class="text-sm text-gray-600 my-3">Culturales</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul1" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul1" class="font-medium text-gray-700">Danza</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul2" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul2" class="font-medium text-gray-700">Música</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul3" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul3" class="font-medium text-gray-700">Teatro</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul4" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul4" class="font-medium text-gray-700">Artes Plasticas</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul5" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul5" class="font-medium text-gray-700">Poesia</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="cul6" name="culturales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="culturales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="cul6" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_culturales">
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Manuales</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m1" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m1" class="font-medium text-gray-700">Costura</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m2" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m2" class="font-medium text-gray-700">Sastreria</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m3" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m3" class="font-medium text-gray-700">Cerámica</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m4" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m4" class="font-medium text-gray-700">Artesania</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m5" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m5" class="font-medium text-gray-700">Reposteria</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="m6" name="manuales" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6" v-model="manuales">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="m6" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" 
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_manuales">
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 my-3">Deportivas</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de1" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"  value="1"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de1" class="font-medium text-gray-700">Voley</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de2" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="2"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de2" class="font-medium text-gray-700">Básquet</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de3" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="3"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de3" class="font-medium text-gray-700">Natación</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de4" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="4"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de4" class="font-medium text-gray-700">Atletismo</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de5" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="5"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de5" class="font-medium text-gray-700">Ajedrez</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de6" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="6"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de6" class="font-medium text-gray-700">Futbol</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de7" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="7"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de7" class="font-medium text-gray-700">Karate</label>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="de8" name="deportiva" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" value="8"  v-model="deportivas">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="de8" class="font-medium text-gray-700">Otros</label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="otro-1"
                                                        class="block text-sm font-medium text-gray-700">Especifique</label>
                                                    <input type="text" name="" id="otro-1" autocomplete="otro"
                                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Especifique si marca otros"  v-model="especificacion_deportivas">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>

                                    <!-- <div class="col-span-6">
                                        <legend class="text-base font-medium text-gray-900">Lugar donde estudia</legend>
                                    </div> -->

                                    <!-- <div class="col-span-6 sm:col-span-2">
                                        <label for="otro-1"
                                            class="block text-sm font-medium text-gray-700">¿Dentro de casa?</label>
                                        <select id="modalidad" name="colegio-procedencia" autocomplete="modalidad"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"   v-model="lugar_estudio">
                                                <option value="">--</option>
                                                <option value="1">Dormitorio</option>
                                                <option value="2">Cuarto de estudio</option>
                                                <option value="3">Sala</option>
                                                <option value="4">Comedor</option>
                                                <option value="5">Cocina</option>
                                                <option value="6">Huerta</option>
                                        </select>
                                    </div> -->

                                    <!-- <div class="col-span-6 sm:col-span-2">
                                        <label 
                                            class="block text-sm font-medium text-gray-700">¿Fuera de casa? ¿Donde?</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="donde">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label 
                                            class="block text-sm font-medium text-gray-700">¿Porque?</label>
                                        <input type="text" 
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="porque">
                                    </div> -->

                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarInfoRecreacion()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import VueHtml2pdf from 'vue-html2pdf';
import VueBarcode from 'vue-barcode';
import {
    TModal,
    } from 'vue-tailwind/dist/components';
export default {
    data(){
        return{
            /**page*/
            pagina:0,
            /** TAB*/
            tabnext1:'',
            tabnext2:'',
            tabnext3:'',
            tabnext4:'',
            tabnext5:'',
            tabnext6:'',
            tabnext7:'',
            declaracion_jurada:1,
            tipoAccion:1,
            /**imagen */
            avatar:'../vistas/img/icono.png',
            imagen : null,
            show:false,
            /**ARRAY*/
            arrayInformacion:[],
            arrayEducacion:[],
            arrayInformacionidioma:[],
            arrayFamiliar:[],
            /** Ubigeo */
            arrayRegion: [],
            arrayRegionDir: [],
            arrayProvincia: [],
            arrayProvinciaDir: [],
            arrayDistrito: [],
            arrayDistritoDir: [],
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
            /** Informacion Personal*/
            sexo:'',
            fecha_nacimiento:'',
            edad:'',
            codigo_universitario:'',
            region_nacimiento:'',
            provincia_nacimiento:'',
            distrito_nacimiento:'',
            estado_civil:1,
            direccion:'',
            distrito_direccion:'',
            referencia:'',
            telefono:'',
            celular:'',
            correo:'',
            lugar:'',
            region_procedencia:'',
            provincia_procedencia:'',
            distrito_procedencia:'',
            /**Informacion Educacional */
            fecha_secundaria:'',
            colegio:'',
            especificacion_colegio:'',
            modalidad:'',
            preparacion:'',
            especificacion_preparacion:'',
            aspectos:[],
            otros_estudios:'',
            tipo_estudio:'',
            estudio:'',
            especificacion_estudio:'',
            nivel_estudio:'',
            otra_universidad:'',
            especificacion_universidad:'',
            trabajo:'',
            sueldo:'',
            centro_trabajo:'',
            cargo:'',
            condicion:'',
            dependencia_economica:'',
            pension:'',
            monto:'',
            frecuencia:'',
            especificacion_idioma:'',
            nivel_idioma:['','','','',''],
            arrayidiomas: [],
            /** Informacion Familiar*/
            arrayParientes:[],
            arrayParientes2:[],
            familiar:'',
            parienteEdad:'',
            parentesco:'',
            pariente_civil:'',
            grado_instruccion:'',
            ocupacion:'',
            centro_laboral:'',
            ingreso_pariente:'',
            familiar2:'',
            parienteEdad2:'',
            parentesco2:'',
            pariente_civil2:'',
            grado_instruccion2:'',
            ocupacion2:'',
            centro_laboral2:'',
            ingreso_pariente2:'',
            residencia_padre:'',
            direccion_padre:'',
            telefono_padre:'',
            residencia_madre:'',
            direccion_madre:'',
            telefono_madre:'',
            /** Ingresos*/
            alquiler_inmueble:0,
            alquiler_vehiculos:0,
            trabajos_eventuales:0,
            negocio_propio:0,
            sueldo:0,
            pension_viudez:0,
            pension_orfandad:0,
            pension_incapacidad:0,
            pension_alimenticia:0,
            envio_extranjero:0,
            envio_provincias:0,
            ingresos_otros:0,
            monto_ingreso:0,
            /** Egresos*/
            alimentacion:0,
            agua:0,
            limpieza:0,
            vivienda:0,
            egreso_telefono:0,
            prestamos:0,
            educacion:0,
            cable:0,
            recreacion:0,
            transporte:0,
            internet:0,
            luz:0,
            salud:0,
            egresos_otros:0,
            monto_egreso:0,
            /**Vivienda */
            tenencia:'',
            especificacion_tenencia:'',
            numero_pisos:'1', 
            tipo_vivienda:'',
            material_vivienda:'',
            especificacion_vivienda:'',
            techo_material:'',
            techo_especificacion:'',
            puerta_material:'',
            puerta_especificacion:'',
            ventana_material:'',
            ventana_especificacion:'',
            piso_material:'',
            piso_especificacion:'',
            servicios:[],
            especificacion_servicio:'',
            ambientes:[],
            especificacion_ambiente:'',
            muebles:[],
            especificacion_muebles:'',
            cocinas:[],
            artefactos:[],
            especificacion_artefactos:'',
            /**Salud*/
            enfermedades:[],
            especificacion_alergia:'',
            especificacion_enfermedad:'',
            discapacidad:[],
            especificacion_discapacidad:'',
            arrayEnfermedadPariente:[],
            parentescoEnfermedad:'',
            enfermedad:'',
            centro_medico:'',
            lugar_alimento:'',
            especificacion_alimento:'',
            /**Recreacion */
            lugares_distraccion:[],
            especificacion_distraccion:'',
            actividades_culturales:[],
            especificacion_actividad:'',
            charlas_educativas:[],
            especificacion_charla:'',
            talleres_productivos:[],
            especificacion_productivo:'',
            talleres_culturales:[],
            especificacion_cultural:'',
            culturales:[],
            especificacion_culturales:'',
            manuales:[],
            especificacion_manuales:'',
            deportivas:[],
            especificacion_deportivas:'',
            lugar_estudio:'',
            donde:'',
            porque:'',
            /** Constancia*/
            dia_constancia:'',
            mes_constancia:'',
            año_constancia:'',


        }
    },
    components: {
        VueHtml2pdf,
        'barcode': VueBarcode,
        TModal,
    },
    methods: {
        region_nac() {
            let me = this;
            var url = '/region';
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayRegion = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        provincia_nac() {
            let me = this;
            me.provincia_nacimiento = '';
            me.arrayProvincia = [];
            me.distrito_nacimiento = '';
            me.arrayDistrito = [];
            var url = '/provincia/' + me.region_nacimiento;
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayProvincia = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        distrito_nac() {
            let me = this;
            me.distrito_nacimiento = '';
            me.arrayDistrito = [];
            var url = '/distrito/' + me.region_nacimiento + '/' + me.provincia_nacimiento;
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayDistrito = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        region_dir() {
            let me = this;
            var url = '/region';
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayRegionDir = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        provincia_dir() {
            let me = this;
            me.provincia_procedencia = '';
            me.arrayProvinciaDir = [];
            me.distrito_procedencia = '';
            me.arrayDistritoDir = [];
            var url = '/provincia/' + me.region_procedencia;
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayProvinciaDir = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        distrito_dir() {
            let me = this;
            me.distrito_procedencia = '';
            me.arrayDistritoDir = [];
            var url = '/distrito/' + me.region_procedencia + '/' + me.provincia_procedencia;
            axios.get(url).then((response) => {
                    var respuesta = response.data;
                    me.arrayDistritoDir = respuesta;

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        subirImagen () {
            this.$refs.file.click();
        },
        getImage(e){
            this.imagen = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.imagen);
            reader.onload = e => {
                this.avatar = e.target.result;
            }
        },
        calcularEdad(){
            var hoy = new Date();
            var cumpleanos = new Date(this.fecha_nacimiento);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            if(isNaN(edad)){
                this.edad='';
            }else{

                this.edad=edad;
            }
        },
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
                    me.escuela=me.arrayAlumno[0]['escuela'];
                    me.facultad=me.arrayAlumno[0]['facultad'];
                    me.ingreso=me.arrayAlumno[0]['ingreso'];
                    me.codigo_universitario=me.arrayAlumno[0]['dni'];
                }
                me.fechaConstancia();
                me.codigo=(''+me.año_constancia+''+id+'').padStart(8,'0');
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        guardarInfoPersonal(){
            var url='/guardarinfopersonal';
            if(this.validarInfoPersonal()){
                swal(
                    'Alerta!!!',
                    'Verifique si algun campo no es correcto, esta vacio o no seleccionado',
                    'warning'
                ); 
            }else{
                swal({
                    title: '¿Estás seguro?',
                    text: "Se guardara la Informacion Personal",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        let me = this;
                        axios.post(url,{ 
                            'foto': me.dni+'.jpg',
                            'sexo': me.sexo,
                            'fecha_nacimiento': me.fecha_nacimiento,
                            'codigo_universitario': me.codigo_universitario,
                            'region_nacimiento': me.region_nacimiento,
                            'provincia_nacimiento': me.provincia_nacimiento,
                            'distrito_nacimiento': me.distrito_nacimiento,
                            'estado_civil': me.estado_civil,
                            'direccion': me.direccion,
                            'distrito_direccion': me.distrito_direccion,
                            'referencia': me.referencia,
                            'telefono': me.telefono,
                            'celular': me.celular,
                            'correo': me.correo,
                            'lugar': me.lugar,
                            'region_procedencia': me.region_procedencia,
                            'provincia_procedencia': me.provincia_procedencia,
                            'distrito_procedencia': me.distrito_procedencia,
                            'declaracion_jurada':me.declaracion_jurada,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.guardarImagen();
                                me.countInfo();
                                me.pagina=0;
                            if(response.data==1){
                                
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
        validarInfoPersonal(){
            let me=this;
            if(me.sexo.length==0 || me.fecha_nacimiento.length==0 || isNaN(me.codigo_universitario)||me.region_nacimiento.length==0
                || me.provincia_nacimiento.length==0 || me.distrito_nacimiento.length==0 || me.estado_civil.length==0 || me.direccion.length==0
                || me.referencia.length==0 || me.celular.length < 9 || isNaN(me.celular) || me.correo.length==0 
                || me.declaracion_jurada ==0 ){
                return 1;
            }else{
                return 0;
            }
        },
        guardarImagen(){
            
            var data = new  FormData();
            //Añadimos la imagen seleccionada
            data.append('foto', this.imagen);
            data.append('dni', this.dni);
            simg.post('/subirFoto',data)
            .then(response => {

            });
        },
        countInfo(){
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
            var url2 = '/countinfoeducacional';
            axios.post(url2,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta.length > 0){
                        me.tabnext2 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext2 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url3 = '/countinfofamiliar';
            axios.post(url3,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext3 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext3 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url4 = '/countinfoeconomica';
            axios.post(url4,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta.length > 0){
                        me.tabnext4 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext4 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url5 = '/countinfovivienda';
            axios.post(url5,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta.length > 0){
                        me.tabnext5 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext5 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url6 = '/countinfosalud';
            axios.post(url6,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta.length > 0){
                        me.tabnext6 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext6 =0;
                    }
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url7 = '/countinforecreacion';
            axios.post(url7,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext7 = respuesta[0]['cantidad'];
                    }else{
                        me.tabnext7 =0;
                    }
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        guardarInfoEducacional(){
            var url='/guardarinfoeducacional';
            if(this.validarInfoEducacional()){
                swal(
                    'Alerta!!!',
                    'Verifique si algun campo no es correcto, esta vacio o no seleccionado',
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
                            'fecha_secundaria': me.fecha_secundaria,
                            'colegio': me.colegio,
                            'especificacion_colegio': me.especificacion_colegio,
                            'modalidad': me.modalidad,
                            'preparacion': me.preparacion,
                            'especificacion_preparacion': me.especificacion_preparacion,
                            'otros_estudios': me.otros_estudios,
                            'otra_universidad': me.otra_universidad,
                            'especificacion_universidad': me.especificacion_universidad,
                            'trabajo': me.trabajo,
                            'dependencia_economica': me.dependencia_economica,
                            'pension': me.pension,
                            'aspectos': me.aspectos,
                            'tipo_estudio':me.tipo_estudio,
                            'estudio':me.estudio,
                            'especificacion_estudio':me.especificacion_estudio,
                            'nivel_estudio':me.nivel_estudio,
                            'sueldo':me.sueldo,
                            'centro_trabajo':me.centro_trabajo,
                            'cargo':me.cargo,
                            'condicion':me.condicion,
                            'monto':me.monto,
                            'frecuencia':me.frecuencia,
                            'especificacion_idioma':me.especificacion_idioma,
                            'nivel_idioma':me.nivel_idioma,
                            'arrayidiomas':me.arrayidiomas,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.countInfo();
                                me.pagina=0;
                            if(response.data==1){
                                
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
        validarInfoEducacional(){
            let me=this;
            if(me.fecha_secundaria.length==0 || me.colegio.length==0 || me.modalidad.length==0 || me.preparacion.length==0
                || me.aspectos.length < 3  || me.otros_estudios.length ==0 || me.otra_universidad.length ==0 || me.trabajo.length ==0
                || me.dependencia_economica.length ==0 || me.pension.length ==0){
                return 1;
            }else{
                return 0;
            }
        },
        addPariente(){
            if(this.familiar=='' || this.parienteEdad==''  || this.parentesco=='' || this.pariente_civil==''|| this.grado_instruccion==''|| this.ocupacion==''|| this.centro_laboral==''|| this.ingreso==''){
                swal({
                title: "Campos vacios",
                text: "Verifique que todos los campos se correctos",
                type: "warning",
                showConfirmButton: true
            });

            }else{
                this.arrayParientes.push({
                    familiar: this.familiar,
                    parienteEdad:this.parienteEdad,
                    parentesco:this.parentesco,
                    pariente_civil:this.pariente_civil,
                    grado_instruccion:this.grado_instruccion,
                    ocupacion:this.ocupacion,
                    centro_laboral:this.centro_laboral,
                    ingreso:this.ingreso_pariente
                });
                this.familiar='';
                this.parienteEdad='';
                this.parentesco='';
                this.pariente_civil='';
                this.grado_instruccion='';
                this.ocupacion='';
                this.centro_laboral='';
                this.ingreso_pariente='';
            }
        },
        eliminarPariente(index){
            let me = this;
            me.arrayParientes.splice(index, 1);
        },
        addPariente2(){
            if(this.familiar2=='' || this.parienteEdad2==''  || this.parentesco2=='' || this.pariente_civil2==''|| this.grado_instruccion2==''|| this.ocupacion2==''|| this.centro_laboral2==''|| this.ingreso2==''){
                swal({
                title: "Campos vacios",
                text: "Verifique que todos los campos se correctos",
                type: "warning",
                showConfirmButton: true
            });

            }else{
                this.arrayParientes2.push({
                    familiar: this.familiar2,
                    parienteEdad:this.parienteEdad2,
                    parentesco:this.parentesco2,
                    pariente_civil:this.pariente_civil2,
                    grado_instruccion:this.grado_instruccion2,
                    ocupacion:this.ocupacion2,
                    centro_laboral:this.centro_laboral2,
                    ingreso:this.ingreso_pariente2
                });
                this.familiar2='';
                this.parienteEdad2='';
                this.parentesco2='';
                this.pariente_civil2='';
                this.grado_instruccion2='';
                this.ocupacion2='';
                this.centro_laboral2='';
                this.ingreso_pariente2='';
            }
        },
        eliminarPariente2(index){
            let me = this;
            me.arrayParientes2.splice(index, 1);
        },
        guardarInfoFamiliar(){
            var url='/guardarinfofamiliar';
            if(this.validarInfoFamiliar()){
                swal(
                    'Alerta!!!',
                    'Verifique si inserto parientes',
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
                            'arrayParientes': me.arrayParientes,
                            'arrayParientes2': me.arrayParientes2,
                            'residencia_padre': me.residencia_padre,
                            'direccion_padre': me.direccion_padre,
                            'telefono_padre': me.telefono_padre,
                            'residencia_madre': me.residencia_madre,
                            'direccion_madre': me.direccion_madre,
                            'telefono_madre': me.telefono_madre,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            
                            if(response.data==1){
                                me.countInfo();
                                me.pagina=0;
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
        validarInfoFamiliar(){
            let me=this;
            if(me.arrayParientes.length==0 ){
                return 1;
            }else{
                return 0;
            }
        },
        guardarInfoEconomia(){
            var url='/guardarinfoeconomico';
            if(this.validarInfoEconomia()){
                swal(
                    'Alerta!!!',
                    'Verifique que todos los datos sean numericos, si no tiene ingreso y/o egreso en una opcion introduce 0',
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
                            'alquiler_inmueble':me.alquiler_inmueble,
                            'alquiler_vehiculos':me.alquiler_vehiculos,
                            'trabajos_eventuales':me.trabajos_eventuales,
                            'negocio_propio':me.negocio_propio,
                            'sueldo':me.sueldo,
                            'pension_viudez':me.pension_viudez,
                            'pension_orfandad':me.pension_orfandad,
                            'pension_incapacidad':me.pension_incapacidad,
                            'pension_alimenticia':me.pension_alimenticia,
                            'envio_extranjero':me.envio_extranjero,
                            'envio_provincias':me.envio_provincias,
                            'ingresos_otros':me.ingresos_otros,
                            'alimentacion':me.alimentacion,
                            'agua':me.agua,
                            'limpieza':me.limpieza,
                            'vivienda':me.vivienda,
                            'egreso_telefono':me.egreso_telefono,
                            'prestamos':me.prestamos,
                            'educacion':me.educacion,
                            'cable':me.cable,
                            'recreacion':me.recreacion,
                            'transporte':me.transporte,
                            'internet':me.internet,
                            'luz':me.luz,
                            'salud':me.salud,
                            'egresos_otros':me.egresos_otros,  
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            
                            if(response.data==1){
                                me.countInfo();
                                me.pagina=0;
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
        validarInfoEconomia(){
            let me=this;
            if(me.monto_ingreso < 0 || me.monto_egreso < 0){
                return 1;
            }else{
                return 0;
            }
        },
        calcularIngreso(){
            let me = this;
            let monto=(parseFloat(me.alquiler_inmueble)+parseFloat(me.alquiler_vehiculos)+parseFloat(me.trabajos_eventuales)+
                            parseFloat(me.negocio_propio)+parseFloat(me.sueldo)+parseFloat(me.pension_viudez)+parseFloat(me.pension_orfandad)+
                            parseFloat(me.pension_incapacidad)+parseFloat(me.pension_alimenticia)+parseFloat(me.envio_extranjero)+
                            parseFloat(me.envio_provincias)+parseFloat(me.ingresos_otros));
            if(isNaN(monto)){
                me.monto_ingreso=0;
            }else{
                me.monto_ingreso=monto;
            }
        },
        calcularEgreso(){
            let me = this;
            let monto=(parseFloat(me.alimentacion)+parseFloat(me.agua)+parseFloat(me.limpieza)+parseFloat(me.vivienda)+
                            parseFloat(me.egreso_telefono)+parseFloat(me.prestamos)+parseFloat(me.educacion)+parseFloat(me.cable)+
                            parseFloat(me.recreacion)+parseFloat(me.transporte)+parseFloat(me.internet)+parseFloat(me.luz)+
                            parseFloat(me.salud)+parseFloat(me.egresos_otros));
            if(isNaN(monto)){
                me.monto_egreso=0;
            }else{
                me.monto_egreso=monto;
            }
        },
        guardarInfoVivienda(){
            var url='/guardarinfovivienda';
            if(this.validarInfoVivienda()){
                swal(
                    'Alerta!!!',
                    'Verifique que todos los campos sean respondidos',
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
                            'tenencia': me.tenencia,
                            'especificacion_tenencia':me.especificacion_tenencia,
                            'numero_pisos':me.numero_pisos, 
                            'tipo_vivienda':me.tipo_vivienda,
                            'material_vivienda':me.material_vivienda,
                            'especificacion_vivienda':me.especificacion_vivienda,
                            'techo_material':me.techo_material,
                            'techo_especificacion':me.techo_especificacion,
                            'puerta_material':me.puerta_material,
                            'puerta_especificacion':me.puerta_especificacion,
                            'ventana_material':me.ventana_material,
                            'ventana_especificacion':me.ventana_especificacion,
                            'piso_material':me.piso_material,
                            'piso_especificacion':me.piso_especificacion,
                            'servicios':me.servicios,
                            'especificacion_servicio':me.especificacion_servicio,
                            'ambientes':me.ambientes,
                            'especificacion_ambiente':me.especificacion_ambiente,
                            'muebles':me.muebles,
                            'especificacion_muebles':me.especificacion_muebles,
                            'cocinas':me.cocinas,
                            'artefactos':me.artefactos,
                            'especificacion_artefactos':me.especificacion_artefactos,  
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            
                            if(response.data==1){
                                me.countInfo();
                                me.pagina=0;
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
        validarInfoVivienda(){
            let me=this;
            if(me.tenencia=='' || me.numero_pisos=='' || me.numero_pisos==0 || isNaN(this.numero_pisos)  || me.tipo_vivienda=='' || me.material_vivienda=='' || me.techo_material==''
                || me.puerta_material=='' || me.ventana_material=='' || me.piso_material=='' || me.servicios.length == 0 || me.ambientes.length == 0
               ){
                return 1;
            }else{
                return 0;
            }
        },
        guardarInfoSalud(){
            var url='/guardarinfosalud';
            if(this.validarInfoSalud()){
                swal(
                    'Alerta!!!',
                    'Verifique que el campo donde toma sus alimentos sea respondido',
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
                            'enfermedades':me.enfermedades,
                            'especificacion_alergia':me.especificacion_alergia,
                            'especificacion_enfermedad':me.especificacion_enfermedad,
                            'discapacidad':me.discapacidad,
                            'especificacion_discapacidad':me.especificacion_discapacidad,
                            'arrayEnfermedadPariente':me.arrayEnfermedadPariente,
                            'lugar_alimento':me.lugar_alimento,
                            'especificacion_alimento':me.especificacion_alimento,  
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            
                            if(response.data==1){
                                me.countInfo();
                                me.pagina=0;
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
        validarInfoSalud(){
            let me=this;
            if( me.lugar_alimento == ''){
                return 1;
            }else{
                return 0;
            }
        },
        addParienteEnfermedad(){
            if(this.parentescoEnfermedad=='' || this.enfermedad=='' || this.centro_medico==''  ){
                swal({
                title: "Campos vacios",
                text: "Verifique que todos los campos se correctos",
                type: "warning",
                showConfirmButton: true
            });

            }else{
                this.arrayEnfermedadPariente.push({
                    parentesco: this.parentescoEnfermedad,
                    enfermedad:this.enfermedad,
                    centro_medico:this.centro_medico
                });
                this.parentescoEnfermedad='';
                this.enfermedad='';
                this.centro_medico='';
            }
        },
        eliminarParienteEnfermedad(index){
            let me = this;
            me.arrayEnfermedadPariente.splice(index, 1);
        },
        guardarInfoRecreacion(){
            var url='/guardarinforecreacion';
            if(this.validarInfoRecreacion()){
                swal(
                    'Alerta!!!',
                    'Verifique que todos los campos sean respondidos correctamente',
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
                            'lugares_distraccion':me.lugares_distraccion,
                            'especificacion_distraccion':me.especificacion_distraccion,
                            'actividades_culturales':me.actividades_culturales,
                            'especificacion_actividad':me.especificacion_actividad,
                            'charlas_educativas':me.charlas_educativas,
                            'especificacion_charla':me.especificacion_charla,
                            'talleres_productivos':me.talleres_productivos,
                            'especificacion_productivo':me.especificacion_productivo,
                            'talleres_culturales':me.talleres_culturales,
                            'especificacion_cultural':me.especificacion_cultural,
                            'culturales':me.culturales,
                            'especificacion_culturales':me.especificacion_culturales,
                            'manuales':me.manuales,
                            'especificacion_manuales':me.especificacion_manuales,
                            'deportivas':me.deportivas,
                            'especificacion_deportivas':me.especificacion_deportivas,
                            'lugar_estudio':me.lugar_estudio,
                            'donde':me.donde,
                            'porque':me.porque,  
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            
                            if(response.data==1){
                                
                                me.countInfo();
                                me.pagina=0;
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
        validarInfoRecreacion(){
            let me=this;
            if( me.lugares_distraccion.length < 1 || me.actividades_culturales.length < 1 || me.charlas_educativas.length == 0 || me.talleres_productivos.length == 0 
                || me.talleres_culturales.length == 0|| me.culturales.length == 0|| me.manuales.length == 0|| me.deportivas.length == 0){
                return 1;
                
                
            }else{
                return 0;
            }
        },
        generarPdf(){
            this.$refs.html2Pdf.generatePdf();
            
        },
        fechaConstancia(){
            let date = new Date();
            let años = date.getFullYear();
            let meses = date.getMonth() ;
            let dia = date.getDate();
            
            this.año_constancia=años;
            /**Dia*/
            if(dia < 10){
                this.dia_constancia ='0'+dia;
            }else{
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
        loadInformacionPersonal(){
            let me=this;
            var id = this.$root.id;
            var url= '/informacionPersonal';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayInformacion=respuesta;
                if(me.arrayInformacion.length>0){
                    me.avatar='../vistas/img/alumnos/'+me.arrayInformacion[0]['foto'];
                    me.fecha_nacimiento=me.arrayInformacion[0]['fecha_nacimiento'];
                    me.calcularEdad();
                    me.estado_civil=me.arrayInformacion[0]['id_civil'];
                    me.sexo=me.arrayInformacion[0]['genero'];
                    me.codigo_universitario=me.arrayInformacion[0]['codigo_universitario'];
                    me.region_nacimiento=me.arrayInformacion[0]['region_nacimiento'];
                    me.provincia_nac();
                    me.provincia_nacimiento=me.arrayInformacion[0]['provincia_nacimiento'];
                    me.distrito_nac();
                    me.distrito_nacimiento=me.arrayInformacion[0]['distrito_nacimiento'];
                    me.direccion=me.arrayInformacion[0]['direccion'];
                    me.referencia=me.arrayInformacion[0]['referencia'];
                    me.distrito_direccion=me.arrayInformacion[0]['distrito_direccion'];
                    me.celular=me.arrayInformacion[0]['celular'];
                    me.telefono=me.arrayInformacion[0]['telefono'];
                    me.correo=me.arrayInformacion[0]['correo'];
                    me.lugar=me.arrayInformacion[0]['lugar'];
                    me.region_procedencia=me.arrayInformacion[0]['region_procedencia'];
                    me.provincia_dir();
                    me.provincia_procedencia=me.arrayInformacion[0]['provincia_procedencia'];
                    me.distrito_dir();
                    me.distrito_procedencia=me.arrayInformacion[0]['distrito_procedencia'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadInformacionEducacional(){
            let me=this;
            var id = this.$root.id;
            var url= '/informacionEducacional';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayEducacion=respuesta;
                if(me.arrayEducacion.length>0){
                    me.fecha_secundaria=me.arrayEducacion[0]['fecha_secundaria'];
                    me.colegio=me.arrayEducacion[0]['tipo_colegio'];
                    me.especificacion_colegio=me.arrayEducacion[0]['especificacion_colegio'];
                    me.modalidad=me.arrayEducacion[0]['modalidad'];
                    me.preparacion=me.arrayEducacion[0]['tipo_preparacion'];
                    me.especificacion_preparacion=me.arrayEducacion[0]['especificacion_preparacion'];
                    me.otros_estudios=me.arrayEducacion[0]['otros_estudios'];
                    me.otra_universidad=me.arrayEducacion[0]['otra_universidad'];
                    me.especificacion_universidad=me.arrayEducacion[0]['especificacion_universidad'];
                    me.trabajo=me.arrayEducacion[0]['trabajo'];
                    me.dependencia_economica=me.arrayEducacion[0]['dependencia_economica'];
                    me.pension=me.arrayEducacion[0]['pension'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/otrosIdiomas';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayInformacionidioma=respuesta;
                for(var i=0;i< me.arrayInformacionidioma.length;i++){
                    me.arrayidiomas.push(me.arrayInformacionidioma[i]['idioma']);
                    if((me.arrayInformacionidioma[i]['idioma']-1) == 0){
                        me.nivel_idioma[0]=me.arrayInformacionidioma[i]['nivel'];
                    }else if((me.arrayInformacionidioma[i]['idioma']-1) == 1){
                        me.nivel_idioma[1]=me.arrayInformacionidioma[i]['nivel'];
                    }else if((me.arrayInformacionidioma[i]['idioma']-1) == 2){
                        me.nivel_idioma[2]=me.arrayInformacionidioma[i]['nivel'];
                    }else if((me.arrayInformacionidioma[i]['idioma']-1) == 3){
                        me.nivel_idioma[3]=me.arrayInformacionidioma[i]['nivel'];
                    }else if((me.arrayInformacionidioma[i]['idioma']-1) == 4){
                        me.nivel_idioma[4]=me.arrayInformacionidioma[i]['nivel'];
                        me.especificacion_idioma=me.arrayInformacionidioma[i]['especifique'];
                    }
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            var url2= '/aspectos_universidad';
            axios.post(url2,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                for(var i=0;i< respuesta.length;i++){
                    me.aspectos.push(respuesta[i]['aspecto']);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            var url3= '/otros_estudios';
            axios.post(url3,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(me.otros_estudios==1){
                    me.tipo_estudio=respuesta[0]['tipo_estudio'];
                    me.estudio=respuesta[0]['estudio'];
                    me.especificacion_estudio=respuesta[0]['especificacion_estudio'];
                    me.nivel_estudio=respuesta[0]['nivel'];
                }
            })    
            .catch(function (error) {
                console.log(error);
            });
            var url4= '/trabajos';
            axios.post(url4,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(me.trabajo==1){
                    me.sueldo=respuesta[0]['sueldo'];
                    me.centro_trabajo=respuesta[0]['centro_trabajo'];
                    me.cargo=respuesta[0]['cargo'];
                    me.condicion=respuesta[0]['condicion'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            var url5= '/pensiones';
            axios.post(url5,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(me.pension==1){
                    me.monto=respuesta[0]['monto'];
                    me.frecuencia=respuesta[0]['frecuencia'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadInformacionFamliar(){
            let me = this;
            var id = this.$root.id;
            var url= '/informacionFamiliar';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayFamiliar=respuesta;
                if(me.arrayFamiliar.length>0){
                    me.residencia_padre=me.arrayFamiliar[0]['residencia_padre'];
                    me.direccion_padre=me.arrayFamiliar[0]['direccion_padre'];
                    me.telefono_padre=me.arrayFamiliar[0]['telefono_padre'];
                    me.residencia_madre=me.arrayFamiliar[0]['residencia_madre'];
                    me.direccion_madre=me.arrayFamiliar[0]['direccion_madre'];
                    me.telefono_madre=me.arrayFamiliar[0]['telefono_madre'];
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/familiares';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayParientes=respuesta;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        siguiente(){
            
            $('body, html').animate({
                scrollTop: '0px',
                
            }, 300);
            return true;
        },
        Update(opcion){
            let me=this;
            if(opcion==1){
                me.loadInformacionPersonal();
                me.pagina=1;
                me.tipoAccion=2;
                me.show=true;
                me.siguiente();
            }else if(opcion==2){
                me.loadInformacionEducacional();
                me.pagina=2;
                me.tipoAccion=2;
                me.show=true;
                me.siguiente();
            }else if(opcion==3){
                me.loadInformacionFamliar();
                me.pagina=3;
                me.tipoAccion=2;
                me.show=true;
                me.siguiente();
            }

        },
        modificarInfoPersonal(){
            var url='/modificarinfopersonal';
            if(this.validarInfoPersonal()){
                swal(
                    'Alerta!!!',
                    'Verifique si algun campo no es correcto, esta vacio o no seleccionado',
                    'warning'
                ); 
            }else{
                swal({
                    title: '¿Estás seguro?',
                    text: "Se Actualizara la Información Personal",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        let me = this;
                        axios.put(url,{ 
                            'foto': me.dni+'.jpg',
                            'sexo': me.sexo,
                            'fecha_nacimiento': me.fecha_nacimiento,
                            'codigo_universitario': me.codigo_universitario,
                            'region_nacimiento': me.region_nacimiento,
                            'provincia_nacimiento': me.provincia_nacimiento,
                            'distrito_nacimiento': me.distrito_nacimiento,
                            'estado_civil': me.estado_civil,
                            'direccion': me.direccion,
                            'distrito_direccion': me.distrito_direccion,
                            'referencia': me.referencia,
                            'telefono': me.telefono,
                            'celular': me.celular,
                            'correo': me.correo,
                            'lugar': me.lugar,
                            'region_procedencia': me.region_procedencia,
                            'provincia_procedencia': me.provincia_procedencia,
                            'distrito_procedencia': me.distrito_procedencia,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.guardarImagen();
                                me.countInfo();
                                me.pagina=0;
                            if(response.data==1){
                                
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
        modificarInfoEducacional(){
            var url='/modificarinfoeducacional';
            if(this.validarInfoEducacional()){
                swal(
                    'Alerta!!!',
                    'Verifique si algun campo no es correcto, esta vacio o no seleccionado',
                    'warning'
                ); 
            }else{
                swal({
                    title: '¿Estás seguro?',
                    text: "Se Actualizara la Información Educacional",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        let me = this;
                        axios.put(url,{ 
                            'fecha_secundaria': me.fecha_secundaria,
                            'colegio': me.colegio,
                            'especificacion_colegio': me.especificacion_colegio,
                            'modalidad': me.modalidad,
                            'preparacion': me.preparacion,
                            'especificacion_preparacion': me.especificacion_preparacion,
                            'otros_estudios': me.otros_estudios,
                            'otra_universidad': me.otra_universidad,
                            'especificacion_universidad': me.especificacion_universidad,
                            'trabajo': me.trabajo,
                            'dependencia_economica': me.dependencia_economica,
                            'pension': me.pension,
                            'aspectos': me.aspectos,
                            'tipo_estudio':me.tipo_estudio,
                            'estudio':me.estudio,
                            'especificacion_estudio':me.especificacion_estudio,
                            'nivel_estudio':me.nivel_estudio,
                            'sueldo':me.sueldo,
                            'centro_trabajo':me.centro_trabajo,
                            'cargo':me.cargo,
                            'condicion':me.condicion,
                            'monto':me.monto,
                            'frecuencia':me.frecuencia,
                            'especificacion_idioma':me.especificacion_idioma,
                            'nivel_idioma':me.nivel_idioma,
                            'arrayidiomas':me.arrayidiomas,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.countInfo();
                                me.pagina=0;
                                me.arrayidiomas=[];
                                me.aspectos=[];
                            if(response.data==1){
                                
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
    },
    mounted() {
        this.region_nac();
        this.region_dir();
        this.loadAlumno();
        this.countInfo();
    }
}


</script>
<style >
.pc{
        margin-right: -290px;
    }
.cell{
    margin-left: 120px;
    }
</style>