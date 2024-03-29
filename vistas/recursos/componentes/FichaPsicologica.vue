<template>
    <main v-if="pagina==0">
        <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" >
            <div class="flex flex-col md:flex-row">
                <div class="flex-col w-full">
                    <h3 class="text-2xl">Ficha Psicologica del estudiante</h3>
                    <p class="text-sm text-gray-500 mt-2 mb-4">La información que consignes en esta ficha debe ajustarse a la verdad y
                        nos servirá como base para poderte entregar un servicio eficiente y eficaz.</p>
                </div>
                <div class="flex md:w-3/12 justify-end items-center mb-4">
                    <a href="#" class="text-white hover:text-blue-800 bg-blue-400 rounded-lg px-2 py-2"  @click="generarPdf()" v-if=" tabnext2 > 0 && tabnext3 > 0 && tabnext4 > 0 ">Descargar Constancia</a>
                </div>
            </div>
            <div class="w-full flex flex-col sm:flex-row">
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4" >
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl" v-if="fecha_nacimiento !=''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=2" v-if="tabnext2==0">Habilidades Sociales</a>
                            <a href="#"  v-else-if="tabnext2 > 0">Habilidades Sociales</a>
                        </h4>
                    </div>
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl"  v-else-if="fecha_nacimiento ==''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" >Habilidades Sociales</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col" v-if="fecha_nacimiento !=''">
                        <p class="text-xs text-gray-500" v-if="tabnext2==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext2==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext2 > 0 ">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext2 > 0"></div>
                    </div>
                    <div class="px-4 flex items-center h-12 " v-else-if="fecha_nacimiento ==''" >
                        <span class="text-xs   text-gray-700 rounded-full px-3 py-0" >COMPLETE LA INFORMACION PERSONAL PARA DESBLOQUEAR</span>
                        <div class="rounded-full bg-gray-200 px-3 py-1"> 
                            <i class="fas fa-lock "></i>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4" >
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl" v-if="fecha_nacimiento !=''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=3" v-if="tabnext3==0">Indice EAA</a>
                            <a href="#"  v-else-if="tabnext3 > 0">Indice EAA</a>
                        </h4>
                    </div>
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl"  v-else-if="fecha_nacimiento ==''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" >Indice EAA</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col" v-if="fecha_nacimiento !=''">
                        <p class="text-xs text-gray-500" v-if="tabnext3==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext3==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext3 > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext3 > 0"></div>
                    </div>
                    <div class="px-4 flex items-center h-12 " v-else-if="fecha_nacimiento ==''" >
                        <span class="text-xs   text-gray-700 rounded-full px-3 py-0" >COMPLETE LA INFORMACION PERSONAL PARA DESBLOQUEAR</span>
                        <div class="rounded-full bg-gray-200 px-3 py-1"> 
                            <i class="fas fa-lock "></i>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4" >
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl" v-if="fecha_nacimiento !=''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=4" v-if="tabnext4==0">Indice EAMD</a>
                            <a href="#"  v-else-if="tabnext4 > 0">Indice EAMD</a>
                        </h4>
                    </div>
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl"  v-else-if="fecha_nacimiento ==''">
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" >Indice EAMD</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col" v-if="fecha_nacimiento !=''">
                        <p class="text-xs text-gray-500" v-if="tabnext4==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext4==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext4 > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext4 > 0"></div>
                    </div>
                    <div class="px-4 flex items-center h-12 " v-else-if="fecha_nacimiento ==''" >
                        <span class="text-xs   text-gray-700 rounded-full px-3 py-0" >COMPLETE LA INFORMACION PERSONAL PARA DESBLOQUEAR</span>
                        <div class="rounded-full bg-gray-200 px-3 py-1"> 
                            <i class="fas fa-lock "></i>
                        </div>
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
            :filename="'CONSTANCIA FICHA PSICOLOGICA-'+dni"
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
        </template>
    </main>
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==1">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha psicologica</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Personalidad EYSENCK</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Personalidad EYSENCK</h3>
                        <p class="mt-4 text-sm text-gray-600">
                             La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz.  
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md p-10 my-10 text-justify">
                        <h3 class="font-bold">INSTRUCCIONES</h3>
                        <p>
                            Aqui tiene algunas preguntas sobre el modo como usted se comporta, siente y actua. Despues de cada pregunta, conteste "SI" o "NO".
                            Trabaje rápidamente, no emplee mucho tiempo en cada pregunta, queremos su primera relación, no un proceso de pensamiento prolongado. El cuestionario total no se debe tomar más de unos pocos minutos. Asegúrase de no omitir preguntas.
                            Ahora puede comenzar a trabajar rápidamente y recuerde que debe contestar todas las preguntas. No hay respuesta correctas ni incorrectas, y este no es un test de inteligencia o habilidad, sino simplemente una medida de la forma como usted se comporta. 
                        </p>
                    </div>
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor   w-full md:m-auto flex md:justify-center">
                                <table  class="table-auto border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem">
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">Nº</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-left">PREGUNTAS</th>
                                            <th class="px-4 py-2 bg-gray-200 text-md w-auto text-center">SÍ</th>
                                            <th class="px-4 py-2 bg-gray-200 text-md w-auto text-center">NO</th>
                                        </tr>          
                                    </thead >
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">01</td>
                                            <td class="px-4 py-2">¿Le gusta la abundancia de la excitación y bullicio a su alrededor?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta1" id="r1" value="1" v-model="pa_1">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2  text-center border-l">
                                                <input type="radio" name="pregunta1" id="r2" value="0" v-model="pa_1">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">02</td>
                                            <td class="px-4 py-2">¿Tiene a menudo un sentimiento de intranquilidad, como si quisiera algo, pero sin saber qué?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta2" id="r1" value="1" v-model="pa_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta2" id="r2" value="0" v-model="pa_2">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">03</td>
                                            <td class="px-4 py-2">¿Tiene casi siempre una contestaciòn lista "a la mano" cuándo se le habla?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta3" id="r1" value="1" v-model="pa_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta3" id="r2" value="0" v-model="pa_3">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">04</td>
                                            <td class="px-4 py-2" >¿Se siente algunas veces feliz, otras triste sin una razón real?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta4" id="r1" value="1" v-model="pa_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta4" id="r2" value="0" v-model="pa_4">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">05</td>
                                            <td class="px-4 py-2">¿Permanece usualmente retraído(a) en fiestas y reuniones?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta5" id="r1" value="1" v-model="pa_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta5" id="r2" value="0" v-model="pa_5">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">06</td>
                                            <td class="px-4 py-2">¿Cuándo niño(a) hacía siempre inmediantamente lo que le decían sin renegar?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta6" id="r1" value="1" v-model="pa_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunt6" id="r2" value="0" v-model="pa_6">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">07</td>
                                            <td class="px-4 py-2">¿Se enfada a menudo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta7" id="r1" value="1" v-model="pa_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta7" id="r2" value="0" v-model="pa_7">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">08</td>
                                            <td class="px-4 py-2">¿Cuándo lo(a) meten en una pelea, prefiere "sacar los trapos de una vez por todas, en vez de quedarse callado(a) esperando que las cosas se calmen solas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta8" id="r1" value="1" v-model="pa_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta8" id="r2" value="0" v-model="pa_8">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">09</td>
                                            <td class="px-4 py-2">¿Es usted triate, melancólico(a)?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta9" id="r1" value="1" v-model="pa_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta9" id="r2"  value="0" v-model="pa_9">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2">¿Le gusta mezclarse con la gente?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta10" id="r1" value="1" v-model="pa_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta10" id="r2" value="0" v-model="pa_10">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2">¿Ha perdido a menudo el sueño por sus preocupaciones?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta11" id="r1" value="1" v-model="pa_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta11" id="r2" value="0" v-model="pa_11">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2">¿Se pone a veces malhumorado(a)?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta12" id="r1" value="1" v-model="pa_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta12" id="r2" value="0" v-model="pa_12">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2">¿Se catalogaría a sí mismo(a) como despreocupado(a) o confiado(a) a su suerte?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta13" id="r1" value="1" v-model="pa_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta13" id="r2" value="0" v-model="pa_13">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2">¿Se decide a menudo demasiado tarde?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta14" id="r1" value="1" v-model="pa_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta14" id="r2" value="0" v-model="pa_14">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2">¿Le gusta trabajar solo(a)?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta15" id="r1" value="1" v-model="pa_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta15" id="r2" value="0" v-model="pa_15">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2">¿Se ha sentido a menudo apático(a) y cansado(a) sin razón?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta16" id="r1" value="1" v-model="pa_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta16" id="r2" value="0" v-model="pa_16">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2">¿Es por el contrario animado(a) y jovial?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta17" id="r1" value="1" v-model="pa_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta17" id="r2" value="0" v-model="pa_17">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2">¿Se ríe a menudo de chistes groseros?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta18" id="r1" value="1" v-model="pa_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta18" id="r2" value="0" v-model="pa_18">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2">¿Se siente a menudo hastiado(a)?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta19" id="r1" value="1" v-model="pa_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta19" id="r2" value="0" v-model="pa_19">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2">¿Se siente incómodo(a) con vestidos que no son del diario?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta20" id="r1" value="1" v-model="pa_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta20" id="r2" value="0" v-model="pa_20">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">21</td>
                                            <td class="px-4 py-2">¿Se distrae (fantasea) a menudo cuando trata de prestar atenciòn a algo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta21" id="r1" value="1" v-model="pa_21">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta21" id="r2" value="0" v-model="pa_21">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">22</td>
                                            <td class="px-4 py-2">¿Puede expresar en palabras fácilmente lo que piensa?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta22" id="r1" value="1" v-model="pa_22">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta22" id="r2" value="0" v-model="pa_22">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">23</td>
                                            <td class="px-4 py-2">¿Se abstrae (pierde en sus pensamientos) a menudo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta23" id="r1" value="1" v-model="pa_23">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta23" id="r2" value="0" v-model="pa_23">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">24</td>
                                            <td class="px-4 py-2">¿Está completamente libre de prejuicios de cualquier tipo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta24" id="r1" value="1" v-model="pa_24">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta24" id="r2" value="0" v-model="pa_24">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">25</td>
                                            <td class="px-4 py-2">¿Le gustan las bromas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta25" id="r1" value="1" v-model="pa_25">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta25" id="r2" value="0" v-model="pa_25">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">26</td>
                                            <td class="px-4 py-2">¿Piensa a menudo en su pasado?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta26" id="r1" value="1" v-model="pa_26">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta26" id="r2" value="0" v-model="pa_26">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">27</td>
                                            <td class="px-4 py-2">¿Le gusta la buena comida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta27" id="r1" value="1" v-model="pa_27">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta27" id="r2" value="0" v-model="pa_27">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">28</td>
                                            <td class="px-4 py-2">¿Cuándo se fastidia, necesita de algún(a) amigo(a) para hablar sobre ello?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta28" id="r1" value="1" v-model="pa_28">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta28" id="r2" value="0" v-model="pa_28">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">29</td>
                                            <td class="px-4 py-2">¿Le molesta vender cosas o pedir dinero a la gente para una buena causa?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta29" id="r1" value="1" v-model="pa_29">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta29" id="r2" value="0" v-model="pa_29">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">30</td>
                                            <td class="px-4 py-2"> Alardea (se jacta) un poco o a veces?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta30" id="r1" value="1" v-model="pa_30">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta30" id="r2" value="0" v-model="pa_30">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">31</td>
                                            <td class="px-4 py-2">¿Es usted muy suceptible por algunas cosas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta31" id="r1" value="1" v-model="pa_31">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta31" id="r2" value="0" v-model="pa_31">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">32</td>
                                            <td class="px-4 py-2">¿Le gusta quedarse en casa que ir a una fiesta aburrida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta32" id="r1" value="1" v-model="pa_32">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta32" id="r2" value="0" v-model="pa_32">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">33</td>
                                            <td class="px-4 py-2">¿Se pone a menudo inquieta que no puede permanecer sentado durante mucho tiempo e?n una silla</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta33" id="r1" value="1" v-model="pa_33">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta33" id="r2" value="0" v-model="pa_33">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">34</td>
                                            <td class="px-4 py-2">¿Le gusta planear las cosas cuidadosamente con mucha anticipación?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta34" id="r1" value="1" v-model="pa_34">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta34" id="r2" value="0" v-model="pa_34">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">35</td>
                                            <td class="px-4 py-2">¿Tiene a menudo mareos (vértigos)?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta35" id="r1" value="1" v-model="pa_35">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta35" id="r2" value="0" v-model="pa_35">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">36</td>
                                            <td class="px-4 py-2">¿Constesta siempre una carta personal, tan pronto como puede, después de haberla leído?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta36" id="r1" value="1" v-model="pa_36">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta36" id="r2" value="0" v-model="pa_36">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">37</td>
                                            <td class="px-4 py-2">¿Hace usted usualmente las cosas mejor resolviéndolas solo(a) que hablando a otros sobre ellas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta37" id="r1" value="1" v-model="pa_37">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta37" id="r2" value="0" v-model="pa_37">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">38</td>
                                            <td class="px-4 py-2">¿Le falta frecuentemente el aire, sin haber hecho un trabajo pesado?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta38" id="r1" value="1" v-model="pa_38">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta38" id="r2" value="0" v-model="pa_38">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">39</td>
                                            <td class="px-4 py-2">¿ES usted una persona generalmente tolerante, que no se molesta si las cosas no están perfectas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta39" id="r1" value="1" v-model="pa_39">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta39" id="r2" value="0" v-model="pa_39">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">40</td>
                                            <td class="px-4 py-2">¿Sufre de los "nervios"?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta40" id="r1" value="1" v-model="pa_40">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta40" id="r2" value="1" v-model="pa_40">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">41</td>
                                            <td class="px-4 py-2">¿Le gustaría más planear las cosas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta41" id="r1" value="1" v-model="pa_41">
                                                <label for="r1"></label>
                                            </td>
                                            <td  class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta41" id="r2" value="0" v-model="pa_41">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">42</td>
                                            <td class="px-4 py-2">¿Deja algunas veces para mañana, lo que debería hacer hoy día?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta42" id="r1" value="1" v-model="pa_42">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta42" id="r2" value="0" v-model="pa_42">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">43</td>
                                            <td class="px-4 py-2">¿Se pone nervioso(a) en lugares tales como ascensores, trenes o túneles?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta43" id="r1" value="1" v-model="pa_43">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta43" id="r2" value="0" v-model="pa_43">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">44</td>
                                            <td class="px-4 py-2">Cuando hace nuevos amigos, ¿es usted quien inicia la relación o invita a que se produzca?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta44" id="r1" value="1" v-model="pa_44">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta44" id="r2" value="0" v-model="pa_44">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">45</td>
                                            <td class="px-4 py-2">¿Sufre fuertes dolores de cabeza?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta45" id="r1" value="1" v-model="pa_45">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta45" id="r2" value="0" v-model="pa_45">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">46</td>
                                            <td class="px-4 py-2">¿Siente generalmente que las cosas se arreglarán por sí solas y que terminarán bien de algún modo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta46" id="r1" value="1" v-model="pa_46">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta46" id="r2" value="0" v-model="pa_46">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">47</td>
                                            <td class="px-4 py-2">¿Le cuesta trabajo el coger sueño al acostarse en la noche?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="prgunta47" id="r1" value="1" v-model="pa_47">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta47" id="r2" value="0" v-model="pa_47">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">48</td>
                                            <td class="px-4 py-2">¿Ha dicho alguna vez mentiras en su vida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta48" id="r1" value="1" v-model="pa_48">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta48" id="r2" value="0" v-model="pa_48">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">49</td>
                                            <td class="px-4 py-2">¿Dice algunas veces lo primero que se le viene a la cabeza?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta49" id="r1" value="1" v-model="pa_49">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta49" id="r2" value="0" v-model="pa_49">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">50</td>
                                            <td class="px-4 py-2">¿Se preocupa durante un tiempo demasiado largo, después de una experiencia de embarazo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta50" id="r1" value="1" v-model="pa_50">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta50" id="r2" value="0" v-model="pa_50">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">51</td>
                                            <td class="px-4 py-2">¿Se mantiene usualmente hermético(a) o encerrado(a) en sí mismo(a), excepto con amigos muy íntimos?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta51" id="r1" value="1" v-model="pa_51">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta51" id="r2" value="0" v-model="pa_51">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">52</td>
                                            <td class="px-4 py-2">¿Se crea a menudo problemas por hacer cosas sin pensar?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta52" id="r1" value="1" v-model="pa_52">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta52" id="r2" value="0" v-model="pa_52">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">53</td>
                                            <td class="px-4 py-2">¿Le gusta contar chistes y referir historias graciosas a sus amigos?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta53" id="r1" value="1" v-model="pa_53">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta53" id="r2" value="0" v-model="pa_53">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">54</td>
                                            <td class="px-4 py-2">¿Se le hace más difícil ganar que perder un juego?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta54" id="r1" value="1" v-model="pa_54">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta54" id="r2" value="0" v-model="pa_54">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">55</td>
                                            <td class="px-4 py-2">¿Se siente a menudo demasiado consciente de sí mismo(a) o poco natural cuando está con sus superiores?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta55" id="r1" value="1" v-model="pa_55">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta55" id="r2" value="0" v-model="pa_55">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">56</td>
                                            <td class="px-4 py-2">Cuando todas las probabilidades están en contra de usted, ¿piensa aún usualmente que vale la pena probar suerte?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta56" id="r1" value="1" v-model="pa_56">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta56" id="r2" value="0" v-model="pa_56">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">57</td>
                                            <td class="px-4 py-2">¿Siente "sensaciones" raras en el abdomen, antes de algún hecho importante?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta57" id="r1" value="1" v-model="pa_57">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="pregunta57" id="r2" value="0" v-model="pa_57">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarPersonalidad()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" >
                                    Guardar
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
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha psicologica</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Habilidades Sociales</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Habilidades Sociales</h3>
                        <p class="mt-4 text-sm text-gray-600">
                             La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md p-10 my-10 text-justify">
                        <h3 class="font-bold">INSTRUCCIONES</h3>
                        <p> A continuacion, encontraras una lista de habilidades que las personas usan en su vida diaria, selecciona tu respuesta marcando una de los casilleros que se ubican en la columna derecha.
                            Recuerde que tu sinceridad es muy importante, no hay respuesta mala ni buena, asegurate de contestar todas. 
                        </p>
                    </div>
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor   w-full md:m-auto flex md:justify-center">
                                <table class="table-auto border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem">
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">N°</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">HABILIDADES SOCIALES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">NUNCA</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">RARAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">ALGUNAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">A MENUDO</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">SIEMPRE</th>            
                                        </tr>
                                    </thead>
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">01</td>
                                            <td class="px-4 py-2">Prefiero mantenerme callado(a) para evitarme problemas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r1" value="5" v-model="pb_1" >
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r2" value="4" v-model="pb_1">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r3" value="3" v-model="pb_1">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r4" value="2" v-model="pb_1">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r5" value="1" v-model="pb_1">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">02</td>
                                            <td class="px-4 py-2">Si un amigo(a) habla mal de mi persona le insulto.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r1" value="5" v-model="pb_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r2" value="4" v-model="pb_2" >
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r3" value="3" v-model="pb_2" >
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r4" value="2" v-model="pb_2" >
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r5" value="1" v-model="pb_2">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">03</td>
                                            <td class="px-4 py-2">Si necesito ayuda, la pido de buena manera.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r1" value="1" v-model="pb_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r2" value="2" v-model="pb_3">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r3" value="3" v-model="pb_3">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r4" value="4" v-model="pb_3">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r5" value="5" v-model="pb_3">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">04</td>
                                            <td class="px-4 py-2">Si un(a) amigo(a) se saca una buena nota en el examen, no le felicito</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r1" value="5" v-model="pb_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r2" value="4" v-model="pb_4">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r3" value="3" v-model="pb_4">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r4" value="2" v-model="pb_4">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r5" value="1" v-model="pb_4">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">05</td>
                                            <td class="px-4 py-2">Agradezco cuando alguien me ayuda.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r1" value="1" v-model="pb_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r2" value="2" v-model="pb_5">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r3" value="3" v-model="pb_5">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r4" value="4" v-model="pb_5">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r5" value="5" v-model="pb_5">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">06</td>
                                            <td class="px-4 py-2">Me acerco a abrazar a mi amigo(a) cuando cumple años.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r1" value="1" v-model="pb_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r2" value="2" v-model="pb_6">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r3" value="3" v-model="pb_6">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r4" value="4" v-model="pb_6">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r5" value="5" v-model="pb_6">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">07</td>
                                            <td class="px-4 py-2">Si un(a) amigo(a) falta a una cita acordada, le expreso mi amargura.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r1" value="1" v-model="pb_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r2" value="2" v-model="pb_7">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r3" value="3" v-model="pb_7">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r4" value="4" v-model="pb_7">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r5" value="5" v-model="pb_7">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">08</td>
                                            <td class="px-4 py-2">Cuando me siento triste, evito contar lo que me pasa.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r1" value="5" v-model="pb_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r2" value="4" v-model="pb_8">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r3" value="3" v-model="pb_8">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r4" value="2" v-model="pb_8">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r5" value="1" v-model="pb_8">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">09</td>
                                            <td class="px-4 py-2">Le digo a mi amigo(a) cuando hace algo que no me agrada.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r1" value="1" v-model="pb_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r2" value="2" v-model="pb_9">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r3" value="3" v-model="pb_9">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r4" value="4" v-model="pb_9">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r5" value="5" v-model="pb_9">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2">Si una persona mayor me insulta me defiendo sin agredirlo, exigiendo mi derecho de ser respetado.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r1" value="1" v-model="pb_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r2" value="2" v-model="pb_10">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r3" value="3" v-model="pb_10">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r4" value="4" v-model="pb_10">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r5" value="5" v-model="pb_10">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2">Reclamo agresvamente con insultos, cuando alguien quiere entrar al cine sin hacer su cola.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r1" value="5" v-model="pb_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r2" value="4" v-model="pb_11">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r3" value="3" v-model="pb_11">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r4" value="2" v-model="pb_11">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r5" value="1" v-model="pb_11">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2">NO hago caso cuando mis amigos(as) me presionan para consumir alcohol.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r1" value="1" v-model="pb_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r2" value="2" v-model="pb_12">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r3" value="3" v-model="pb_12">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r4" value="4" v-model="pb_12">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r5" value="5" v-model="pb_12">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2">Me distraigo fácilmente cuando una persona me habla.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r1" value="5" v-model="pb_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r2" value="4" v-model="pb_13">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r3" value="3" v-model="pb_13">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r4" value="2" v-model="pb_13">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r5" value="1" v-model="pb_13">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2">Pregunto cada vez que sea necesario para entender lo que me dicen.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r1" value="1" v-model="pb_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r2" value="2" v-model="pb_14">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r3" value="3" v-model="pb_14">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r4" value="4" v-model="pb_14">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r5" value="5" v-model="pb_14">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2">Miro a los ojos cuando alguien me habla.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r1" value="1" v-model="pb_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r2" value="2" v-model="pb_15">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r3" value="3" v-model="pb_15">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r4" value="4" v-model="pb_15">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r5" value="5" v-model="pb_15">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2">No pregunto a las personas si me he dejado comprender.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r1" value="5" v-model="pb_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r2" value="4" v-model="pb_16">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r3" value="3" v-model="pb_16">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r4" value="2" v-model="pb_16">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r5" value="1" v-model="pb_16">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2">Me dejo entender con facilidad cuando hablo.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r1" value="1" v-model="pb_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r2" value="2" v-model="pb_17">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r3" value="3" v-model="pb_17">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r4" value="4" v-model="pb_17">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r5" value="5" v-model="pb_17">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2">Utilizo un tono de voz con gestos apropiados para que me escuchen y me entiendan mejor.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r1" value="1" v-model="pb_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r2" value="2" v-model="pb_18">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r3" value="3" v-model="pb_18">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r4" value="4" v-model="pb_18">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r5" value="5" v-model="pb_18">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2">Expreso mis opiniones sin calcular las consecuencias.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r1" value="5" v-model="pb_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r2" value="4" v-model="pb_19">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r3" value="3" v-model="pb_19">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r4" value="2" v-model="pb_19">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r5" value="1" v-model="pb_19">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2">Si estoy "nervioso(a)" trato de relajarme para ordenar mis pensamientos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r1" value="1" v-model="pb_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r2" value="2" v-model="pb_20">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r3" value="3" v-model="pb_20">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r4" value="4" v-model="pb_20">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r5" value="5" v-model="pb_20">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">21</td>
                                            <td class="px-4 py-2">Antes de opinar ordeno mis ideas con calma.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r1" value="1" v-model="pb_21">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r2" value="2" v-model="pb_21">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r3" value="3" v-model="pb_21">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r4" value="4" v-model="pb_21">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r5" value="5" v-model="pb_21">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">22</td>
                                            <td class="px-4 py-2">Evito hacer cosas que puedan dañar mi salud.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r1" value="1" v-model="pb_22">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r2" value="2" v-model="pb_22">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r3" value="3" v-model="pb_22">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r4" value="4" v-model="pb_22">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r5" value="5" v-model="pb_22">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">23</td>
                                            <td class="px-4 py-2">No me siento contento(a) con mi aspecto físico.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r1" value="5" v-model="pb_23">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r2" value="4" v-model="pb_23">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r3" value="3" v-model="pb_23">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r4" value="2" v-model="pb_23">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r5" value="1" v-model="pb_23">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">24</td>
                                            <td class="px-4 py-2">Me gusta verme arreglado(a).</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r1" value="1" v-model="pb_24">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r2" value="2" v-model="pb_24">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r3" value="3" v-model="pb_24">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r4" value="4" v-model="pb_24">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r5" value="5" v-model="pb_24">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">25</td>
                                            <td class="px-4 py-2">Puedo cambiar mi comportamiento cuando me doy cuenta de que estoy equivocado(a).</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r1" value="1" v-model="pb_25">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r2" value="2" v-model="pb_25">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r3" value="3" v-model="pb_25">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r4" value="4" v-model="pb_25">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r5" value="5" v-model="pb_25">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">26</td>
                                            <td class="px-4 py-2">Me da vergüenza felicitar a un amigo(a) cuando realiza algo bueno.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r1" value="5" v-model="pb_26">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r2" value="4" v-model="pb_26">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r3" value="3" v-model="pb_26">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r4" value="2" v-model="pb_26">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r5" value="1" v-model="pb_26">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">27</td>
                                            <td class="px-4 py-2">Reconozco fácilmente mis cualidades positivas y negativas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r1" value="1" v-model="pb_27">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r2" value="2" v-model="pb_27">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r3" value="3" v-model="pb_27">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r4" value="4" v-model="pb_27">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r5" value="5" v-model="pb_27">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">28</td>
                                            <td class="px-4 py-2">Puedo hablar sobre mis temores.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r1" value="1" v-model="pb_28">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r2" value="2" v-model="pb_28">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r3" value="3" v-model="pb_28">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r4" value="4" v-model="pb_28">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r5" value="5" v-model="pb_28">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">29</td>
                                            <td class="px-4 py-2">Cuando algo me sale mal no sé como expresar mi cólera.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab29" id="r1" value="5" v-model="pb_29">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab29" id="r2" value="4" v-model="pb_29">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab29" id="r3" value="3" v-model="pb_29">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab29" id="r4" value="2" v-model="pb_29">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab29" id="r5" value="1" v-model="pb_29">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">30</td>
                                            <td class="px-4 py-2">Comparto mi alegría con mis amigos(as).</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab30" id="r1" value="1" v-model="pb_30">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab30" id="r2" value="2" v-model="pb_30">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab30" id="r3" value="3" v-model="pb_30">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab30" id="r4" value="4" v-model="pb_30">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab30" id="r5" value="5" v-model="pb_30">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">31</td>
                                            <td class="px-4 py-2">Me esfuerzo para ser mejor estudiante.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab31" id="r1" value="1" v-model="pb_31">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab31" id="r2" value="2" v-model="pb_31">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab31" id="r3" value="3" v-model="pb_31">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab31" id="r4" value="4" v-model="pb_31">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab31" id="r5" value="5" v-model="pb_31">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">32</td>
                                            <td class="px-4 py-2">Puedo guardar los secretos de mis amigos(as).</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab32" id="r1" value="1" v-model="pb_32">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab32" id="r2" value="2" v-model="pb_32">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab32" id="r3" value="3" v-model="pb_32">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab32" id="r4" value="4" v-model="pb_32">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab32" id="r5" value="5" v-model="pb_32">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">33</td>
                                            <td class="px-4 py-2">Rechazo hacer las tareas de la casa.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab33" id="r1" value="5" v-model="pb_33">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab33" id="r2" value="4" v-model="pb_33">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab33" id="r3" value="3" v-model="pb_33">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab33" id="r4" value="2" v-model="pb_33">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab33" id="r5" value="1" v-model="pb_33">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">34</td>
                                            <td class="px-4 py-2">Pienso en varias soluciones frente a un problema.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab34" id="r1" value="1" v-model="pb_34">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab34" id="r2" value="2" v-model="pb_34">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab34" id="r3" value="3" v-model="pb_34">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab34" id="r4" value="4" v-model="pb_34">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab34" id="r5" value="5" v-model="pb_34">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">35</td>
                                            <td class="px-4 py-2">Dejo que otros decidan por mi cuando no puedo solucionar un problema.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab35" id="r1" value="5" v-model="pb_35">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab35" id="r2" value="4" v-model="pb_35">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab35" id="r3" value="3" v-model="pb_35">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab35" id="r4" value="2" v-model="pb_35">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab35" id="r5" value="1" v-model="pb_35">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">36</td>
                                            <td class="px-4 py-2">Pienso en las posibles consecuencias de mis decisiones.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab36" id="r1" value="1" v-model="pb_36">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab36" id="r2" value="2" v-model="pb_36">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab36" id="r3" value="3" v-model="pb_36">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab36" id="r4" value="4" v-model="pb_36">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab36" id="r5" value="5" v-model="pb_36">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">37</td>
                                            <td class="px-4 py-2">Tomo decisiones importantes para mi futuro sin el apoyo de otras personas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab37" id="r1" value="5" v-model="pb_37">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab37" id="r2" value="4" v-model="pb_37">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab37" id="r3" value="3" v-model="pb_37">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab37" id="r4" value="2" v-model="pb_37">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab37" id="r5" value="1" v-model="pb_37">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">38</td>
                                            <td class="px-4 py-2">Hago planes para mis vacaciones.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab38" id="r1" value="1" v-model="pb_38">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab38" id="r2" value="2" v-model="pb_38">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab38" id="r3" value="3" v-model="pb_38">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab38" id="r4" value="4" v-model="pb_38">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab38" id="r5" value="5" v-model="pb_38">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">39</td>
                                            <td class="px-4 py-2">Realizo cosas positivas que me ayudarán en mi futuro.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab39" id="r1" value="1" v-model="pb_39">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab39" id="r2" value="2" v-model="pb_39">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab39" id="r3" value="3" v-model="pb_39">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab39" id="r4" value="4" v-model="pb_39">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab39" id="r5" value="5" v-model="pb_39">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">40</td>
                                            <td class="px-4 py-2">Me cuesta decir no, por miedo a ser criticado.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab40" id="r1" value="5" v-model="pb_40">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab40" id="r2" value="4" v-model="pb_40">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab40" id="r3" value="3" v-model="pb_40">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab40" id="r4" value="2" v-model="pb_40">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab40" id="r5" value="1" v-model="pb_40">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">41</td>
                                            <td class="px-4 py-2">Defiendo mi idea cuando veo que mis amigos(as) estan equivocados(as).</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab41" id="r1" value="1" v-model="pb_41">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab41" id="r2" value="2" v-model="pb_41">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab41" id="r3" value="3" v-model="pb_41">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab41" id="r4" value="4" v-model="pb_41">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab41" id="r5" value="5" v-model="pb_41">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">42</td>
                                            <td class="px-4 py-2">Si me presionan para ir a la playa escapándome del colegio, puedo rechazarlo sin temor y vergüenza a los insultos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab42" id="r1" value="1" v-model="pb_42">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab42" id="r2" value="2" v-model="pb_42">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab42" id="r3" value="3" v-model="pb_42">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab42" id="r4" value="4" v-model="pb_42">
                                                <label for="r4"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab42" id="r5" value="5" v-model="pb_42">
                                                <label for="r5"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarHabilidad()"
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
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==3">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha psicologica</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Indice EAA</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Indice EAA</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor  w-full md:m-auto flex md:justify-center">
                                <table class="table-auto border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem" >
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">N°</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">EEA</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">NUNCA</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">ALGUNAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">BUEN NUMERO DE VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">MAYORIA DE VECES</th>            
                                        </tr>
                                    </thead>
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">01</td>
                                            <td class="px-4 py-2">Me siento mas nervioso y ansioso que de costumbre</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac1" id="r1" value="1" v-model="pc_1">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac1" id="r2" value="2" v-model="pc_1">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac1" id="r3" value="3" v-model="pc_1">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac1" id="r4" value="4" v-model="pc_1">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">02</td>
                                            <td class="px-4 py-2 ">Me siento con temor, sin razón.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac2" id="r1" value="1" v-model="pc_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac2" id="r2" value="2" v-model="pc_2">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac2" id="r3" value="3" v-model="pc_2">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac2" id="r4" value="4" v-model="pc_2">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">03</td>
                                            <td class="px-4 py-2 ">Despierto con facilidad o siento pánico</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac3" id="r1" value="1" v-model="pc_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac3" id="r2" value="2" v-model="pc_3">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac3" id="r3" value="3" v-model="pc_3">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac3" id="r4" value="4" v-model="pc_3">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">04</td>
                                            <td class="px-4 py-2 ">Siento como si fuera a reventar y partirme a pedazos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac4" id="r1" value="1" v-model="pc_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac4" id="r2" value="2" v-model="pc_4">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac4" id="r3" value="3" v-model="pc_4">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac4" id="r4" value="4" v-model="pc_4">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">05</td>
                                            <td class="px-4 py-2 ">Siento que todo está bien y que nada malo pueda suceder.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac5" id="r1" value="4" v-model="pc_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac5" id="r2" value="3" v-model="pc_5">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac5" id="r3" value="2" v-model="pc_5">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac5" id="r4" value="1" v-model="pc_5">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">06</td>
                                            <td class="px-4 py-2 ">Me tiemblan los brazos y las pierna.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac6" id="r1" value="1" v-model="pc_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac6" id="r2" value="2" v-model="pc_6">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac6" id="r3" value="3" v-model="pc_6">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac6" id="r4" value="4" v-model="pc_6">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">07</td>
                                            <td class="px-4 py-2 ">Me mortifican los dolores de cabeza, cuello y cintura</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac7" id="r1" value="1" v-model="pc_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac7" id="r2" value="2" v-model="pc_7">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac7" id="r3" value="3" v-model="pc_7">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac7" id="r4" value="4" v-model="pc_7">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">08</td>
                                            <td class="px-4 py-2 ">Me siento debil y me canso facilmente.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac8" id="r1" value="1" v-model="pc_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac8" id="r2" value="2" v-model="pc_8">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac8" id="r3" value="3" v-model="pc_8">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac8" id="r4" value="4" v-model="pc_8">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">09</td>
                                            <td class="px-4 py-2 ">Me siento tranquilo y puedo permanecer en calma facilmente.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac9" id="r1" value="4" v-model="pc_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac9" id="r2" value="3" v-model="pc_9">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac9" id="r3" value="2" v-model="pc_9">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac9" id="r4" value="1" v-model="pc_9">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2 ">Puedo sentir que me late muy rápido el corazón.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac10" id="r1" value="1" v-model="pc_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac10" id="r2" value="2" v-model="pc_10">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac10" id="r3" value="3" v-model="pc_10">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac10" id="r4" value="4" v-model="pc_10">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10" >
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2 ">Sufro de mareos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac11" id="r1" value="1" v-model="pc_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac11" id="r2" value="2" v-model="pc_11">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac11" id="r3" value="3" v-model="pc_11">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac11" id="r4" value="4" v-model="pc_11">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2 ">Sufro de desmayos o siento que me voy a desmayar.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac12" id="r1" value="1" v-model="pc_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac12" id="r2" value="2" v-model="pc_12">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac12" id="r3" value="3" v-model="pc_12">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac12" id="r4" value="4" v-model="pc_12">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2 ">Puedo inhalar y expirar el aire fácilmente.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac13" id="r1" value="4" v-model="pc_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac13" id="r2" value="3" v-model="pc_13">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac13" id="r3" value="2" v-model="pc_13">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac13" id="r4" value="1" v-model="pc_13">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2 ">Se me adormecen o hincan los dedos de las manos y de los pies.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac14" id="r1" value="1" v-model="pc_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac14" id="r2" value="2" v-model="pc_14">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac14" id="r3" value="3" v-model="pc_14">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac14" id="r4" value="4" v-model="pc_14">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2 ">Sufro de molestias de estomacales o indigestion.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac15" id="r1" value="1" v-model="pc_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac15" id="r2" value="2" v-model="pc_15">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac15" id="r3" value="3" v-model="pc_15">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac15" id="r4" value="4" v-model="pc_15">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2 ">Orino con mucha frecuencia.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac16" id="r1" value="1" v-model="pc_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac16" id="r2" value="2" v-model="pc_16">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac16" id="r3" value="3" v-model="pc_16">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac16" id="r4" value="4" v-model="pc_16">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2 ">Generalmente, mis manos están secas y calientes.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac17" id="r1" value="4" v-model="pc_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac17" id="r2" value="3" v-model="pc_17">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac17" id="r3" value="2" v-model="pc_17">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac17" id="r4" value="1" v-model="pc_17">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2 ">Siento bochornos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac18" id="r1" value="1" v-model="pc_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac18" id="r2" value="2" v-model="pc_18">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac18" id="r3" value="3" v-model="pc_18">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac18" id="r4" value="4" v-model="pc_18">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2 ">Me quedo dormido con facilidad y descanso bien durante la noche.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac19" id="r1" value="4" v-model="pc_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac19" id="r2" value="3" v-model="pc_19">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac19" id="r3" value="2" v-model="pc_19">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac19" id="r4" value="1" v-model="pc_19">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2 ">Tengo pesadillas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac20" id="r1" value="1" v-model="pc_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac20" id="r2" value="2" v-model="pc_20">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac20" id="r3" value="3" v-model="pc_20">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntac20" id="r4" value="4" v-model="pc_20">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarEaa()"
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
    <main class="relative top-16 left-0 w-full z-0 md:pl-28 md:pr-36 pt-4 px-8" v-else-if="pagina==4">
        <div class="flex my-4 items-center px-4 sm:px-0">
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha psicologica</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Indice EAMD</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Indice EAMD</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor  w-full md:m-auto flex md:justify-center">
                                <table class="table-auto border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem">
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">N°</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">EAMD</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">MUY POCAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">ALGUNAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">MUCHAS VECES</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">CASI SIEMPRE</th>            
                                        </tr>
                                    </thead>
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">01</td>
                                            <td class="px-4 py-2 ">Me siento triste y decaído</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad1" id="r1" value="1" v-model="pd_1">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad1" id="r2" value="2" v-model="pd_1">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad1" id="r3" value="3" v-model="pd_1">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad1" id="r4" value="4" v-model="pd_1">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">02</td>
                                            <td class="px-4 py-2">Por las mañanas me siento mejor</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad2" id="r1" value="4" v-model="pd_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad2" id="r2" value="3" v-model="pd_2">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad2" id="r3" value="2" v-model="pd_2">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad2" id="r4" value="1" v-model="pd_2">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">03</td>
                                            <td class="px-4 py-2">Tengo ganas de llorar y a veces lloro</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad3" id="r1" value="1" v-model="pd_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad3" id="r2" value="2" v-model="pd_3">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad3" id="r3" value="3" v-model="pd_3">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad3" id="r4" value="4" v-model="pd_3">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">04</td>
                                            <td class="px-4 py-2">Me cuesta dormir mucho por las noches</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad4" id="r1" value="1" v-model="pd_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad4" id="r2" value="2" v-model="pd_4">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad4" id="r3" value="3" v-model="pd_4">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad4" id="r4" value="4" v-model="pd_4">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">05</td>
                                            <td class="px-4 py-2">Como igual que antes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad5" id="r1" value="4" v-model="pd_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad5" id="r2" value="3" v-model="pd_5">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad5" id="r3" value="2" v-model="pd_5">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad5" id="r4" value="1" v-model="pd_5">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">06</td>
                                            <td class="px-4 py-2">Aún tengo deseos sexuales</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad6" id="r1" value="4" v-model="pd_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad6" id="r2" value="3" v-model="pd_6">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad6" id="r3" value="2" v-model="pd_6">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad6" id="r4" value="1" v-model="pd_6">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">07</td>
                                            <td class="px-4 py-2">Noto que estoy adelgazando</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad7" id="r1" value="1" v-model="pd_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad7" id="r2" value="2" v-model="pd_7">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad7" id="r3" value="3" v-model="pd_7">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad7" id="r4" value="4" v-model="pd_7">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">08</td>
                                            <td class="px-4 py-2">Estoy estreñido</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad8" id="r1" value="1" v-model="pd_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad8" id="r2" value="2" v-model="pd_8">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad8" id="r3" value="3" v-model="pd_8">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad8" id="r4" value="4" v-model="pd_8">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">09</td>
                                            <td class="px-4 py-2">El corazón me late más rápido que antes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad9" id="r1" value="1" v-model="pd_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad9" id="r2" value="2" v-model="pd_9">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad9" id="r3" value="3" v-model="pd_9">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad9" id="r4" value="4" v-model="pd_9">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2">Me canso sin motivo</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad10" id="r1" value="1" v-model="pd_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad10" id="r2" value="2" v-model="pd_10">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad10" id="r3" value="3" v-model="pd_10">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad10" id="r4" value="4" v-model="pd_10">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2">Mi mente está tan despejada como siempre</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad11" id="r1" value="4" v-model="pd_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad11" id="r2" value="3" v-model="pd_11">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad11" id="r3" value="2" v-model="pd_11">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad11" id="r4" value="1" v-model="pd_11">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2">Hago las cosas con la misma facilidad que antes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad12" id="r1" value="4" v-model="pd_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad12" id="r2" value="3" v-model="pd_12">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad12" id="r3" value="2" v-model="pd_12">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad12" id="r4" value="1" v-model="pd_12">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2">Me siento intranquilo y no puedo mantenerme quieto</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad13" id="r1" value="1" v-model="pd_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad13" id="r2" value="2" v-model="pd_13">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad13" id="r3" value="3" v-model="pd_13">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad13" id="r4" value="4" v-model="pd_13">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2">Tengo confianza en el futuro</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad14" id="r1" value="4" v-model="pd_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad14" id="r2" value="3" v-model="pd_14">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad14" id="r3" value="2" v-model="pd_14">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad14" id="r4" value="1" v-model="pd_14">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2">Estoy más irritable que antes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad15" id="r1" value="1" v-model="pd_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad15" id="r2" value="2" v-model="pd_15">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad15" id="r3" value="3" v-model="pd_15">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad15" id="r4" value="4" v-model="pd_15">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2">Encuentro fácil tomar decisiones</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad16" id="r1" value="4" v-model="pd_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad16" id="r2" value="3" v-model="pd_16">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad16" id="r3" value="2" v-model="pd_16">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad16" id="r4" value="1" v-model="pd_16">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10" >
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2">Siento que soy útil y necesario</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad17" id="r1" value="4" v-model="pd_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad17" id="r2" value="3" v-model="pd_17">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad17" id="r3" value="2" v-model="pd_17">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad17" id="r4" value="1" v-model="pd_17">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2">Encuentro agradable vivir</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad18" id="r1" value="4" v-model="pd_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad18" id="r2" value="3" v-model="pd_18">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad18" id="r3" value="2" v-model="pd_18">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad18" id="r4" value="1" v-model="pd_18">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2">Creo que sería mejor para  los demás si estuviera muerto</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad19" id="r1" value="1" v-model="pd_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad19" id="r2" value="2" v-model="pd_19">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad19" id="r3" value="3" v-model="pd_19">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad19" id="r4" value="4" v-model="pd_19">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2">Me gustan las mismas cosas que antes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad20" id="r1" value="4" v-model="pd_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad20" id="r2" value="3" v-model="pd_20">
                                                <label for="r2"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad20" id="r3" value="2" v-model="pd_20">
                                                <label for="r3"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntad20" id="r4" value="1" v-model="pd_20">
                                                <label for="r4"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarEamd()"
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
            <h2 class="text-gray-500 hover:text-blue-500 mr-2"><a href="#" @click="pagina=0">Ficha psicologica</a></h2>
            <span>
                <svg class="h-5 w-5 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"/>
            </svg>
            </span>
            <h3 class="text-blue-500 ml-2">Habilidades de Aprendizaje</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Habilidades de Aprendizaje</h3>
                        <p class="mt-4 text-sm text-gray-600">
                            La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md p-10 my-10">
                        <h3 class="font-bold">INSTRUCCIONES</h3>
                        <ul>
                            <li class="list-disc">Este cuestionario ha sido diseñado para identificartu estilo preferido de aprender. No es un test deinteligencia ni de personalidad.</li>
                            <li class="list-disc">No hay limite de tiempo para contestar el cuestionario.</li>
                            <li class="list-disc">No hay respuesta correctas o erróneas. Sera útil la medida que seas sincero (a) en tus respuestas.</li>
                            <li class="list-disc">Si estas más de acuerdo que en desacuerdo con la sentencia marque la opción (+)</li>
                            <li class="list-disc">Si por el contrario, estás más en desacuerdo que de acuerdo, marque la opción (-)</li>
                            <li class="list-disc">Por favor contesta a todas las sentencias.</li>
                        </ul>                   
                    </div>
                    <form action="#" method="POST">
                        <div class="shadow  sm:rounded-md md:p-10">
                            <div class="contenedor overflow-x-auto w-full md:m-auto flex md:justify-center">
                                <table class="table-auto  border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem" >
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">N°</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">SENTENCIAS</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center text-xl">+</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center text-xl">-</th>          
                                        </tr>
                                    </thead>
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">1</td>
                                            <td class="px-4 py-2 border-l">Tengo fama de decir lo que pienso claramente y sin rodeos</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae1" id="r1"  value="1"  v-model="pe_1">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae1" id="r2" value="0" v-model="pe_1">
                                                <label for="r2"></label>
                                            </td>                    
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">2</td>
                                            <td class="px-4 py-2 border-l">Estoy seguro(a) de lo que es bueno y lo que es malo, lo que está bien y lo que está mal</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae2" id="r1" value="1" v-model="pe_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae2" id="r2" value="0" v-model="pe_2">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">3</td>
                                            <td class="px-4 py-2 border-l">Muchas veces actúo sin mirar las consecuencias</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae3" id="r1" value="1" v-model="pe_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae3" id="r2" value="0" v-model="pe_3">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">4</td>
                                            <td class="px-4 py-2 border-l">Normalmente trato de resolver los problemas metódicamente y paso a paso</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae4" id="r1" value="1" v-model="pe_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae4" id="r2" value="0" v-model="pe_4">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">5</td>
                                            <td class="px-4 py-2 border-l">Creo que los formalismos coartan y limitan la actuación libre de las personas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae5" id="r1" value="1" v-model="pe_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae5" id="r2" value="0" v-model="pe_5">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">6</td>
                                            <td class="px-4 py-2 border-l">Me interesa saber cuáles son los sistemas de valores de los demás y con que criterios actúan</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae6" id="r1" value="1" v-model="pe_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae6" id="r2" value="0" v-model="pe_6">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">7</td>
                                            <td class="px-4 py-2 border-l">Pienso que el actuar intuitivamente puede ser siempre tan válido como actuar reflexibamente</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae7" id="r1" value="1" v-model="pe_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae7" id="r2" value="0" v-model="pe_7">
                                                <label for="r2"></label>
                                            </td>                    
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">8</td>
                                            <td class="px-4 py-2 border-l">Creo que los más importante es que las cosas funcionen</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae8" id="r1" value="1" v-model="pe_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae8" id="r2" value="0" v-model="pe_8">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">9</td>
                                            <td class="px-4 py-2 border-l">Procuro estar al tanto de lo que ocurre aquí y ahora</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae9" id="r1" value="1" v-model="pe_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae9" id="r2" value="0" v-model="pe_9">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2 border-l">Disfruto cuando tengo tiempo para preparar mi trabajo y realizarlo a conciencia</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae10" id="r1" value="1" v-model="pe_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae10" id="r2" value="0" v-model="pe_10">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2 border-l">Estoy a gusto siguiendo un orden en las comidas, en el estudio, haciendo ejercicio regularmente</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae11" id="r1" value="1" v-model="pe_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae11" id="r2" value="0" v-model="pe_11">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2 border-l">Cunado escucho una nueva idea enseguida comienzo a pensar cómo ponerla en práctica</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae12" id="r1" value="1" v-model="pe_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae12" id="r2" value="0" v-model="pe_12">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2 border-l">Prefiero las ideas originales y novedades aunque no sean prácticas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae13" id="r1" value="1" v-model="pe_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae13" id="r2" value="0" v-model="pe_13">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2 border-l">Admito y me ajusto a las normas sólo si me sirven para logar mis objetivos</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae14" id="r1" value="1" v-model="pe_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae14" id="r2" value="0" v-model="pe_14">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2 border-l">Normalmente encajo bien con personas reflexivas, y me cuesta sintonizar con personas demasiado espontáneas, imprevisibles</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae15" id="r1" value="1" v-model="pe_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae15" id="r2" value="0" v-model="pe_15">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2 border-l">Esuchi con más frecuencia que hablo</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae16" id="r1" value="1" v-model="pe_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae16" id="r2" value="0" v-model="pe_16">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2 border-l">Prefiero las cosas estructuradas a las desordenadas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae17" id="r1" value="1" v-model="pe_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae17" id="r2" value="0" v-model="pe_17">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2 border-l">Cuando poseo cualquier información, trato de interpretarla bien antes de manifestar alguna conclusión</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae18" id="r1" value="1" v-model="pe_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae18" id="r2" value="0" v-model="pe_18">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2 border-l">Antes de hacer algo, estudio con cuidado sus ventajas e inconvenientes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae19" id="r1" value="1" v-model="pe_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae19" id="r2" value="0" v-model="pe_19">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2 border-l">Me entusiasmo con el reto de hacer algo nuevo y diferente</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae20" id="r1" value="1" v-model="pe_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae20" id="r2" value="0" v-model="pe_20">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">21</td>
                                            <td class="px-4 py-2 border-l">Casi siempre procuro ser coherente con mis criterios y sistemas de valores. Tengo principios y los sigo.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae21" id="r1" value="1" v-model="pe_21">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae21" id="r2" value="0" v-model="pe_21">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">22</td>
                                            <td class="px-4 py-2 border-l">Cuando hay una discusión no me gusta ir con rodeos</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae22" id="r1" value="1" v-model="pe_22">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae22" id="r2" value="0" v-model="pe_22">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">23</td>
                                            <td class="px-4 py-2 border-l">Me disgusta implicarme afectivamente en el ambiente de la escuela. Prefiero mantener relaciones distantes</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae23" id="r1" value="1" v-model="pe_23">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae23" id="r2" value="0" v-model="pe_23">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">24</td>
                                            <td class="px-4 py-2 border-l">Me gustan más las personas realistas y concretas que las teóricas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae24" id="r1" value="1" v-model="pe_24">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae24" id="r2" value="0" v-model="pe_24">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">25</td>
                                            <td class="px-4 py-2 border-l">Me cuesta ser creativo(a), romper estructuras</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae25" id="r1" value="1" v-model="pe_25">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae25" id="r2" value="0" v-model="pe_25">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">26</td>
                                            <td class="px-4 py-2 border-l">Me siento a gusto con personas espontáneas y divertidas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae26" id="r1" value="1" v-model="pe_26">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae26" id="r2" value="0" v-model="pe_26">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">27</td>
                                            <td class="px-4 py-2 border-l">La mayoría de las veces expreso abiertamente como me siento</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae27" id="r1" value="1" v-model="pe_27">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae27" id="r2" value="0" v-model="pe_27">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">28</td>
                                            <td class="px-4 py-2 border-l">Me gusta analizar y dar vueltas a las cosas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae28" id="r1" value="1" v-model="pe_28">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae28" id="r2" value="0" v-model="pe_28">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">29</td>
                                            <td class="px-4 py-2 border-l">Me molesta que la gente no se tome en serio las cosas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae29" id="r1" value="1" v-model="pe_29">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae29" id="r2" value="0" v-model="pe_29">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">30</td>
                                            <td class="px-4 py-2 border-l">Me atrae experimentar y practicar las últimas técnicas y novedades</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae30" id="r1" value="1" v-model="pe_30">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae30" id="r2" value="0" v-model="pe_30">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">31</td>
                                            <td class="px-4 py-2 border-l">Soy cauteloso(a) a la hora de sacar concluisiones</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae31" id="r1" value="1" v-model="pe_31">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae31" id="r2" value="0" v-model="pe_31">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">32</td>
                                            <td class="px-4 py-2 border-l">Prefiero contar con el mayor número de fuentes de información. Cuantos más datos reúna para reflexionar, mejor</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae32" id="r1" value="1" v-model="pe_32">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae32" id="r2" value="0" v-model="pe_32">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">33</td>
                                            <td class="px-4 py-2 border-l">Tiendo a ser perfecionista</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae33" id="r1" value="1" v-model="pe_33">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae33" id="r2" value="0" v-model="pe_33">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">34</td>
                                            <td class="px-4 py-2 border-l">Prefiero oír las opiniones de los demás antes de exponer la mía</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae34" id="r1" value="1" v-model="pe_34">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae34" id="r2" value="0" v-model="pe_34">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">35</td>
                                            <td class="px-4 py-2 border-l">Me gusta afrontar la vida espontáneamente y no tener que planificar todo previamente</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae35" id="r1" value="1" v-model="pe_35">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae35" id="r2" value="0" v-model="pe_35">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">36</td>
                                            <td class="px-4 py-2 border-l">En las discusiones me gusta observar cómo actúan los démas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae36" id="r1" value="1" v-model="pe_36">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae36" id="r2" value="0" v-model="pe_36">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">37</td>
                                            <td class="px-4 py-2 border-l">Me siento incómodo(a) con las personas calladas y demasiado analíticas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae37" id="r1" value="1" v-model="pe_37">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae37" id="r2" value="0" v-model="pe_37">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">38</td>
                                            <td class="px-4 py-2 border-l">Juzgo con frecuencia las ideas de los demás por su valor práctico</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae38" id="r1" value="1" v-model="pe_38">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae38" id="r2" value="0" v-model="pe_38">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">39</td>
                                            <td class="px-4 py-2 border-l">Me agobio si me obligan a acelerar mucho el trabajo para cumplir un plazo</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae39" id="r1" value="1" v-model="pe_39">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae39" id="r2" value="0" v-model="pe_39">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">40</td>
                                            <td class="px-4 py-2 border-l">En las reuniones apoyo las ideas prácticas y realistas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae40" id="r1" value="1" v-model="pe_40">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae40" id="r2" value="0" v-model="pe_40">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">41</td>
                                            <td class="px-4 py-2 border-l">Es mejor gozar del momento presente que deleitarse pensando en el pasado o en el futuro</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae41" id="r1" value="1" v-model="pe_41">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae41" id="r2" value="0" v-model="pe_41">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">42</td>
                                            <td class="px-4 py-2 border-l">Me molestan las personas que siempre desean apresurar las cosas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae42" id="r1" value="1" v-model="pe_42">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae42" id="r2" value="0" v-model="pe_42">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">43</td>
                                            <td class="px-4 py-2 border-l">Aporto ideas nuevas y espontáneas en los grupos de discusión</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae43" id="r1" value="1" v-model="pe_43">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae43" id="r2" value="0" v-model="pe_43">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">44</td>
                                            <td class="px-4 py-2 border-l">Pienso que son más consistentes las decisiones fundamentadas en un minucioso análisis que las basadas en la intuición</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae44" id="r1" value="1" v-model="pe_44">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae44" id="r2" value="0" v-model="pe_44">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">45</td>
                                            <td class="px-4 py-2 border-l">Detecto frecuentemente la inconsistencia y puntos débiles en las argumentaciones de los demás</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae45" id="r1" value="1" v-model="pe_45">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae45" id="r2" value="0" v-model="pe_45">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">46</td>
                                            <td class="px-4 py-2 border-l">Creo que es preciso saltarse las normas muchas veces más que cumplirlas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae46" id="r1" value="1" v-model="pe_46">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae46" id="r2" value="0" v-model="pe_46">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">47</td>
                                            <td class="px-4 py-2 border-l">A menudo caigo en la ceunta de otras formas mejores y más prácticas de hacer las cosas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae47" id="r1" value="1" v-model="pe_47">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae47" id="r2" value="0" v-model="pe_47">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">48</td>
                                            <td class="px-4 py-2 border-l">En conjunto hablo más que escucho</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae48" id="r1" value="1" v-model="pe_48">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae48" id="r2" value="0" v-model="pe_48">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">49</td>
                                            <td class="px-4 py-2 border-l">Prefiero distanciarme de los hechos y observarlos desde otras perspectivas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae49" id="r1" value="1" v-model="pe_49">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae49" id="r2" value="0" v-model="pe_49">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">50</td>
                                            <td class="px-4 py-2 border-l">Estoy convencido(a) que debe imponerse la lógica y el razonamiento</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae50" id="r1" value="1" v-model="pe_50">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae50" id="r2" value="0" v-model="pe_50">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">51</td>
                                            <td class="px-4 py-2 border-l">Me gusta hacer nuevas experiencias</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae51" id="r1" value="1" v-model="pe_51">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae51" id="r2" value="0" v-model="pe_51">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">52</td>
                                            <td class="px-4 py-2 border-l">Me gusta experimentar y aplicar las cosas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae52" id="r1" value="1" v-model="pe_52">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae52" id="r2" value="0" v-model="pe_52">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">53</td>
                                            <td class="px-4 py-2 border-l">Pienso que debemos llegar pronto al grano, al meollo de los temas</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae53" id="r1" value="1" v-model="pe_53">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae53" id="r2" value="0" v-model="pe_53">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">54</td>
                                            <td class="px-4 py-2 border-l">Siempre trato de conseguir conclusiones e ideas claras</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae54" id="r1" value="1" v-model="pe_54">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae54" id="r2" value="0" v-model="pe_54">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">55</td>
                                            <td class="px-4 py-2 border-l">Prefiero  discutie cuestiones concretas y no perder el tiempo con pláticas superficiales.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae55" id="r1" value="1" v-model="pe_55">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae55" id="r2" value="0" v-model="pe_55">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">56</td>
                                            <td class="px-4 py-2 border-l">Me impaciento cuando me dan explicaciones irrelevantes e incoherentes.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae56" id="r1" value="1" v-model="pe_56">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae56" id="r2" value="0" v-model="pe_56">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">57</td>
                                            <td class="px-4 py-2 border-l">Compruebo antes si las cosas funcionan realmente.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae57" id="r1" value="1" v-model="pe_57">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae57" id="r2" value="0" v-model="pe_57">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">58</td>
                                            <td class="px-4 py-2 border-l">Hago varios borradores antes de la redacción definitiva de un trabajo.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae58" id="r1" value="1" v-model="pe_58">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae58" id="r2" value="0" v-model="pe_58">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">59</td>
                                            <td class="px-4 py-2 border-l">Soy conciente de que las discuciones ayudo a mantener a los demás concentrados en el tema, evitando divagaciones.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae59" id="r1" value="1" v-model="pe_59">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae59" id="r2" value="0" v-model="pe_59">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">60</td>
                                            <td class="px-4 py-2 border-l">Observo que, con fecuencia, soy uno(a) de los(as) más objetivos(as) y desapasionados(as) en las discuciones.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae60" id="r1" value="1" v-model="pe_60">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae60" id="r2" value="0" v-model="pe_60">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">61</td>
                                            <td class="px-4 py-2 border-l">Cuando algo va mal, le quito importancia y trato de hacerlo mejor.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae61" id="r1" value="1" v-model="pe_61">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae61" id="r2" value="0" v-model="pe_61">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">62</td>
                                            <td class="px-4 py-2 border-l">Rechazo ideas originaes y espontáneas si no las veo prácticas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae62" id="r1" value="1" v-model="pe_62">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae62" id="r2" value="0" v-model="pe_62">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">63</td>
                                            <td class="px-4 py-2 border-l">Me gusta sopesar diversas alternativas antes de tomar una decisión.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae63" id="r1" value="1" v-model="pe_63">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae63" id="r2" value="0" v-model="pe_63">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">64</td>
                                            <td class="px-4 py-2 border-l">Con frecuencia miro hacia delante para prever el futuro.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae64" id="r1" value="1" v-model="pe_64">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae64" id="r2" value="0" v-model="pe_64">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">65</td>
                                            <td class="px-4 py-2 border-l">En los debates y discusiones prefiero desempeñar un papel secundario antes de ser el(la) lider o el(la) que más participa.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae65" id="r1" value="1" v-model="pe_65">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae65" id="r2" value="0" v-model="pe_65">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">66</td>
                                            <td class="px-4 py-2 border-l">Me molestan las personas que no actúan con lógica.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae66" id="r1" value="1" v-model="pe_66">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae66" id="r2" value="0" v-model="pe_66">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">67</td>
                                            <td class="px-4 py-2 border-l">Me resulta incómodo tener que planificar y prever las cosas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae67" id="r1" value="1" v-model="pe_67">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae67" id="r2" value="0" v-model="pe_67">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">68</td>
                                            <td class="px-4 py-2 border-l">Creo que el fin justifica los medios en muchos casos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae68" id="r1" value="1" v-model="pe_68">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae68" id="r2" value="0" v-model="pe_68">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">69</td>
                                            <td class="px-4 py-2 border-l">Suelo reflexionar sobre los asuntos y problemas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae69" id="r1" value="1" v-model="pe_69">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae69" id="r2" value="0" v-model="pe_69">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">70</td>
                                            <td class="px-4 py-2 border-l">El trabajar a conciencia me llena de satisfaccion y orgullo.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae70" id="r1" value="1" v-model="pe_70">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae70" id="r2" value="0" v-model="pe_70">
                                                <label for="r2"></label>
                                            </td>                       
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">71</td>
                                            <td class="px-4 py-2 border-l">Ante los acontecimientos trato de  descubri los principios y teorias en que se basan.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae71" id="r1" value="1" v-model="pe_71">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae71" id="r2" value="0" v-model="pe_71">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">72</td>
                                            <td class="px-4 py-2 border-l">Con tal de conseguir el objetivo que pretendo, soy capaz de herir sentimientos ajenos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae72" id="r1" value="1" v-model="pe_72">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae72" id="r2" value="0" v-model="pe_72">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">73</td>
                                            <td class="px-4 py-2 border-l">No me importata hacer todo lo necesario para que sea efectivo mi trabajo.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae73" id="r1" value="1" v-model="pe_73">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae73" id="r2" value="0" v-model="pe_73">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">74</td>
                                            <td class="px-4 py-2 border-l">Con frecuencia soy una de las personas que más animaen las fiestas.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae74" id="r1" value="1" v-model="pe_74">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae74" id="r2" value="0" v-model="pe_74">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">75</td>
                                            <td class="px-4 py-2 border-l">Me aburro enseguida con el trabajo metódico y minucioso.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae75" id="r1" value="1" v-model="pe_75">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae75" id="r2" value="0" v-model="pe_75">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">76</td>
                                            <td class="px-4 py-2 border-l">La gente con fecuencia cree que soy poco sensible a sus sentimientos.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae76" id="r1" value="1" v-model="pe_76">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae76" id="r2" value="0" v-model="pe_76">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">77</td>
                                            <td class="px-4 py-2 border-l">Suelo dejarme llevar por mis intuiciones.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae77" id="r1" value="1" v-model="pe_77">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae77" id="r2" value="0" v-model="pe_77">
                                                <label for="r2"></label>
                                            </td>                     
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">78</td>
                                            <td class="px-4 py-2 border-l">Si trabajo en grupo, procuro se se siga un metódo y unorden.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae78" id="r1" value="1" v-model="pe_78">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae78" id="r2" value="0" v-model="pe_78">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">79</td>
                                            <td class="px-4 py-2 border-l">Con frecuencia me interesa averiguar lo que piensa la gente.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae79" id="r1" value="1" v-model="pe_79">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae79" id="r2" value="0" v-model="pe_79">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">80</td>
                                            <td class="px-4 py-2 border-l">Esquivo los temas subjetivos, ambiguos y pocos claros.</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae80" id="r1" value="1" v-model="pe_80">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntae80" id="r2" value="0" v-model="pe_80">
                                                <label for="r2"></label>
                                            </td>                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" @click="guardarAprendisaje()"
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
import {FormWizard, TabContent} from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';
import VueHtml2pdf from 'vue-html2pdf';
import VueBarcode from 'vue-barcode';
export default {
    data(){
        return{
             /**page*/
            pagina:0,
             /** TAB*/
            tabnext1:0,
            tabnext2:0,
            tabnext3:0,
            tabnext4:0,
            tabnext5:0,
            /** Alumno */
            arrayAlumno:[],
            nombres:'',
            apellidoPaterno:'',
            apellidoMaterno:'',
            fecha_nacimiento:'',
            dni:'',
            fecha_nacimiento:'',
            edad:'',
            codigo:0,
            /** ficha A*/
            pa_1:'',
            pa_2:'',
            pa_3:'',
            pa_4:'',
            pa_5:'',
            pa_6:'',
            pa_7:'',
            pa_8:'',
            pa_9:'',
            pa_10:'',
            pa_11:'',
            pa_12:'',
            pa_13:'',
            pa_14:'',
            pa_15:'',
            pa_16:'',
            pa_17:'',
            pa_18:'',
            pa_19:'',
            pa_20:'',
            pa_21:'',
            pa_22:'',
            pa_23:'',
            pa_24:'',
            pa_25:'',
            pa_26:'',
            pa_27:'',
            pa_28:'',
            pa_29:'',
            pa_30:'',
            pa_31:'',
            pa_32:'',
            pa_33:'',
            pa_34:'',
            pa_35:'',
            pa_36:'',
            pa_37:'',
            pa_38:'',
            pa_39:'',
            pa_40:'',
            pa_41:'',
            pa_42:'',
            pa_43:'',
            pa_44:'',
            pa_45:'',
            pa_46:'',
            pa_47:'',
            pa_48:'',
            pa_49:'',
            pa_50:'',
            pa_51:'',
            pa_52:'',
            pa_53:'',
            pa_54:'',
            pa_55:'',
            pa_56:'',
            pa_57:'',
            /** FICHA B */
            pb_1:'',
            pb_2:'',
            pb_3:'',
            pb_4:'',
            pb_5:'',
            pb_6:'',
            pb_7:'',
            pb_8:'',
            pb_9:'',
            pb_10:'',
            pb_11:'',
            pb_12:'',
            pb_13:'',
            pb_14:'',
            pb_15:'',
            pb_16:'',
            pb_17:'',
            pb_18:'',
            pb_19:'',
            pb_20:'',
            pb_21:'',
            pb_22:'',
            pb_23:'',
            pb_24:'',
            pb_25:'',
            pb_26:'',
            pb_27:'',
            pb_28:'',
            pb_29:'',
            pb_30:'',
            pb_31:'',
            pb_32:'',
            pb_33:'',
            pb_34:'',
            pb_35:'',
            pb_36:'',
            pb_37:'',
            pb_38:'',
            pb_39:'',
            pb_40:'',
            pb_41:'',
            pb_42:'',
            /** FICHA C*/
            pc_1:'',
            pc_2:'',
            pc_3:'',
            pc_4:'',
            pc_5:'',
            pc_6:'',
            pc_7:'',
            pc_8:'',
            pc_9:'',
            pc_10:'',
            pc_11:'',
            pc_12:'',
            pc_13:'',
            pc_14:'',
            pc_15:'',
            pc_16:'',
            pc_17:'',
            pc_18:'',
            pc_19:'',
            pc_20:'',
            /** FICHA D*/
            pd_1:'',
            pd_2:'',
            pd_3:'',
            pd_4:'',
            pd_5:'',
            pd_6:'',
            pd_7:'',
            pd_8:'',
            pd_9:'',
            pd_10:'',
            pd_11:'',
            pd_12:'',
            pd_13:'',
            pd_14:'',
            pd_15:'',
            pd_16:'',
            pd_17:'',
            pd_18:'',
            pd_19:'',
            pd_20:'',
            /** ficha E*/
            pe_1:'',
            pe_2:'',
            pe_3:'',
            pe_4:'',
            pe_5:'',
            pe_6:'',
            pe_7:'',
            pe_8:'',
            pe_9:'',
            pe_10:'',
            pe_11:'',
            pe_12:'',
            pe_13:'',
            pe_14:'',
            pe_15:'',
            pe_16:'',
            pe_17:'',
            pe_18:'',
            pe_19:'',
            pe_20:'',
            pe_21:'',
            pe_22:'',
            pe_23:'',
            pe_24:'',
            pe_25:'',
            pe_26:'',
            pe_27:'',
            pe_28:'',
            pe_29:'',
            pe_30:'',
            pe_31:'',
            pe_32:'',
            pe_33:'',
            pe_34:'',
            pe_35:'',
            pe_36:'',
            pe_37:'',
            pe_38:'',
            pe_39:'',
            pe_40:'',
            pe_41:'',
            pe_42:'',
            pe_43:'',
            pe_44:'',
            pe_45:'',
            pe_46:'',
            pe_47:'',
            pe_48:'',
            pe_49:'',
            pe_50:'',
            pe_51:'',
            pe_52:'',
            pe_53:'',
            pe_54:'',
            pe_55:'',
            pe_56:'',
            pe_57:'',
            pe_58:'',
            pe_59:'',
            pe_60:'',
            pe_61:'',
            pe_62:'',
            pe_63:'',
            pe_64:'',
            pe_65:'',
            pe_66:'',
            pe_67:'',
            pe_68:'',
            pe_69:'',
            pe_70:'',
            pe_71:'',
            pe_72:'',
            pe_73:'',
            pe_74:'',
            pe_75:'',
            pe_76:'',
            pe_77:'',
            pe_78:'',
            pe_79:'',
            pe_80:'',
            /** Constancia*/
            dia_constancia:'',
            mes_constancia:'',
            año_constancia:'',
            
                       
        }
    },
    components:{
    'barcode': VueBarcode
    },
    methods:{
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
                }
                me.fechaConstancia();
                me.codigo=(''+me.año_constancia+''+id+'').padStart(8,'0');
            })
            .catch(function (error) {
                console.log(error);
            });
            var url1= '/fechanacimiento';
            axios.post(url1,{'id_alumno':id}).then(function (response) {
                let respuesta = response.data;
                if(respuesta.length> 0){
                   me.fecha_nacimiento=respuesta[0]['fecha_nacimiento'];
                   me.calcularEdad();
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        guardarPersonalidad(){
            var url='/guardarpersonalidad';
            if(this.validarPersonalidad()){
                swal(
                    'Alerta!!!',
                    'Verifique si marco todas las opciones',
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
                            'pa_1':me.pa_1,'pa_2':me.pa_2,'pa_3':me.pa_3,'pa_4':me.pa_4,'pa_5':me.pa_5,
                            'pa_6':me.pa_6,'pa_7':me.pa_7,'pa_8':me.pa_8,'pa_9':me.pa_9,'pa_10':me.pa_10,
                            'pa_11':me.pa_11,'pa_12':me.pa_12,'pa_13':me.pa_13,'pa_14':me.pa_14,'pa_15':me.pa_15,
                            'pa_16':me.pa_16,'pa_17':me.pa_17,'pa_18':me.pa_18,'pa_19':me.pa_19,'pa_20':me.pa_20,
                            'pa_21':me.pa_21,'pa_22':me.pa_22,'pa_23':me.pa_23,'pa_24':me.pa_24,'pa_25':me.pa_25,
                            'pa_26':me.pa_26,'pa_27':me.pa_27,'pa_28':me.pa_28,'pa_29':me.pa_29,'pa_30':me.pa_30,
                            'pa_31':me.pa_31,'pa_32':me.pa_32,'pa_33':me.pa_33,'pa_34':me.pa_34,'pa_35':me.pa_35,
                            'pa_36':me.pa_36,'pa_37':me.pa_37,'pa_38':me.pa_38,'pa_39':me.pa_39,'pa_40':me.pa_40,
                            'pa_41':me.pa_41,'pa_42':me.pa_42,'pa_43':me.pa_43,'pa_44':me.pa_44,'pa_45':me.pa_45,
                            'pa_46':me.pa_46,'pa_47':me.pa_47,'pa_48':me.pa_48,'pa_49':me.pa_49,'pa_50':me.pa_50,
                            'pa_51':me.pa_51,'pa_52':me.pa_52,'pa_53':me.pa_53,'pa_54':me.pa_54,'pa_55':me.pa_55,
                            'pa_56':me.pa_56,'pa_57':me.pa_57,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            me.countInfo();
                            me.siguiente();
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
        validarPersonalidad(){
            let me=this;
            if(me.pa_1=='' || me.pa_2=='' || me.pa_3=='' || me.pa_4=='' || me.pa_5=='' || me.pa_6=='' || me.pa_7=='' || me.pa_8==''
                || me.pa_9=='' || me.pa_10=='' || me.pa_11=='' || me.pa_12=='' || me.pa_13=='' || me.pa_14=='' || me.pa_15==''
                || me.pa_16=='' || me.pa_17=='' || me.pa_18=='' || me.pa_19=='' || me.pa_20=='' || me.pa_21=='' || me.pa_22=='' || me.pa_23==''
                || me.pa_24=='' || me.pa_25=='' || me.pa_26=='' || me.pa_27=='' || me.pa_28=='' || me.pa_29=='' || me.pa_30==''
                || me.pa_31=='' || me.pa_32=='' || me.pa_33=='' || me.pa_34=='' || me.pa_35=='' || me.pa_36=='' || me.pa_37==''
                || me.pa_38=='' || me.pa_39=='' || me.pa_40=='' || me.pa_41=='' || me.pa_42=='' || me.pa_43=='' || me.pa_44==''
                || me.pa_45=='' || me.pa_46=='' || me.pa_47=='' || me.pa_48=='' || me.pa_49=='' || me.pa_50=='' || me.pa_51==''
                || me.pa_52=='' || me.pa_53=='' || me.pa_54=='' || me.pa_55=='' || me.pa_56=='' || me.pa_57==''){
                return 1;
            }else{
                return 0;
            }
        },
        guardarHabilidad(){
            var url='/guardarhabilidad';
            if(this.validarHabilidad()){
                swal(
                    'Alerta!!!',
                    'Verifique si marco todas las opciones',
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
                            'pb_1':me.pb_1,'pb_2':me.pb_2,'pb_3':me.pb_3,'pb_4':me.pb_4,'pb_5':me.pb_5,
                            'pb_6':me.pb_6,'pb_7':me.pb_7,'pb_8':me.pb_8,'pb_9':me.pb_9,'pb_10':me.pb_10,
                            'pb_11':me.pb_11,'pb_12':me.pb_12,'pb_13':me.pb_13,'pb_14':me.pb_14,'pb_15':me.pb_15,
                            'pb_16':me.pb_16,'pb_17':me.pb_17,'pb_18':me.pb_18,'pb_19':me.pb_19,'pb_20':me.pb_20,
                            'pb_21':me.pb_21,'pb_22':me.pb_22,'pb_23':me.pb_23,'pb_24':me.pb_24,'pb_25':me.pb_25,
                            'pb_26':me.pb_26,'pb_27':me.pb_27,'pb_28':me.pb_28,'pb_29':me.pb_29,'pb_30':me.pb_30,
                            'pb_31':me.pb_31,'pb_32':me.pb_32,'pb_33':me.pb_33,'pb_34':me.pb_34,'pb_35':me.pb_35,
                            'pb_36':me.pb_36,'pb_37':me.pb_37,'pb_38':me.pb_38,'pb_39':me.pb_39,'pb_40':me.pb_40,
                            'pb_41':me.pb_41,'pb_42':me.pb_42,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.countInfo();
                                me.siguiente();
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
        validarHabilidad(){
            let me=this;
            if(me.pb_1=='' || me.pb_2=='' || me.pb_3=='' || me.pb_4=='' || me.pb_5=='' || me.pb_6=='' || me.pb_7=='' || me.pb_8==''
                || me.pb_9=='' || me.pb_10=='' || me.pb_11=='' || me.pb_12=='' || me.pb_13=='' || me.pb_14=='' || me.pb_15==''
                || me.pb_16=='' || me.pb_17=='' || me.pb_18=='' || me.pb_19=='' || me.pb_20=='' || me.pb_21=='' || me.pb_22=='' || me.pb_23==''
                || me.pb_24=='' || me.pb_25=='' || me.pb_26=='' || me.pb_27=='' || me.pb_28=='' || me.pb_29=='' || me.pb_30==''
                || me.pb_31=='' || me.pb_32=='' || me.pb_33=='' || me.pb_34=='' || me.pb_35=='' || me.pb_36=='' || me.pb_37==''
                || me.pb_38=='' || me.pb_39=='' || me.pb_40=='' || me.pb_41=='' || me.pb_42==''){
                return 1;
            }else{
                return 0;
            }
        },
        guardarEaa(){
            var url='/guardarEaa';
            if(this.validarEaa()){
                swal(
                    'Alerta!!!',
                    'Verifique si marco todas las opciones',
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
                            'pc_1':me.pc_1,'pc_2':me.pc_2,'pc_3':me.pc_3,'pc_4':me.pc_4,'pc_5':me.pc_5,
                            'pc_6':me.pc_6,'pc_7':me.pc_7,'pc_8':me.pc_8,'pc_9':me.pc_9,'pc_10':me.pc_10,
                            'pc_11':me.pc_11,'pc_12':me.pc_12,'pc_13':me.pc_13,'pc_14':me.pc_14,'pc_15':me.pc_15,
                            'pc_16':me.pc_16,'pc_17':me.pc_17,'pc_18':me.pc_18,'pc_19':me.pc_19,'pc_20':me.pc_20,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.countInfo();
                                me.siguiente();
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
        validarEaa(){
            let me=this;
            if(me.pc_1=='' || me.pc_2=='' || me.pc_3=='' || me.pc_4=='' || me.pc_5=='' || me.pc_6=='' || me.pc_7=='' || me.pc_8==''
                || me.pc_9=='' || me.pc_10=='' || me.pc_11=='' || me.pc_12=='' || me.pc_13=='' || me.pc_14=='' || me.pc_15==''
                || me.pc_16=='' || me.pc_17=='' || me.pc_18=='' || me.pc_19=='' || me.pc_20==''){
                return 1;
            }else{
                return 0;
            }
        },
        guardarEamd(){
            var url='/guardarEamd';
            if(this.validarEamd()){
                swal(
                    'Alerta!!!',
                    'Verifique si marco todas las opciones',
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
                            'pd_1':me.pd_1,'pd_2':me.pd_2,'pd_3':me.pd_3,'pd_4':me.pd_4,'pd_5':me.pd_5,
                            'pd_6':me.pd_6,'pd_7':me.pd_7,'pd_8':me.pd_8,'pd_9':me.pd_9,'pd_10':me.pd_10,
                            'pd_11':me.pd_11,'pd_12':me.pd_12,'pd_13':me.pd_13,'pd_14':me.pd_14,'pd_15':me.pd_15,
                            'pd_16':me.pd_16,'pd_17':me.pd_17,'pd_18':me.pd_18,'pd_19':me.pd_19,'pd_20':me.pd_20,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            me.countInfo();
                            me.siguiente();
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
        validarEamd(){
            let me=this;
            if(me.pd_1=='' || me.pd_2=='' || me.pd_3=='' || me.pd_4=='' || me.pd_5=='' || me.pd_6=='' || me.pd_7=='' || me.pd_8==''
                || me.pd_9=='' || me.pd_10=='' || me.pd_11=='' || me.pd_12=='' || me.pd_13=='' || me.pd_14=='' || me.pd_15==''
                || me.pd_16=='' || me.pd_17=='' || me.pd_18=='' || me.pd_19=='' || me.pd_20==''){
                return 1;
            }else{
                return 0;
            }
        },
        guardarAprendisaje(){
            var url='/guardarAprendisaje';
            if(this.validarAprendisaje()){
                swal(
                    'Alerta!!!',
                    'Verifique si marco todas las opciones',
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
                            'pe_1':me.pe_1,'pe_2':me.pe_2,'pe_3':me.pe_3,'pe_4':me.pe_4,'pe_5':me.pe_5,
                            'pe_6':me.pe_6,'pe_7':me.pe_7,'pe_8':me.pe_8,'pe_9':me.pe_9,'pe_10':me.pe_10,
                            'pe_11':me.pe_11,'pe_12':me.pe_12,'pe_13':me.pe_13,'pe_14':me.pe_14,'pe_15':me.pe_15,
                            'pe_16':me.pe_16,'pe_17':me.pe_17,'pe_18':me.pe_18,'pe_19':me.pe_19,'pe_20':me.pe_20,
                            'pe_21':me.pe_21,'pe_22':me.pe_22,'pe_23':me.pe_23,'pe_24':me.pe_24,'pe_25':me.pe_25,
                            'pe_26':me.pe_26,'pe_27':me.pe_27,'pe_28':me.pe_28,'pe_29':me.pe_29,'pe_30':me.pe_30,
                            'pe_31':me.pe_31,'pe_32':me.pe_32,'pe_33':me.pe_33,'pe_34':me.pe_34,'pe_35':me.pe_35,
                            'pe_36':me.pe_36,'pe_37':me.pe_37,'pe_38':me.pe_38,'pe_39':me.pe_39,'pe_40':me.pe_40,
                            'pe_41':me.pe_41,'pe_42':me.pe_42,'pe_43':me.pe_43,'pe_44':me.pe_44,'pe_45':me.pe_45,
                            'pe_46':me.pe_46,'pe_47':me.pe_47,'pe_48':me.pe_48,'pe_49':me.pe_49,'pe_50':me.pe_50,
                            'pe_51':me.pe_51,'pe_52':me.pe_52,'pe_53':me.pe_53,'pe_54':me.pe_54,'pe_55':me.pe_55,
                            'pe_56':me.pe_56,'pe_57':me.pe_57,'pe_58':me.pe_58,'pe_59':me.pe_59,'pe_60':me.pe_60,
                            'pe_61':me.pe_61,'pe_62':me.pe_62,'pe_63':me.pe_63,'pe_64':me.pe_64,'pe_65':me.pe_65,
                            'pe_66':me.pe_66,'pe_67':me.pe_67,'pe_68':me.pe_68,'pe_69':me.pe_69,'pe_70':me.pe_70,
                            'pe_71':me.pe_71,'pe_72':me.pe_72,'pe_73':me.pe_73,'pe_74':me.pe_74,'pe_75':me.pe_75,
                            'pe_76':me.pe_16,'pe_77':me.pe_77,'pe_78':me.pe_78,'pe_79':me.pe_79,'pe_80':me.pe_80,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                            me.countInfo();
                            me.siguiente();
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
        validarAprendisaje(){
            let me=this;
            if(me.pe_1=='' || me.pe_2=='' || me.pe_3=='' || me.pe_4=='' || me.pe_5=='' || me.pe_6=='' || me.pe_7=='' || me.pe_8==''
                || me.pe_9=='' || me.pe_10=='' || me.pe_11=='' || me.pe_12=='' || me.pe_13=='' || me.pe_14=='' || me.pe_15==''
                || me.pe_16=='' || me.pe_17=='' || me.pe_18=='' || me.pe_19=='' || me.pe_20=='' || me.pe_21=='' || me.pe_22==''
                || me.pe_23=='' || me.pe_24=='' || me.pe_25=='' || me.pe_26=='' || me.pe_27=='' || me.pe_28=='' || me.pe_29==''
                || me.pe_30=='' || me.pe_31=='' || me.pe_32=='' || me.pe_33=='' || me.pe_34=='' || me.pe_35=='' || me.pe_36==''
                || me.pe_37=='' || me.pe_38=='' || me.pe_39=='' || me.pe_40=='' || me.pe_41=='' || me.pe_42=='' || me.pe_43==''
                || me.pe_44=='' || me.pe_45=='' || me.pe_46=='' || me.pe_47=='' || me.pe_48=='' || me.pe_49=='' || me.pe_50==''
                || me.pe_51=='' || me.pe_52=='' || me.pe_53=='' || me.pe_54=='' || me.pe_55=='' || me.pe_56=='' || me.pe_57==''
                || me.pe_58=='' || me.pe_59=='' || me.pe_60=='' || me.pe_61=='' || me.pe_62=='' || me.pe_63=='' || me.pe_64==''
                || me.pe_65=='' || me.pe_66=='' || me.pe_67=='' || me.pe_68=='' || me.pe_69=='' || me.pe_70=='' || me.pe_71==''
                || me.pe_72=='' || me.pe_73=='' || me.pe_74=='' || me.pe_75=='' || me.pe_76=='' || me.pe_77=='' || me.pe_78==''
                || me.pe_79=='' || me.pe_80==''){
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
        countInfo(){
            let me = this;
            var url1 = '/countpersonalidad';
            axios.post(url1,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext1 = parseInt(respuesta[0]['cantidad']);
                    }else{
                        me.tabnext1 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url2 = '/counthabilidad';
            axios.post(url2,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                    if(respuesta.length > 0){
                        me.tabnext2 = parseInt(respuesta[0]['cantidad']);
                    }else{
                        me.tabnext2 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url3 = '/countEaa';
            axios.post(url3,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext3 = parseInt(respuesta[0]['cantidad']);
                    }else{
                        me.tabnext3 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url4 = '/countEamd';
            axios.post(url4,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                   if(respuesta.length > 0){
                        me.tabnext4 = parseInt(respuesta[0]['cantidad']);
                    }else{
                        me.tabnext4 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
            var url5 = '/countAprendisaje';
            axios.post(url5,{'id_alumno':me.$root.id}).then((response) => {
                    var respuesta = response.data;
                  if(respuesta.length > 0){
                        me.tabnext5 = parseInt(respuesta[0]['cantidad']);
                    }else{
                        me.tabnext5 =0;
                    }

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        calcularEdad(){
            var hoy = new Date();
            var cumpleanos = new Date(this.fecha_nacimiento);
            var edad1 = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();
            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad1--;
            }
            if(isNaN(edad1)){
                this.edad='';
            }else{

                this.edad=edad1;
            }
        },
        siguiente(){
            
            $('body, html').animate({
                scrollTop: '0px',
                
            }, 300);
            return true;
        },
    },
    mounted(){
        this.loadAlumno();
        this.countInfo();
    }   
}
</script>
<style >
.pc{
        margin-right: -290px;
    }
</style>