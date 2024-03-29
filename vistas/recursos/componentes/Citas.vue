<template>
    <section  class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8" v-if="pagina==0">
        <h2 class="text-xl font-semibold mb-4">Citas Medicas</h2>
        <div class="my-2 flex sm:flex-row flex-col pb-2 md:justify-end">
                <div class="flex flex-row mb-1 w-full md:w-auto sm:mb-0">
                    <div class="relative w-3/6 md:w-auto">
                        <label
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                            Estado
                        </label>
                    </div>
                    <div class="relative  w-4/6 md:w-auto xl:w-40">
                          <select
                                class="appearance-none h-full rounded-r border-t  border-b border-r  md:border-r-0 md:rounded-r-none block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                v-model="estado"
                                >
                                <option value="">--</option>
                                <option value="1">Registrado</option>
                                <option value="0">Finalizado</option>
                                <option value="2">Cancelado</option>
                            </select>
                    </div>
                </div>
                <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0 ">
                    <div class="relative w-3/6 md:w-auto xl:w-40">
                         <select
                            @change="limpiarfiltro()"
                            class="appearance-none h-full rounded-l md:rounded-l-none border block  w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 "
                            v-model="filtro"
                            >
                            <option value="c.asunto">Asunto</option>
                            <option  value="c.id_alumno">Paciente</option>
                            <option v-if="$root.id == 1 " value="h.id_medico">Medico</option>
                            <option value="h.fecha">Fecha</option>
                        </select>
                    </div>
                    <div v-if="filtro=='c.asunto'" class="relative w-4/6 md:w-auto xl:w-96">
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
                    <div v-else-if="filtro=='h.id_medico'" class="relative w-4/6 md:w-auto xl:w-96">
                        <t-rich-select
                                key="medico"
                                :fetch-options="selectMedicos"
                                value-attribute="apellidos"
                                text-attribute="apellidos"
                                label="nombres"
                                placeholder="Buscar Medico..."
                                v-model="selected"
                                @input="getDatosMedico(selected)"
                                searchingText="Buscando..."
                                searchBoxPlaceholder="Buscar..."
                                noResultsText="No se encontraron resultados"
                                :minimumInputLength="1"
                            >
                                <template
                                slot="label"
                                slot-scope="{className, option}"
                                >
                                <div class="flex">
                                    <div class="flex flex-col ml-2 ">
                                    {{option.raw.apellidos+', '+option.raw.nombres}}
                                    </div>
                                </div>
                                </template>
                                <template
                                slot="option"
                                slot-scope="{option}"
                                >
                                <div class="flex">
                                    <div class="flex flex-col ml-2">
                                        {{option.raw.apellidos+', '+option.raw.nombres}}
                                    </div>
                                </div>
                                </template>
                        </t-rich-select>
                    </div>
                    <div v-else-if="filtro=='c.id_alumno'" class="relative w-4/6 md:w-auto xl:w-96">
                        <t-rich-select
                                key="alumno"
                                :fetch-options="selectAlumnos"
                                value-attribute="dni"
                                text-attribute="dni"
                                placeholder="Buscar Paciente..."
                                v-model="selected"
                                @input="getDatosAlumnos(selected)"
                                searchingText="Buscando..."
                                searchBoxPlaceholder="Buscar..."
                                noResultsText="No se encontraron resultados"
                                :minimumInputLength="1"
                            >
                                <template
                                slot="label"
                                slot-scope="{className, option}"
                                >
                                <div class="flex">
                                    <div class="flex flex-col ml-2 ">
                                    {{option.raw.dni +'-'+option.raw.apellidoPaterno +' '+option.raw.apellidoMaterno +', '+option.raw.nombres}}
                                    </div>
                                </div>
                                </template>
                                <template
                                slot="option"
                                slot-scope="{option}"
                                >
                                <div class="flex">
                                    <div class="flex flex-col ml-2">
                                        {{option.raw.dni +'-'+option.raw.apellidoPaterno +' '+option.raw.apellidoMaterno +', '+option.raw.nombres}}
                                    </div>
                                </div>
                                </template>
                        </t-rich-select>
                    </div>
                    <div v-else-if="filtro=='h.fecha'" class="relative w-4/6 md:w-auto xl:w-96">
                        <input
                            type="date"
                            class="appearance-none rounded-r  rounded-l-none border-t border-r border-b  border-gray-400 block pl-8 pr-6 py-2 w-full bg-white placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                            v-model="dato"
                            />
                    </div>
                </div> 
                <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0  justify-center">
                    <div class="flex flex-row  pt-1 md:px-1 md:pt-0 justify-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="loadCitas()">Buscar</button>
                    </div>
                     <div class="flex flex-row  pt-1 md:px-1 md:pt-0 justify-center">
                        <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded" @click="pagina=1">Añadir horarios</button>
                    </div>
                </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-6">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-6">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <t-table   class="min-w-full divide-y divide-gray-200"
                                    :data="arrayCitas"
                                    :responsive="true"
                                    :responsive-breakpoint="520"
                                    >
                                     <template slot="thead" >
                                        <thead :class="'bg-gray-50'">
                                            <tr >
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha / Hora
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Paciente
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Asunto
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Medico
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Estado
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                    </template>
                                    <!--<template slot="tbody" slot-scope="{ tbodyClass, trClass,  renderResponsive, data }">
                                        <template v-if="renderResponsive">
                                            <tbody
                                                v-for="(row, rowIndex) in data"
                                                :key="rowIndex"
                                                :class="[tbodyClass, rowIndex % 2 === 0 ?  'bg-white divide-y divide-gray-200' : 'bg-gray-100 bg-white divide-y divide-gray-200']"
                                            >
                                                <tr :class="trClass">
                                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Fecha / Hora
                                                    </th>
                                                    <td :class="['px-6 py-4 whitespace-no-wrap text-sm text-gray-500']" >
                                                        {{ row.fecha+' / '+row.hora }}
                                                    </td>
                                                </tr>
                                                <tr :class="trClass">
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Paciente
                                                    </th>
                                                     <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900']" >
                                                        {{ row.paciente }}
                                                    </td>
                                                </tr>
                                                <tr :class="trClass">
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Asunto
                                                    </th>
                                                    <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900 capitalize']" >
                                                        {{ row.asunto }}
                                                    </td>
                                                </tr>
                                                <tr :class="trClass">
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Medico
                                                    </th>
                                                    <td :class="['px-6 py-4 whitespace-now-rap text-sm text-gray-700 capitalize']" >
                                                        {{ 'Dr. '+ row.medico }}
                                                    </td>
                                                </tr>
                                                 <tr :class="trClass">
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Estado
                                                    </th>
                                                     <td :class="[ 'px-6 py-4 whitespace-nowrap  text-center']" >
                                                        <span v-if="row.estado==1" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                            Registrado
                                                        </span>
                                                        <span v-else-if="row.estado==0" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                            Finalizado
                                                        </span>
                                                        <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-200 text-orange-800">
                                                            Cancelado
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr :class="trClass">
                                                    <th class="px-1 text-gray-500  align-middle border border-solid border-green-200 py-1 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-center" style="border-bottom: 1px solid #edf2f7;">
                                                        OPCION
                                                    </th>
                                                     <td :class="['px-6 py-4 whitespace-nowrap text-center text-sm font-medium']">
                                                        <a href="#" @click="viewCita(row.id_cita)" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </template>
                                    <template slot="row" slot-scope="{ trClass,  rowIndex, row }">
                                            <tr :class="[trClass, rowIndex % 2 === 0 ? '' : 'bg-blue-100']">
                                                <td :class="['px-6 py-4 whitespace-no-wrap text-sm text-gray-500']" >
                                                    {{ row.fecha+' / '+row.hora }}
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900']" >
                                                    {{ row.paciente }}
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900 capitalize']" >
                                                    {{ row.asunto }}
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-now-rap text-sm text-gray-700 capitalize']" >
                                                    {{ 'Dr. '+ row.medico }}
                                                </td>
                                                <td :class="[ 'px-6 py-4 whitespace-nowrap']" >
                                                    <span v-if="row.estado==1" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                        Registrado
                                                    </span>
                                                    <span v-else-if="row.estado==0" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                        Finalizado
                                                    </span>
                                                    <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-yellow-800">
                                                        Cancelado
                                                    </span>
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-right text-sm font-medium']">
                                                    
                                                    <a href="#" @click="viewCita(row.id_cita)" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                </td>
                                            </tr>
                                    </template>-->
                                    es
                                    <template slot="row" slot-scope="{ trClass,  rowIndex, row }">
                                            <tr :class="[trClass, rowIndex % 2 === 0 ? '' : 'bg-blue-100']">
                                                <td :class="['px-6 py-4 whitespace-no-wrap text-sm text-gray-500']" >
                                                    07-08-2021 / 09:00 a 10:00
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900']" >
                                                    JHONATAN RENGIFO GRANDEZ
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-sm text-gray-900 capitalize']" >
                                                    REVISION GENERAL
                                                </td>
                                                <td :class="['px-6 py-4 whitespace-now-rap text-sm text-gray-700 capitalize']" >
                                                    Dr(a). medico
                                                </td>
                                                <td :class="[ 'px-6 py-4 whitespace-nowrap']" >
                                                    <span  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                        Registrado
                                                    </span>
                                                <td :class="['px-6 py-4 whitespace-nowrap text-right text-sm font-medium']">
                                                    
                                                    <a href="#" @click="viewCita(1)" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                </td>
                                            </tr>
                                    </template>
                                    <template slot="tfoot" slot-scope="{ tfootClass, trClass, tdClass, renderResponsive }">
                                        <tfoot :class="tfootClass">
                                            <tr :class="[trClass,'pt-6']">
                                                <td
                                                :class="[tdClass,'py-3']"
                                                :colspan="renderResponsive ? 2 : 6"
                                                >
                                                <t-pagination
                                                    :hide-prev-next-controls="renderResponsive"
                                                    :total-items="rows"
                                                    :limit="5"
                                                    :per-page="10"
                                                    v-model="page_number"
                                                    @change="loadDatosColegio()"
                                                    :class="{'ml-auto': !renderResponsive, 'mx-auto': renderResponsive}"
                                                />
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </template>
                        </t-table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8"  v-else-if="pagina==1">
        <h1>En construccion</h1>
    </section>
    <section class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8"  v-else-if="pagina==2">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Vista Cita Medica</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Información del Cita Medica
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="'CITA N°- '+(id_cita).padStart(8,'0')">
                                
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500" v-text="fecha+' / '+hora">
                               
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Paciente
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="paciente">
                                        
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500" >
                                        Dni
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="dni">
                                           
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Telefono
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="telefono">
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Correo
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="correo">
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Asunto
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="asunto">
                                       
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Descripcion
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" v-text="descripcion">
                                       
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Acciones</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Acciones del sistema
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a  href="#" v-if="estado_cita==1 & this.$root.id_rol==2"  @click="pagina=2"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Tratamiento
                            </a>
                            <a  href="#" v-if="estado_cita==1" @click="cancelarCita(id_cita)"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Cancelar Cita
                            </a>
                            <a  href="#"
                                @click="back()"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Atras
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-16 left-0 w-full z-30 md:pl-28 md:pr-36 pt-4 px-4 md:px-8 mb-8"  v-else-if="pagina==3">
        <h2 class="text-xl font-semibold mb-4 uppercase">Añadir Tratamiento <span v-text="'CITA N°- '+(id_cita).padStart(8,'0')"></span></h2>
        <div class="flex flex-col">
            <div class="my-2 flex sm:flex-row flex-col pb-2 md:justify-end">
                <div class="flex flex-row mb-1 w-full md:w-auto sm:mb-0">
                    <div class="relative w-3/6 md:w-auto">
                        <label
                            class="appearance-none h-full rounded-l border block  w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                            Medicina
                        </label>
                    </div>
                    <div class="relative  w-4/6 md:w-auto xl:w-64">
                          <input placeholder=""
                            class="appearance-none rounded-r md:rounded-r-none rounded-l-none border-t border-r md:border-r-0 border-b  border-gray-400 block px-2 py-2 w-full bg-white placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none uppercase " 
                            v-model="medicina"
                            />
                    </div>
                </div>
                <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0 ">
                    <div class="relative w-3/6 md:w-auto xl:w-40">
                         <label
                            class="appearance-none h-full rounded-l md:rounded-l-none border block  w-full bg-gray-200 border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 ">
                            Tratamiento
                        </label>
                    </div>
                    <div class="relative w-4/6 md:w-auto xl:w-96">
                        <input placeholder=""
                            class="appearance-none rounded-r  rounded-l-none border-t border-r border-b  border-gray-400 block px-2  pr-6 py-2 w-full bg-white placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none uppercase " 
                            v-model="tratamiento"
                            />
                    </div>
                </div> 
                <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0  justify-center">
                    <div class="flex flex-row  pt-1 md:px-1 md:pt-0 justify-center">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" @click="agregarTratamiento()">AÑADIR</button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-6">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-6">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table-auto border-collapse w-full">
                                <thead>
                                    <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">N°</th>
                                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Medicina</th>
                                        <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Tratamiento</th>
                                        <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Opcion</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-normal text-gray-700" v-if="arrayTratamientos.length > 0">
                                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-10"  v-for="(t,index) in arrayTratamientos" >
                                        <td class="px-4 py-2 " v-text="index+1"></td>
                                        <td class="px-4 py-2 uppercase" v-text="t.medicina"></td>
                                        <td class="px-4 py-2 uppercase" v-text="t.tratamiento"></td>
                                        <td class="px-4 py-2"><a  href="#"@click="eliminarTratamiento(index)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">eliminar</a></td>
                                    </tr>
                                </tbody>
                                 <tbody class="text-sm font-normal text-gray-700" v-else >
                                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-10" >
                                        <td class="px-4 py-4 text-center" colspan="4">No hay Registro del tratamiento</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2 flex sm:flex-row flex-col pb-2 md:justify-end">
                <div class="flex flex-row mb-1 w-full md:w-auto  sm:mb-0  justify-center">
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a  href="#" v-if="estado_cita==1" @click="saveTratamiento()"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Guardar
                        </a>
                        <a  href="#"
                            @click="backcita()"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Atras
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import {
    TRichSelect,
    TTable,
    TPagination,
    TDropdown
    } from 'vue-tailwind/dist/components';
