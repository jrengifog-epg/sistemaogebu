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
                    <a href="#" class="text-white hover:text-blue-800 bg-blue-400 rounded-lg px-2 py-2"  @click="generarPdf()" v-if=" tabnext1 > 0 && tabnext2 > 0 ">Descargar Constancia</a>
                </div>
            </div>
            <div class="w-full flex flex-col sm:flex-row">
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4" >
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl" >
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=1" v-if="tabnext1==0">Inventario de Depresión de Beck</a>
                            <a href="#"  v-else-if="tabnext1 > 0">Inventario de Depresión de Beck</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col" >
                        <p class="text-xs text-gray-500" v-if="tabnext1==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext1==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext1 > 0 ">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext1 > 0"></div>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 h-48 mb-4 border rounded-xl shadow-sm sm:mr-4" >
                    <div class="bg-ficha-test h-36 p-4 flex items-end rounded-t-xl" >
                        <h4 class="text-white font-medium text-lg">
                            <a href="#" @click="pagina=2" v-if="tabnext2==0">Evaluación de Síntoma S.R.Q.</a>
                            <a href="#"  v-else-if="tabnext2 > 0">Evaluación de Síntoma S.R.Q.</a>
                        </h4>
                    </div>
                    <div class="px-4 flex justify-center h-12 flex-col" >
                        <p class="text-xs text-gray-500" v-if="tabnext2==0">No completado</p>
                        <div class="border-2 w-full rounded h-1 border-red-400 my-2" v-if="tabnext2==0"></div>
                        <p class="text-xs text-gray-500" v-if="tabnext2 > 0">Completado</p>
                        <div class="border-2 w-full rounded h-1 border-green-400 my-2" v-if="tabnext2 > 0"></div>
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
            <h3 class="text-blue-500 ml-2">Inventario de Depresión de Beck</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Inventario de Depresión de Beck</h3>
                        <p class="mt-4 text-sm text-gray-600">
                             La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md p-10 my-10 text-justify">
                        <h3 class="font-bold text-gray-700">INSTRUCCIONES</h3>
                        <p class="text-gray-700"> Este cuestionario consta de 21 grupos de afirmaciones. Por favor, lea con
                            atención cada uno de ellos cuidadosamente. Luego elija uno de cada grupo, el que mejor
                            describa el modo como se ha sentido las últimas dos semanas, incluyendo el día de hoy.
                        </p>
                    </div>
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor  w-full md:m-auto ">
                                <!-- Pregunta 1: Tristeza -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">1. Tristeza</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_1" name="pregunta_1" value="0" v-model="pa_1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_1" class="ml-2 text-sm  text-gray-700">No me siento triste.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_1" name="pregunta_1" value="1" v-model="pa_1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_1" class="ml-2 text-sm text-gray-700">Me siento triste gran parte del tiempo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_1" name="pregunta_1" value="2" v-model="pa_1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_1" class="ml-2 text-sm text-gray-700">Me siento triste todo el tiempo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_1" name="pregunta_1" value="3" v-model="pa_1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_1" class="ml-2 text-sm text-gray-700">Me siento tan triste o soy tan infeliz que no puedo soportarlo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 2: Pesimismo -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">2. Pesimismo</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_2" name="pregunta_2" value="0" v-model="pa_2" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_2" class="ml-2 text-sm text-gray-700">No estoy desalentado respecto de mi futuro.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_2" name="pregunta_2" value="1" v-model="pa_2" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_2" class="ml-2 text-sm text-gray-700">Me siento más desalentado respecto de mi futuro que lo que solía estarlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_2" name="pregunta_2" value="2" v-model="pa_2" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_2" class="ml-2 text-sm text-gray-700">No espero que las cosas funcionen para mi.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_2" name="pregunta_2" value="3" v-model="pa_2" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_2" class="ml-2 text-sm text-gray-700">Siento que no hay esperanza para mi futuro y que sólo puede empeorar.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 3: Fracaso -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">3. Fracaso</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_3" name="pregunta_3" value="0" v-model="pa_3" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_3" class="ml-2 text-sm text-gray-700">No me siento como un fracasado.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_3" name="pregunta_3" value="1" v-model="pa_3" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_3" class="ml-2 text-sm text-gray-700">He fracasado más de lo que hubiera debido.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_3" name="pregunta_3" value="2" v-model="pa_3" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_3" class="ml-2 text-sm text-gray-700">Cuando miro hacia atrás, veo muchos fracasos.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_3" name="pregunta_3" value="3" v-model="pa_3" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_3" class="ml-2 text-sm text-gray-700">Siento que como persona soy un fracaso total.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 4: Pérdida de Placer -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">4. Pérdida de Placer</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_4" name="pregunta_4" value="0" v-model="pa_4" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_4" class="ml-2 text-sm text-gray-700">Obtengo tanto placer como siempre por las cosas de las que disfruto.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_4" name="pregunta_4" value="1" v-model="pa_4" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_4" class="ml-2 text-sm text-gray-700">No disfruto tanto de las cosas como solía hacerlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_4" name="pregunta_4" value="2" v-model="pa_4" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_4" class="ml-2 text-sm text-gray-700">Obtengo muy poco placer de las cosas que solía disfrutar.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_4" name="pregunta_4" value="3" v-model="pa_4" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_4" class="ml-2 text-sm text-gray-700">No puedo obtener ningún placer de las cosas de las que solía disfrutar.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 5: Sentimientos de Culpa -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">5. Sentimientos de Culpa</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_5" name="pregunta_5" value="0" v-model="pa_5" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_5" class="ml-2 text-sm text-gray-700">No me siento particularmente culpable.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_5" name="pregunta_5" value="1" v-model="pa_5" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_5" class="ml-2 text-sm text-gray-700">Me siento culpable respecto de varias cosas que he hecho o que debería haber hecho.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_5" name="pregunta_5" value="2" v-model="pa_5" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_5" class="ml-2 text-sm text-gray-700">Me siento bastante culpable la mayor parte del tiempo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_5" name="pregunta_5" value="3" v-model="pa_5" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_5" class="ml-2 text-sm text-gray-700">Me siento culpable todo el tiempo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 6: Sentimientos de Castigo -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">6. Sentimientos de Castigo</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_6" name="pregunta_6" value="0" v-model="pa_6" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_6" class="ml-2 text-sm text-gray-700">No siento que este siendo castigado.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_6" name="pregunta_6" value="1" v-model="pa_6" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_6" class="ml-2 text-sm text-gray-700">Siento que tal vez pueda ser castigado.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_6" name="pregunta_6" value="2" v-model="pa_6" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_6" class="ml-2 text-sm text-gray-700">Espero ser castigado.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_6" name="pregunta_6" value="3" v-model="pa_6" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_6" class="ml-2 text-sm text-gray-700">Siento que estoy siendo castigado.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 7: Disconformidad con uno mismo -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">7. Disconformidad con uno mismo</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_7" name="pregunta_7" value="0" v-model="pa_7" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_7" class="ml-2 text-sm text-gray-700">Siento acerca de mi lo mismo que siempre.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_7" name="pregunta_7" value="1" v-model="pa_7" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_7" class="ml-2 text-sm text-gray-700">He perdido la confianza en mí mismo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_7" name="pregunta_7" value="2" v-model="pa_7" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_7" class="ml-2 text-sm text-gray-700">Estoy decepcionado conmigo mismo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_7" name="pregunta_7" value="3" v-model="pa_7" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_7" class="ml-2 text-sm text-gray-700">No me gusto a mí mismo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 8: Autocrítica -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">8. Autocrítica</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_8" name="pregunta_8" value="0" v-model="pa_8" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_8" class="ml-2 text-sm text-gray-700">No me critico ni me culpo más de lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_8" name="pregunta_8" value="1" v-model="pa_8" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_8" class="ml-2 text-sm text-gray-700">Estoy más crítico conmigo mismo de lo que solía estarlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_8" name="pregunta_8" value="2" v-model="pa_8" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_8" class="ml-2 text-sm text-gray-700">Me critico a mí mismo por todos mis errores.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_8" name="pregunta_8" value="3" v-model="pa_8" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_8" class="ml-2 text-sm text-gray-700">Me culpo a mí mismo por todo lo malo que sucede.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 9: Pensamientos o Deseos Suicidas -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">9. Pensamientos o Deseos Suicidas</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_9" name="pregunta_9" value="0" v-model="pa_9" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_9" class="ml-2 text-sm text-gray-700">No tengo ningún pensamiento de matarme.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_9" name="pregunta_9" value="1" v-model="pa_9" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_9" class="ml-2 text-sm text-gray-700">He tenido pensamientos de matarme, pero no lo haría.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_9" name="pregunta_9" value="2" v-model="pa_9" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_9" class="ml-2 text-sm text-gray-700">Querría matarme.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_9" name="pregunta_9" value="3" v-model="pa_9" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_9" class="ml-2 text-sm text-gray-700">Me mataría si tuviera la oportunidad de hacerlo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 10: Llanto -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">10. Llanto</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_10" name="pregunta_10" value="0" v-model="pa_10" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_10" class="ml-2 text-sm text-gray-700">No lloro más de lo que solía hacerlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_10" name="pregunta_10" value="1" v-model="pa_10" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_10" class="ml-2 text-sm text-gray-700">Lloro más de lo que solía hacerlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_10" name="pregunta_10" value="2" v-model="pa_10" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_10" class="ml-2 text-sm text-gray-700">Lloro por cualquier pequeñez.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_10" name="pregunta_10" value="3" v-model="pa_10" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_10" class="ml-2 text-sm text-gray-700">Siento ganas de llorar pero no puedo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 11: Agitación -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">11. Agitación</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_11" name="pregunta_11" value="0" v-model="pa_11" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_11" class="ml-2 text-sm text-gray-700">No estoy más inquieto o tenso que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_11" name="pregunta_11" value="1" v-model="pa_11" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_11" class="ml-2 text-sm text-gray-700">Me siento más inquieto o tenso que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_11" name="pregunta_11" value="2" v-model="pa_11" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_11" class="ml-2 text-sm text-gray-700">Estoy tan inquieto o agitado que me es difícil quedarme quieto.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_11" name="pregunta_11" value="3" v-model="pa_11" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_11" class="ml-2 text-sm text-gray-700">Estoy tan inquieto o agitado que tengo que estar siempre en movimiento o haciendo algo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 12: Pérdida de Interés -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">12. Pérdida de Interés</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_12" name="pregunta_12" value="0" v-model="pa_12" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_12" class="ml-2 text-sm text-gray-700">No he perdido el interés en otras actividades o personas.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_12" name="pregunta_12" value="1" v-model="pa_12" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_12" class="ml-2 text-sm text-gray-700">Estoy menos interesado que antes en otras personas o cosas.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_12" name="pregunta_12" value="2" v-model="pa_12" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_12" class="ml-2 text-sm text-gray-700">He perdido casi todo el interés en otras personas o cosas.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_12" name="pregunta_12" value="3" v-model="pa_12" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_12" class="ml-2 text-sm text-gray-700">Me es difícil interesarme por algo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 13: Indecisión -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">13. Indecisión</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_13" name="pregunta_13" value="0" v-model="pa_13" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_13" class="ml-2 text-sm text-gray-700">Tomo mis propias decisiones tan bien como siempre.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_13" name="pregunta_13" value="1" v-model="pa_13" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_13" class="ml-2 text-sm text-gray-700">Me resulta más difícil que de costumbre tomar decisiones.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_13" name="pregunta_13" value="2" v-model="pa_13" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_13" class="ml-2 text-sm text-gray-700">Encuentro mucha más dificultad que antes para tomar decisiones.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_13" name="pregunta_13" value="3" v-model="pa_13" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_13" class="ml-2 text-sm text-gray-700">Tengo problemas para tomar cualquier decisión.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 14: Desvalorización -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">14. Desvalorización</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_14" name="pregunta_14" value="0" v-model="pa_14" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_14" class="ml-2 text-sm text-gray-700">No siento que yo no sea valioso.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_14" name="pregunta_14" value="1" v-model="pa_14" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_14" class="ml-2 text-sm text-gray-700">No me considero a mí mismo tan valioso y útil como solía considerarme.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_14" name="pregunta_14" value="2" v-model="pa_14" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_14" class="ml-2 text-sm text-gray-700">Me siento menos valioso cuando me comparo con otros.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_14" name="pregunta_14" value="3" v-model="pa_14" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_14" class="ml-2 text-sm text-gray-700">Siento que no valgo nada.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 15: Pérdida de Energía -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">15. Pérdida de Energía</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_15" name="pregunta_15" value="0" v-model="pa_15" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_15" class="ml-2 text-sm text-gray-700">Tengo tanta energía como siempre.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_15" name="pregunta_15" value="1" v-model="pa_15" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_15" class="ml-2 text-sm text-gray-700">Tengo menos energía que la que solía tener.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_15" name="pregunta_15" value="2" v-model="pa_15" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_15" class="ml-2 text-sm text-gray-700">No tengo suficiente energía para hacer demasiado.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_15" name="pregunta_15" value="3" v-model="pa_15" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_15" class="ml-2 text-sm text-gray-700">No tengo energía suficiente para hacer nada.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 16: Cambios en los Hábitos de Sueño -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">16. Cambios en los Hábitos de Sueño</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_16" name="pregunta_16" value="0" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_16" class="ml-2 text-sm text-gray-700">No he experimentado ningún cambio en mis hábitos de sueño.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_16" name="pregunta_16" value="1a" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_16" class="ml-2 text-sm text-gray-700">Duermo un poco más que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_16" name="pregunta_16" value="1b" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_16" class="ml-2 text-sm text-gray-700">Duermo un poco menos que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_16" name="pregunta_16" value="2a" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_16" class="ml-2 text-sm text-gray-700">Duermo mucho más que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r5pregunta_16" name="pregunta_16" value="2b" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r5pregunta_16" class="ml-2 text-sm text-gray-700">Duermo mucho menos que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r6pregunta_16" name="pregunta_16" value="3a" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r6pregunta_16" class="ml-2 text-sm text-gray-700">Duermo la mayor parte del día.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r7pregunta_16" name="pregunta_16" value="3b" v-model="pa_16" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r7pregunta_16" class="ml-2 text-sm text-gray-700">Me despierto 1-2 horas más temprano y no puedo volver a dormirme.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 17: Irritabilidad -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">17. Irritabilidad</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_17" name="pregunta_17" value="0" v-model="pa_17" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_17" class="ml-2 text-sm text-gray-700">No estoy tan irritable que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_17" name="pregunta_17" value="1" v-model="pa_17" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_17" class="ml-2 text-sm text-gray-700">Estoy más irritable que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_17" name="pregunta_17" value="2" v-model="pa_17" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_17" class="ml-2 text-sm text-gray-700">Estoy mucho más irritable que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_17" name="pregunta_17" value="3" v-model="pa_17" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_17" class="ml-2 text-sm text-gray-700">Estoy irritable todo el tiempo.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 18: Cambios en el Apetito -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">18. Cambios en el Apetito</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_18" name="pregunta_18" value="0" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_18" class="ml-2 text-sm text-gray-700">No he experimentado ningún cambio en mi apetito.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_18" name="pregunta_18" value="1a" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_18" class="ml-2 text-sm text-gray-700">Mi apetito es un poco menor que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_18" name="pregunta_18" value="1b" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_18" class="ml-2 text-sm text-gray-700">Mi apetito es un poco mayor que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_18" name="pregunta_18" value="2a" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_18" class="ml-2 text-sm text-gray-700">Mi apetito es mucho menor que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r5pregunta_18" name="pregunta_18" value="2b" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r5pregunta_18" class="ml-2 text-sm text-gray-700">Mi apetito es mucho mayor que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r6pregunta_18" name="pregunta_18" value="3a" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r6pregunta_18" class="ml-2 text-sm text-gray-700">No tengo apetito en absoluto.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r7pregunta_18" name="pregunta_18" value="3b" v-model="pa_18" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r7pregunta_18" class="ml-2 text-sm text-gray-700">Quiero comer todo el día.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 19: Dificultad de Concentración -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">19. Dificultad de Concentración</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_19" name="pregunta_19" value="0" v-model="pa_19" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_19" class="ml-2 text-sm text-gray-700">Puedo concentrarme tan bien como siempre.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_19" name="pregunta_19" value="1" v-model="pa_19" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_19" class="ml-2 text-sm text-gray-700">No puedo concentrarme tan bien como habitualmente.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_19" name="pregunta_19" value="2" v-model="pa_19" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_19" class="ml-2 text-sm text-gray-700">Me es difícil mantener la mente en algo por mucho tiempo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_19" name="pregunta_19" value="3" v-model="pa_19" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_19" class="ml-2 text-sm text-gray-700">Encuentro que no puedo concentrarme en nada.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 20: Cansancio o Fatiga -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">20. Cansancio o Fatiga</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_20" name="pregunta_20" value="0" v-model="pa_20" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_20" class="ml-2 text-sm text-gray-700">No estoy más cansado o fatigado que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_20" name="pregunta_20" value="1" v-model="pa_20" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_20" class="ml-2 text-sm text-gray-700">Me fatigo o me canso más fácilmente que lo habitual.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_20" name="pregunta_20" value="2" v-model="pa_20" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_20" class="ml-2 text-sm text-gray-700">Estoy demasiado fatigado o cansado para hacer muchas de las cosas que solía hacer.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_20" name="pregunta_20" value="3" v-model="pa_20" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_20" class="ml-2 text-sm text-gray-700">Estoy demasiado fatigado o cansado para hacer la mayoría de las cosas que solía hacer.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pregunta 21: Pérdida de Interés en el Sexo -->
                                <div class="mb-4">
                                    <h3 class="font-bold text-lg text-gray-700">21. Pérdida de Interés en el Sexo</h3>
                                    <div class="mt-1 grid grid-rows-4 gap-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" id="r1pregunta_21" name="pregunta_21" value="0" v-model="pa_21" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r1pregunta_21" class="ml-2 text-sm text-gray-700">No he notado ningún cambio reciente en mi interés por el sexo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r2pregunta_21" name="pregunta_21" value="1" v-model="pa_21" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r2pregunta_21" class="ml-2 text-sm text-gray-700">Estoy menos interesado en el sexo de lo que solía estarlo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r3pregunta_21" name="pregunta_21" value="2" v-model="pa_21" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r3pregunta_21" class="ml-2 text-sm text-gray-700">Estoy mucho menos interesado en el sexo.</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="r4pregunta_21" name="pregunta_21" value="3" v-model="pa_21" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                            <label for="r4pregunta_21" class="ml-2 text-sm text-gray-700">He perdido completamente el interés en el sexo.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-4 py-3  text-right sm:px-6">
                                <button type="button" @click="guardaridb()"
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
            <h3 class="text-blue-500 ml-2">Evaluación de Síntoma S.R.Q.</h3>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-medium leading-6 text-gray-900">Evaluación de Síntoma S.R.Q.</h3>
                        <p class="mt-4 text-sm text-gray-600">
                             La información que consignes en esta ficha debe ajustarse a la verdad y nos servira como base para poderte entregar un servicio eficiente y eficaz. 
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md p-10 my-10 text-justify">
                        <h3 class="font-bold text-gray-700">INSTRUCCIONES</h3>
                        <p class="text-gray-700"> A continuacion, selecciona tu respuesta marcando una de los casilleros que se ubican en la columna derecha.
                            Recuerde que tu sinceridad es muy importante, asegurate de contestar todas. 
                        </p>
                    </div>
                    <form action="#" method="POST">
                        <div class="shadow overflow-x-auto sm:rounded-md md:p-10">
                            <div class="contenedor   w-full md:m-auto flex md:justify-center">
                                <table class="table-auto border-collapse w-full ">
                                    <thead>
                                        <tr class="rounded-lg text-xs font-medium text-gray-700 " style="font-size: 0.9674rem">
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">N°</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">CUESTIONARIO</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">SI</th>
                                            <th class="px-4 py-2 bg-gray-200 text-xs w-auto text-center">NO</th>          
                                        </tr>
                                    </thead>
                                    <tbody class="text-md font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">01</td>
                                            <td class="px-4 py-2 ">¿Tiene dolores frecuentes de cabeza?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r1" value="1" v-model="pb_1" >
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab1" id="r2" value="0" v-model="pb_1">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">02</td>
                                            <td class="px-4 py-2">¿Tiene mal apetito?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r1" value="1" v-model="pb_2">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab2" id="r2" value="0" v-model="pb_2" >
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">03</td>
                                            <td class="px-4 py-2">¿Duerme mal?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r1" value="1" v-model="pb_3">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab3" id="r2" value="0" v-model="pb_3">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">04</td>
                                            <td class="px-4 py-2">¿Te asustas con facilidad?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r1" value="1" v-model="pb_4">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab4" id="r2" value="0" v-model="pb_4">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">05</td>
                                            <td class="px-4 py-2">¿Sufre temblor en las manos?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r1" value="1" v-model="pb_5">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab5" id="r2" value="0" v-model="pb_5">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">06</td>
                                            <td class="px-4 py-2">¿Se siente nervioso o tenso?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r1" value="1" v-model="pb_6">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab6" id="r2" value="0" v-model="pb_6">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">07</td>
                                            <td class="px-4 py-2">¿Sufre de estreñimiento?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r1" value="1" v-model="pb_7">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab7" id="r2" value="0" v-model="pb_7">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">08</td>
                                            <td class="px-4 py-2">¿Es incapaz de pensar con claridad?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r1" value="1" v-model="pb_8">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab8" id="r2" value="0" v-model="pb_8">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">09</td>
                                            <td class="px-4 py-2">¿Se siente triste?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r1" value="1" v-model="pb_9">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab9" id="r2" value="0" v-model="pb_9">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">10</td>
                                            <td class="px-4 py-2">¿llora usted con mucha frecuencia?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r1" value="1" v-model="pb_10">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab10" id="r2" value="0" v-model="pb_10">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">11</td>
                                            <td class="px-4 py-2">¿Tiene dificultad en disfrutar de sus actividades diarias?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r1" value="1" v-model="pb_11">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab11" id="r2" value="0" v-model="pb_11">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">12</td>
                                            <td class="px-4 py-2">¿Tiene dificultad para tomar decisiones?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r1" value="1" v-model="pb_12">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab12" id="r2" value="0" v-model="pb_12">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">13</td>
                                            <td class="px-4 py-2">¿Tiene dificultad en hacer su trabajo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r1" value="1" v-model="pb_13">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab13" id="r2" value="0" v-model="pb_13">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">14</td>
                                            <td class="px-4 py-2">¿Es incapaz de desempeñar un papel útil en su vida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r1" value="1" v-model="pb_14">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab14" id="r2" value="0" v-model="pb_14">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">15</td>
                                            <td class="px-4 py-2">¿Ha perdido interés en las cosas?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r1" value="1" v-model="pb_15">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab15" id="r2" value="0" v-model="pb_15">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">16</td>
                                            <td class="px-4 py-2">¿Se siente aburrido?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r1" value="1" v-model="pb_16">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab16" id="r2" value="0" v-model="pb_16">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">17</td>
                                            <td class="px-4 py-2">¿Ha tenido idea de acabar con su vida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r1" value="1" v-model="pb_17">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab17" id="r2" value="0" v-model="pb_17">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">18</td>
                                            <td class="px-4 py-2">¿Se siente cansado todo el tiempo?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r1" value="1" v-model="pb_18">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab18" id="r2" value="0" v-model="pb_18">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">19</td>
                                            <td class="px-4 py-2">¿Siente usted que alguien ha tratado de herirlo en alguna forma?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r1" value="1" v-model="pb_19">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab19" id="r2" value="0" v-model="pb_19">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">20</td>
                                            <td class="px-4 py-2">¿Es usted una persona mucho más importante que lo que piensan los demás?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r1" value="1" v-model="pb_20">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab20" id="r2" value="0" v-model="pb_20">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">21</td>
                                            <td class="px-4 py-2">¿Ha notado interferencias o algo en su pensamiento?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r1" value="1" v-model="pb_21">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab21" id="r2" value="0" v-model="pb_21">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">22</td>
                                            <td class="px-4 py-2">¿Oye voces sin saber de dónde vienen o que otras personas no pueden oír?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r1" value="1" v-model="pb_22">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab22" id="r2" value="0" v-model="pb_22">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">23</td>
                                            <td class="px-4 py-2">¿Ha tenido convulsiones, ataques o caídas al suelo con movimientos de brazos y piernas, mordedura de la lengua o perdida de conocimiento?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r1" value="1" v-model="pb_23">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab23" id="r2" value="0" v-model="pb_23">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">24</td>
                                            <td class="px-4 py-2">¿Alguna vez le ha parecido a su familia, sus amigos, su medico o su sacerdote de usted estaba bebiendo demasiado?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r1" value="1" v-model="pb_24">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab24" id="r2" value="0" v-model="pb_24">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">25</td>
                                            <td class="px-4 py-2">¿Alguna vez ha querido dejar de beber pero no ha podido?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r1" value="1" v-model="pb_25">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab25" id="r2" value="0" v-model="pb_25">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">26</td>
                                            <td class="px-4 py-2">¿Ha tenido alguna vez dificultades en el trabajo o en el estudio a causa de la bebida?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r1" value="1" v-model="pb_26">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab26" id="r2" value="0" v-model="pb_26">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">27</td>
                                            <td class="px-4 py-2">¿Ha estado en riñas o la han detenido estando borracho?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r1" value="1" v-model="pb_27">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab27" id="r2" value="0" v-model="pb_27">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 border-b border-l-2 border-r border-gray-200 py-10">
                                            <td class="px-4 py-2 uppercase text-center">28</td>
                                            <td class="px-4 py-2">¿Le ha parecido alguna vez que usted bebía demasiado?</td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r1" value="1" v-model="pb_28">
                                                <label for="r1"></label>
                                            </td>
                                            <td class="px-4 py-2 text-center border-l">
                                                <input type="radio" name="preguntab28" id="r2" value="0" v-model="pb_28">
                                                <label for="r2"></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="button" @click="guardarsqr()"
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
        guardaridb(){
            var url='/guardaridb';
            if(this.validaridb()){
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
                            'pa_21':me.pa_21,
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
        validaridb(){
            let me=this;
            if(me.pa_1=='' || me.pa_2=='' || me.pa_3=='' || me.pa_4=='' || me.pa_5=='' || me.pa_6=='' || me.pa_7=='' || me.pa_8==''
                || me.pa_9=='' || me.pa_10=='' || me.pa_11=='' || me.pa_12=='' || me.pa_13=='' || me.pa_14=='' || me.pa_15==''
                || me.pa_16=='' || me.pa_17=='' || me.pa_18=='' || me.pa_19=='' || me.pa_20=='' || me.pa_21=='' ){
                return 1;
            }else{
                return 0;
            }
        },
        guardarsqr(){
            var url='/guardarsqr';
            if(this.validarsqr()){
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
                            'pb_26':me.pb_26,'pb_27':me.pb_27,'pb_28':me.pb_28,
                            'id_alumno': me.$root.id
                        }).then(function (response) {
                                me.countInfo();
                                me.siguiente();
                                me.pagina=0;
                            if(response.data==1){
                                swal(
                                'Guardado!!!',
                                'Datos registrados correctamente.',
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
        validarsqr(){
            let me=this;
            if(me.pb_1=='' || me.pb_2=='' || me.pb_3=='' || me.pb_4=='' || me.pb_5=='' || me.pb_6=='' || me.pb_7=='' || me.pb_8==''
                || me.pb_9=='' || me.pb_10=='' || me.pb_11=='' || me.pb_12=='' || me.pb_13=='' || me.pb_14=='' || me.pb_15==''
                || me.pb_16=='' || me.pb_17=='' || me.pb_18=='' || me.pb_19=='' || me.pb_20=='' || me.pb_21=='' || me.pb_22=='' || me.pb_23==''
                || me.pb_24=='' || me.pb_25=='' || me.pb_26=='' || me.pb_27=='' || me.pb_28==''){
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
            var url1 = '/countidb';
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
            var url2 = '/countsqr';
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