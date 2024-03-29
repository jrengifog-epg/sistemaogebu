<template>
    <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-8 mb-8" v-if="pagina==0">
        <h3 class="text-2xl">BENVENIDO, <span v-text="nombres+' '+ apellidoPaterno+' '+apellidoMaterno"></span></h3>
        <p class="text-sm text-gray-500 mt-2 mb-4">Encontrarás información acerca de tu perfil como estudiante, consultar tus resultados psicológicos, ver tu historia médica, podrás actualizar información y descargar tus constancias para realizar tu matricula.</p>
        <div class="w-full flex flex-col sm:flex-row">
            <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                <div class="bg-ficha-social h-36 p-4 flex items-end rounded-t-xl">
                    <h4 class="text-white font-medium text-lg">
                        <a href="#" @click="pagina=1">Perfil Socio Económico</a>
                    </h4>
                </div>
                <div class="px-4 flex items-center h-12">
                    <p class="text-sm text-blue-500 hover:text-blue-700"><a href="#" @click="pagina=1">Ver perfil</a></p>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                <div class="bg-ficha-salud h-36 p-4 flex items-end rounded-t-xl">
                    <h4 class="text-white font-medium text-lg">
                        <a href="#"  @click="pagina=2">Perfil Médico</a>
                    </h4>
                </div>
                <div class="px-4 flex items-center h-12">
                    <p class="text-sm text-blue-500 hover:text-blue-700"><a href="#"  @click="pagina=2">Ver perfil</a></p>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl">
                    <h4 class="text-white font-medium text-lg">
                        <a href="#"  @click="pagina=3">Perfil Psicológico</a>
                    </h4>
                </div>
                <div class="px-4 flex items-center h-12">
                    <p class="text-sm text-blue-500 hover:text-blue-700"><a href="#"  @click="pagina=3">Ver perfil</a></p>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4">
                <div class="bg-ficha-nutricional h-36 p-4 flex items-end rounded-t-xl">
                    <h4 class="text-white font-medium text-lg">
                        <a href="#" @click="pagina=4">Perfil Nutricional</a>
                    </h4>
                </div>
                <div class="px-4 flex items-center h-12">
                    <p class="text-sm text-blue-500 hover:text-blue-700"><a href="#" @click="pagina=4">Ver perfil</a></p>
                </div>
            </div>
        </div>
    </main>
    <main v-else-if="pagina==1">
        <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8 mb-8 main-h">
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
                <h3 class="text-blue-500 ml-2">Ficha Socio Económica</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Ficha Socio Económica</h3>
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
                                    <div class="py-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Información básica
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Ultima actualización el 24 de mayo de 2021
                                        </p>
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
                                                    Constancias
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm" v-if="tabnext1 > 0">
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
                                                                constancia Ficha Socio-economica.pdf
                                                                </span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#" @click="generarpdfSocial()"
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
        <main id="social">
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
            ref="social"
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
                </section>
            </vue-html2pdf>
        </main>
    </main>
    <main v-else-if="pagina==2">
        <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-8 mb-8"  >
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
                <h3 class="text-blue-500 ml-2">Perfil Médico</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Perfil Médico</h3>
                            <p class="mt-4 text-sm text-gray-600">Perfil médico e historial de atención del estudiante</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden mb-4">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="overflow-hidden">
                                    <div class="py-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno">
                                            
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Ultima actualización el 24 de mayo de 2021
                                        </p>
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
                                                    Número de Historia
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="(''+$root.id+'').padStart(8,'0')">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Presión arterial
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="presion">
                                                   
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Pulso
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="pulso">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Respiraciones
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="respiracion">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Enfermedades preexistentes
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200" v-if="enfermedad==1" >
                                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm" v-for="e in arrayEnfermedades" :key="e.enfermedad">
                                                            <div class="w-0 flex-1 flex items-center" >
                                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                                    <path fill-rule="evenodd"
                                                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                                        clip-rule="evenodd"/>
                                                                </svg>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==1" >Anemia</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==2" >Diabetes</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==3" >Enfermedad psoquiátrica</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==4" >VIH</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==5" >Asma</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==6" >Hipertensión</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==7" >Enfermedad psicológica</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==8" >Alergias: <p v-text="e.especificacion_alergia"></p></span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==9" >Cancer</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==10" >Infección Urinaria</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==11" >Hepatitis</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==12" >Cardiopatia</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==13" >ITS</span>
                                                                <span class="ml-2 flex-1 w-0 truncate" v-if="e.enfermedad==14" >Otros: <p v-text="e.especificacion_enfermedad"></p></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200" v-else>
                                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                            <div class="w-0 flex-1 flex items-center">
                                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                                    <path fill-rule="evenodd"
                                                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                                        clip-rule="evenodd"/>
                                                                </svg>
                                                                <span class="ml-2 flex-1 w-0 truncate">NINGUNA</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Constancia
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm" v-if="tabnext3 > 0">
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
                                                                    constancia Ficha Medica.pdf
                                                                </span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#" @click="generarpdfMedica()"
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
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="pt-4">
                    <h3 class="text-2xl font-medium leading-6 text-gray-900">Historial de atenciones medicas</h3>
                    <p class="mt-2 text-sm text-gray-600">Perfil médico e historial de atención del estudiante</p>
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
                                            Fecha
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Descripción
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Área de atención
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Médico
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
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
        <main id="medica">
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
            ref="medica"
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
                                <p class="text-sm"><i>Se certifica que el estudiante <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b> de la facultad <b><span v-text="facultad"></span></b> con N° de DNI <b><span v-text="dni"></span></b>
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
                                <barcode  height="25" width="2" fontSize="14" :value="codigo">
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
                                <p class="text-sm"><i>Se certifica que el estudiante <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></span></b> de la facultad <b><span v-text="facultad"></span></b> con N° de DNI <b><span v-text="dni"></span></b>
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
    <main v-else-if="pagina==3">
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
                <h3 class="text-blue-500 ml-2">Perfil Psicopedagógico</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Perfil Psicopedagógico</h3>
                            <p class="mt-4 text-sm text-gray-600">Perfil Psicopedagógico del estudiante, podrá ver los resultados de los test y descargar su constancia</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden mb-4">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="overflow-hidden">
                                    <div class="py-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno">
                                            
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Ultima actualización el 24 de mayo de 2021
                                        </p>
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
                                                    HABILIDADES SOCIALES
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                   DENTRO DE LOS PARAMETROS DE NORMALIDAD
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    INDICE EAA
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                   DENTRO DE LOS PARAMETROS DE NORMALIDAD
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    INDICE EAMD
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                   DENTRO DE LOS PARAMETROS DE NORMALIDAD
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Constancia
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-if="tabnext4 > 0">
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
                                <p class="text-sm"><i><b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b> de <b><span v-text="edad"></span></b> años con N° de DNI: <b><span v-text="dni"></span></b>
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
    <main v-else-if="pagina==4">
        <main class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-8 mb-8" >
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
                <h3 class="text-blue-500 ml-2">Perfil Nutricional</h3>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-medium leading-6 text-gray-900">Perfil Nutricional</h3>
                            <p class="mt-4 text-sm text-gray-600">Perfil médico e historial de atención del estudiante</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden mb-4">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="overflow-hidden">
                                    <div class="py-2">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno">
                                            
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Ultima actualización el 24 de mayo de 2021
                                        </p>
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
                                                    Número de Historia
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="(''+$root.id+'').padStart(8,'0')">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Talla
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="talla">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Peso
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="peso">
                                                    
                                                </dd>
                                            </div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    IMC
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="indice_masa">
                                                    
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Estado nutricional
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-if="indice_masa <= 18.5">
                                                    Peso inferior al normal
                                                </dd>
                                                 <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-else-if="(indice_masa > 18.5) && (indice_masa <= 24.9)">
                                                   Normal
                                                </dd>
                                                 <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-else-if="(indice_masa > 24.9) && (indice_masa <= 29.9)">
                                                    Peso superior al normal
                                                </dd>
                                                 <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-else-if="indice_masa > 30">
                                                    Obesidad
                                                </dd>
                                            </div>
                                            
                                            <div class="border-t border-gray-100"></div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Constancia
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-if="tabnext2 > 0">
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
                                                                    constancia Ficha Nutricional.pdf
                                                                </span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#" @click="generarpdfNutricion()"
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
        <main id="nutricion">
            <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="false"
            :paginate-elements-by-height="1100"
            :filename="'CONSTANCIA FICHA NUTRICIONAL-'+dni"
            :pdf-quality="2"
            :manual-pagination="true"
            pdf-format="a4"
            pdf-orientation="portrait"
            pdf-content-width="725px"
            @hasStartedGeneration="hasStartedGeneration()"
            @hasGenerated="hasGenerated($event)"
            ref="nutricion"
            >
                <section slot="pdf-content" >
                    <div v-if="$root.size > 750" class="pc mx-4">
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
                            <div class="w-3/12 ml-10 md:ml-2">
                                <img :src="'../vistas/img/logo-ogebu.png'" alt="" width="60" />
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex md:w-7/12">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm"><i>La nutricionista que suscribe certifica que el estudiante <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b> de la facultad <b><span v-text="facultad"></span></b> con codigo de ingreso <b><span v-text="dni"></span></b>
                            al momento de la evaluacion nutricional se encuentra en perfecto estado de salud.</i></p>
                            </div>
                        </div>
                        <div class="mt-4 ml-14 flex md:w-7/12" v-if="indice_masa < 18.5  || indice_masa > 24.9 ">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm">* Se le recomienda realizar una consulta con la nutricionista.</p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-7/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-nutricion.jpg'" alt="" width="250"/>
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
                    <div v-else class="mx-4">
                        <div class="mt-14 ml-14 flex w-full">
                            <div class="w-2/12">
                                <img :src="'../vistas/img/logo.jpg'" alt="logo-2" width="50"/>
                            </div>
                            <div class="w-8/12 flex-row text-center -ml-4 pt-6">
                                <h1 class="text-sm"><b>UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA</b></h1>
                                <h1 class="text-sm"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></h1>
                                <h1 class="text-xs"><b><i>Calle Nanay N° 363 Telefono:235699</i></b></h1>
                                <h1 class="text-md pt-6"><i><b><u>CONSTANCIA</u></b></i></h1>
                            </div>
                            <div class="w-2/12 ">
                                <img class="ml-10 " :src="'../vistas/img/logo-ogebu.png'" alt="" width="60" />
                            </div>
                        </div>
                        <div class="mt-10 ml-14 flex md:w-7/12">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm"><i>La nutricionista que suscribe certifica que el estudiante <b><span v-text="nombres+' '+apellidoPaterno+' '+apellidoMaterno"></span></b> de la facultad <b><span v-text="facultad"></span></b> con codigo de ingreso <b><span v-text="codigo"></span></b>
                            al momento de la evaluacion nutricional se encuentra en perfecto estado de salud.</i></p>
                            </div>
                        </div>
                        <div class="mt-4 ml-14 flex md:w-7/12" v-if="indice_masa < 18.5  || indice_masa > 24.9 ">
                            <div class="w-full flex-row  text-justify mb-2">
                                <p class="text-sm"> Se le recomienda realizar una consulta con la nutricionista.</p>
                            </div>
                        </div>
                        <div class="mt-14 mb-10 ml-14 flex w-12/12">
                            <div class="w-full flex  justify-center">
                                <img :src="'../vistas/img/firma-nutricion.jpg'" alt="" width="250"/>
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
export default {
    data() {
        return {
            /**Pagina**/
            tabnext1:2,
            tabnext2:2,
            tabnext3:2,
            tabnext4:0,
            pagina:0,
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
            estado_civil:1,
            /** SALUD**/
            presion:'',
            pulso:'',
            respiracion:'',
            enefermedad:'',
            arraySalud:[],
            arrayEnfermedades:[],
            /** Nutricion*/
            indice_masa:'',
            talla:'',
            peso:'',
             /** Constancia*/
            dia_constancia:'',
            mes_constancia:'',
            año_constancia:'',
            fecha:'',

        }
    },
    components:{
        'barcode': VueBarcode
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
                    me.escuela=me.arrayAlumno[0]['escuela'];
                    me.facultad=me.arrayAlumno[0]['facultad'];
                    me.ingreso=me.arrayAlumno[0]['ingreso'];
                }
                me.codigo=(''+me.dni+'').padStart(10,'0');
                me.fechaConstancia();
                me.loadImc();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadInformacionPersonal(){
            let me=this;
            var id = this.$root.id;
            var url= '/informacionPersonal';
            axios.post(url,{'id_alumno':id}).then(function (response) {
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
                }
            })
            .catch(function (error) {
                console.log(error);
            });
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
        loadImc(){
            let me = this;
            var url = '/imc';
            axios.post(url,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    me.indice_masa = respuesta[0]['indice_masa'];
                    me.peso = respuesta[0]['peso'];
                    me.talla=respuesta[0]['talla'];

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        top(){
            
            $('body, html').animate({
                scrollTop: '0px',
                
            }, 0);
            return true;
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
        generarpdfNutricion(){
            this.top();
            this.$refs.nutricion.generatePdf();
            
        },
        generarpdfSocial(){
            this.top();
            this.$refs.social.generatePdf();
            
        },
        generarpdfPsicologica(){
            this.top();
            this.$refs.psicologica.generatePdf();
            
        },
        generarpdfMedica(){
            this.top();
            this.$refs.medica.generatePdf();
            
        },
        loadInfo(){
            let me = this;
            var url1 = '/countinforecreacion';
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
            var url2 = '/countnutricion';
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
            var url3 = '/countmedico';
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
            var url4 = '/indiceEaa';
            axios.post(url4,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta !="NO SE REALIZO LA EVALUACION"){
                        me.tabnext4 =1;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
            });
        },
        loadSalud(){
            let me=this;
            var id = this.$root.id;
            var url= '/informacionSalud';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arraySalud=respuesta;
                if(me.arraySalud.length>0){
                    me.presion=me.arraySalud[0]['presion_arterial'];
                    me.pulso=me.arraySalud[0]['pulso'];
                    me.respiracion=me.arraySalud[0]['respiracion'];
                    me.enfermedad=me.arraySalud[0]['enfermedad'];
                    me.loadEnfermedades();
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadEnfermedades(){
            let me=this;
            var id = this.$root.id;
            var url= '/enfermedad_alumno';
            axios.post(url,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayEnfermedades=respuesta;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        
    },
    mounted() {
        this.loadAlumno();
        this.loadInformacionPersonal();
        this.loadInfo();
        this.loadSalud();
    },
}
</script>
<style >
.pc{
        margin-right: -290px;
    }
</style>