export default {
    data(){
            return{
                arrayCitas:[1],
                arrayCita:[],
                arrayTratamientos:[],
                /**filtros */
                estado:'',
                filtro:'c.asunto',
                dato:'',
                /*pagination*/
                page_number:1,
                rows:0,
                pagina:0,
                /**Select */
                selected: '',
                /**Cita */
                id_cita:'',
                id_horario:'',
                fecha:'',
                hora:'',
                paciente:'',
                dni:'',
                telefono:'',
                correo:'',
                asunto:'',
                descripcion:'',
                estado_cita:'',
                /** Tratamiento*/
                medicina:'',
                tratamiento:''

            }
        },    
    components: {
            TRichSelect,
            TTable,
            TPagination,
            TDropdown
        },
    methods:{
        loadCitas(){
                let me = this;
                var url= '/citas';
                if(this.$root.id == 1){
                    var id_persona = '';
                }else{
                    var id_persona= this.$root.id;
                }
                axios.post(url,{ 'page_number': this.page_number,'estado':this.estado,'filtro':this.filtro,'dato':this.dato,'id_medico':id_persona}).then(function (response) {
                    let respuesta = response.data;
                    me.arrayCitas = respuesta;
                    me.loadTotales();
                    
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadTotales(){
                let me = this;
                var url= '/citasTotales';
                if(this.$root.id == 1){
                    var id_persona = '';
                }else{
                    var id_persona = this.$root.id;
                }
                axios.post(url,{'estado':this.estado,'filtro':this.filtro,'dato':this.dato,'id_medico':id_persona}).then(function (response) {
                    let respuesta = response.data;
                    me.rows= parseInt(respuesta[0]['cantidad']);
                })
                .catch(function (error) {
                    console.log(error);
                });
                
        },
        viewCita(id){
            let me = this;
            me.pagina=1;
            var url= '/cita';
            axios.post(url,{'id_cita':id}).then(function (response) {
                let respuesta = response.data;
                me.arrayCita=respuesta;
                if(me.arrayCita.length>0){
                    me.id_cita=me.arrayCita[0]['id_cita'];
                    me.id_horario=me.arrayCita[0]['id_horario'];
                    me.fecha=me.arrayCita[0]['fecha'];
                    me.hora=me.arrayCita[0]['hora'];
                    me.paciente=me.arrayCita[0]['paciente'];
                    me.dni=me.arrayCita[0]['dni'];
                    me.telefono=me.arrayCita[0]['telefono'];
                    me.correo=me.arrayCita[0]['correo'];
                    me.asunto=me.arrayCita[0]['asunto'];
                    me.descripcion=me.arrayCita[0]['descripcion'];
                    me.estado_cita=me.arrayCita[0]['estado'];
                
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        agregarTratamiento(){
            if(this.medicina=='' || this.tratamiento==''){
                    swal({
                title: "Campos vaxios",
                text: "Verifique que todos los campos esten llenos",
                type: "error",
                timer: 2000,
                showConfirmButton: false
            });

            }else{
                this.arrayTratamientos.push({
                    medicina: this.medicina,
                    tratamiento: this.tratamiento,
                });
                this.medicina='';
                this.tratamiento='';
            }
                
        },
        eliminarTratamiento(index){
                let me = this;
                me.arrayTratamientos.splice(index, 1);
        },
        cancelarCita(id_cita){
                let me=this;
                var url = '/cancelarCita';
                swal({
                    title: '¿Estás seguro?',
                    text: "Se Cancelara la cita",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => { 
                        axios.put(url,{
                            'id_cita':id_cita,
                            'id_horario':me.id_horario,
                        }).then(function (response){
                            console.log(response.data);
                            if(response.data==1){
                                    swal(
                                    'Cancelado!!!',
                                    'La cita se cancelo correctamente.',
                                    'success'
                                    ); 
                                    me.pagina=0;
                                    me.loadCitas();
                                    
                                }else{
                                    swal(
                                    'Error!!!',
                                    'error al Cancelar cita.',
                                    'error'
                                    ); 
                                }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });   
        },
        back(){
            let me=this;
            me.pagina=0;
            me.loadCitas();
        }
        ,
        backcita(){
            let me=this;
            me.pagina=1;
        },
        saveTratamiento(){
                let me=this;
                var url = '/guardartratamiento';
                swal({
                    title: '¿Estás seguro?',
                    text: "Se Guardara los datos",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        if(this.arrayTratamientos.length == 0){
                                swal(
                                    'Alerta!!!',
                                    'Ingrese tratamiento',
                                    'warning'
                                );
                        }else{
                            axios.post(url,{
                                'id_cita':this.id_cita,
                                'arrayTratamientos':this.arrayTratamientos,
                            }).then(function (response){
                                console.log(response.data);
                                if(response.data==1){
                                        swal(
                                        'Guardado !!!',
                                        'El tratamiento se registro correctamente.',
                                        'success'
                                        ); 
                                        me.pagina=0;
                                        me.arrayTratamientos=[];
                                        me.loadCitas();
                                        
                                    }else{
                                        swal(
                                        'Error!!!',
                                        'error al Cancelar cita.',
                                        'error'
                                        ); 
                                    }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        } 
                    });   
        },
        selectMedicos(search){
            var url= '/medicos';
            return  axios.post(url,{ 'dato': search,}).then(function (response) {
                
                return ({ results: response.data });
            })
            .catch(function (error) {
                console.log(error);
            });
            
        },
        getDatosMedico(val1){
            let me = this;
            var url= '/medicos';
            axios.post(url,{ 'dato': val1,}).then(function (response) {
                let respuesta = response.data;
                me.arrayMedicos = respuesta;
                if(me.arrayMedicos.length > 0){
                    me.dato = respuesta[0]['id_persona'];
                }else{
                    me.dato = '';
                }
            })
            .catch(function (error) {
                console.log(error);
            });
                
        },
        selectAlumnos(search){
            var url= '/selectAlumno';
            return  axios.post(url,{ 'dato': search,}).then(function (response) {
                
                return ({ results: response.data });
            })
            .catch(function (error) {
                console.log(error);
            });
            
        },
        getDatosAlumnos(val1){
            let me = this;
            var url= '/selectAlumno';
            axios.post(url,{ 'dato': val1,}).then(function (response) {
                let respuesta = response.data;
                var arrayDatos = respuesta;
                if(arrayDatos.length > 0){
                    me.dato = respuesta[0]['id_alumno'];
                }else{
                    me.dato = '';
                }
            })
            .catch(function (error) {
                console.log(error);
            });
                
        },
        limpiarfiltro(){
            this.dato='';
            this.selected='';
        }
    },
    mounted(){
        }
}
</script>