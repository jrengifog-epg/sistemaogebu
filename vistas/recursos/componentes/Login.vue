<template>
    <t-modal v-model="modal" :hideCloseButton="true" :clickToClose="false">    
      <template v-slot:header >
        <div class=" w-full flex flex-col p-4 "> 
            <h2 class="text-lg leading-6 font-medium text-blue-600" >
                ESTIMADOS ALUMNOS(AS):
            </h2>
        </div>
      </template>
      <template v-slot:default>
          <div class="mt-3  sm:mt-0  sm:text-left">
              <div class="mt-2 px-8">
                  <p class="text-sm text-gray-500">
                      Se informa que la plataforma entrevista virtual de la Dirección de Bienestar Universitario se habilitara el dia lunes 24 de mayo;
                      para los ingresantes de la I y II etapa 2021.
                  </p>
                  <p class="text-sm text-gray-500 pt-4">
                      El ingreso a la plataforma sera mediante su número de DNI como Usuario y Contraseña,
                      se invoca tener paciencia para el llenado de los datos;
                      si usted ingreso datos antes de la fecha mencionada estos datos no serán considerados y debera volver a ingresar 
                      dichos datos apartir de la misma. 
                  </p>
              </div>
          </div>
      </template>
      <template v-slot:footer  >
        <div class="mt-2 px-8 text-gray-800">
            <h1>ATENTAMENTE:</h1>
            <p class="text-sm pt-2">
                LA DIRECCION DE BIENESTAR UNIVERSITARIO
            </p>
        </div>
      </template>
  </t-modal>
</template>
<script>
import {
    TModal,
    } from 'vue-tailwind/dist/components';
    export default {
        data() {
            return {
                modal:true,
            }
        },
        components: {
            TModal,
        },
        methods: {
            
        },
    }
</script>