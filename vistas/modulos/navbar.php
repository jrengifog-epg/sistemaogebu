<header class="bg-white w-full h-16 shadow-md fixed z-40 top-0 left-0 px-4">
    <div class="flex justify-between items-center" >
        <div class="flex h-16 items-center">
            <div class="p-4 rounded-full cursor-pointer hover:bg-gray-200" @click="open = true">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                     class="fill-current text-gray-500">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </div>
            <nav v-show="open" @click="open = false" class="z-index-50 fixed top-0 -left-4 w-72 min-h-screen bg-white shadow-xl ">
                <div class="pl-8 pr-4 py-4">
                    <h4 class="text-md font-medium text-gray-500">Dirección de Bienestar Universitario UNAP</h4>
                </div>
                <?php if($_SESSION['rol']==1): ?>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==6}">
                        <a href="#" class="flex h-12 items-center" @click="menu=6">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==6}">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"/>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==6}">Alumnos</span>
                        </a>
                    </div>
                <?php elseif($_SESSION['rol']==2): ?>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==0}">
                        <a href="#" class="flex h-12 items-center" @click="menu=0">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==0}">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"/>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==0}">Ficha Social</span>
                        </a>
                    </div>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==2}">
                        <a href="#" class="flex h-12 items-center" @click="menu=2">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                width="24px" class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==2}">
                                <g>
                                    <rect fill="none" height="24" width="24"/>
                                    <rect fill="none" height="24" width="24"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M13,8.57c-0.79,0-1.43,0.64-1.43,1.43s0.64,1.43,1.43,1.43s1.43-0.64,1.43-1.43S13.79,8.57,13,8.57z"/>
                                        <path d="M13.21,3c-3.84-0.11-7,2.87-7.19,6.64L4.1,12.2C3.85,12.53,4.09,13,4.5,13H6v3c0,1.1,0.9,2,2,2h1v2c0,0.55,0.45,1,1,1h5 c0.55,0,1-0.45,1-1v-3.68c2.44-1.16,4.1-3.68,4-6.58C19.86,6.12,16.82,3.11,13.21,3z M16,10c0,0.13-0.01,0.26-0.02,0.39l0.83,0.66 c0.08,0.06,0.1,0.16,0.05,0.25l-0.8,1.39c-0.05,0.09-0.16,0.12-0.24,0.09l-0.99-0.4c-0.21,0.16-0.43,0.29-0.67,0.39L14,13.83 c-0.01,0.1-0.1,0.17-0.2,0.17h-1.6c-0.1,0-0.18-0.07-0.2-0.17l-0.15-1.06c-0.25-0.1-0.47-0.23-0.68-0.39l-0.99,0.4 c-0.09,0.03-0.2,0-0.25-0.09l-0.8-1.39c-0.05-0.08-0.03-0.19,0.05-0.25l0.84-0.66C10.01,10.26,10,10.13,10,10 c0-0.13,0.02-0.27,0.04-0.39L9.19,8.95c-0.08-0.06-0.1-0.16-0.05-0.26l0.8-1.38c0.05-0.09,0.15-0.12,0.24-0.09l1,0.4 c0.2-0.15,0.43-0.29,0.67-0.39l0.15-1.06C12.02,6.07,12.1,6,12.2,6h1.6c0.1,0,0.18,0.07,0.2,0.17l0.15,1.06 c0.24,0.1,0.46,0.23,0.67,0.39l1-0.4c0.09-0.03,0.2,0,0.24,0.09l0.8,1.38c0.05,0.09,0.03,0.2-0.05,0.26l-0.85,0.66 C15.99,9.73,16,9.86,16,10z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==2}">Ficha Psicológica</span>
                        </a>
                    </div>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==4}">
                        <a href="#" class="flex h-12 items-center" @click="menu=4">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==4}">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M20 6h-8l-1.41-1.41C10.21 4.21 9.7 4 9.17 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-5 3c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm4 8h-8v-1c0-1.33 2.67-2 4-2s4 .67 4 2v1z"/>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==4}">Perfil</span>
                        </a>
                    </div>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==5}">
                        <a href="#" class="flex h-12 items-center" @click="menu=5">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                width="24px" class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==5}">
                                <g>
                                    <path d="M0,0h24v24H0V0z" fill="none"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M10.67,13.02C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V19c0,0.55,0.45,1,1,1 h8.26C10.47,18.87,10,17.49,10,16C10,14.93,10.25,13.93,10.67,13.02z"/>
                                        <circle cx="10" cy="8" r="4"/>
                                        <path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l0.84-0.73c0.18-0.16,0.22-0.42,0.1-0.63l-0.59-1.02c-0.12-0.21-0.37-0.3-0.59-0.22 l-1.06,0.36c-0.32-0.27-0.68-0.48-1.08-0.63l-0.22-1.09c-0.05-0.23-0.25-0.4-0.49-0.4h-1.18c-0.24,0-0.44,0.17-0.49,0.4 l-0.22,1.09c-0.4,0.15-0.76,0.36-1.08,0.63l-1.06-0.36c-0.23-0.08-0.47,0.02-0.59,0.22l-0.59,1.02c-0.12,0.21-0.08,0.47,0.1,0.63 l0.84,0.73c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-0.84,0.73c-0.18,0.16-0.22,0.42-0.1,0.63l0.59,1.02 c0.12,0.21,0.37,0.3,0.59,0.22l1.06-0.36c0.32,0.27,0.68,0.48,1.08,0.63l0.22,1.09c0.05,0.23,0.25,0.4,0.49,0.4h1.18 c0.24,0,0.44-0.17,0.49-0.4l0.22-1.09c0.4-0.15,0.76-0.36,1.08-0.63l1.06,0.36c0.23,0.08,0.47-0.02,0.59-0.22l0.59-1.02 c0.12-0.21,0.08-0.47-0.1-0.63l-0.84-0.73C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2 S18.1,18,17,18z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==5}">Configuración</span>
                        </a>
                    </div>
                <?php elseif($_SESSION['rol']==3): ?>
                <?php elseif($_SESSION['rol']==4): ?>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==3}">
                        <a href="#" class="flex h-12 items-center" @click="menu=3">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                width="24px" class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==3}">
                                <g>
                                    <rect fill="none" height="24" width="24"/>
                                    <rect fill="none" height="24" width="24"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M20,6h-4V4c0-1.1-0.9-2-2-2h-4C8.9,2,8,2.9,8,4v2H4C2.9,6,2,6.9,2,8v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z M10,4h4v2h-4V4z M15,15h-2v2c0,0.55-0.45,1-1,1s-1-0.45-1-1v-2H9c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1h2v-2 c0-0.55,0.45-1,1-1s1,0.45,1,1v2h2c0.55,0,1,0.45,1,1C16,14.55,15.55,15,15,15z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==3}">Ficha Médica</span>
                        </a>
                    </div>
                <?php elseif($_SESSION['rol']==5): ?>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==8}">
                        <a href="#" class="flex h-12 items-center" @click="menu=8">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                width="24px" class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==8}">
                                <g>
                                    <rect fill="none" height="24" width="24"/>
                                    <rect fill="none" height="24" width="24"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M13,8.57c-0.79,0-1.43,0.64-1.43,1.43s0.64,1.43,1.43,1.43s1.43-0.64,1.43-1.43S13.79,8.57,13,8.57z"/>
                                        <path d="M13.21,3c-3.84-0.11-7,2.87-7.19,6.64L4.1,12.2C3.85,12.53,4.09,13,4.5,13H6v3c0,1.1,0.9,2,2,2h1v2c0,0.55,0.45,1,1,1h5 c0.55,0,1-0.45,1-1v-3.68c2.44-1.16,4.1-3.68,4-6.58C19.86,6.12,16.82,3.11,13.21,3z M16,10c0,0.13-0.01,0.26-0.02,0.39l0.83,0.66 c0.08,0.06,0.1,0.16,0.05,0.25l-0.8,1.39c-0.05,0.09-0.16,0.12-0.24,0.09l-0.99-0.4c-0.21,0.16-0.43,0.29-0.67,0.39L14,13.83 c-0.01,0.1-0.1,0.17-0.2,0.17h-1.6c-0.1,0-0.18-0.07-0.2-0.17l-0.15-1.06c-0.25-0.1-0.47-0.23-0.68-0.39l-0.99,0.4 c-0.09,0.03-0.2,0-0.25-0.09l-0.8-1.39c-0.05-0.08-0.03-0.19,0.05-0.25l0.84-0.66C10.01,10.26,10,10.13,10,10 c0-0.13,0.02-0.27,0.04-0.39L9.19,8.95c-0.08-0.06-0.1-0.16-0.05-0.26l0.8-1.38c0.05-0.09,0.15-0.12,0.24-0.09l1,0.4 c0.2-0.15,0.43-0.29,0.67-0.39l0.15-1.06C12.02,6.07,12.1,6,12.2,6h1.6c0.1,0,0.18,0.07,0.2,0.17l0.15,1.06 c0.24,0.1,0.46,0.23,0.67,0.39l1-0.4c0.09-0.03,0.2,0,0.24,0.09l0.8,1.38c0.05,0.09,0.03,0.2-0.05,0.26l-0.85,0.66 C15.99,9.73,16,9.86,16,10z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==8}">Psicologo</span>
                        </a>
                    </div>
                <?php elseif($_SESSION['rol']==6): ?>
                    <div class="hover:bg-gray-100 w-60 h-12 items-center pl-8 rounded-r-full" :class="{ 'bg-blue-100': menu==1}">
                        <a href="#" class="flex h-12 items-center" @click="menu=1">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                width="24px" class="fill-current text-gray-500" :class="{ 'text-blue-500': menu==1}">
                                <rect fill="none" height="24" width="24"/>
                                <path d="M10.8,3.9l-6,4.5C4.3,8.78,4,9.37,4,10v9c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-9c0-0.63-0.3-1.22-0.8-1.6l-6-4.5 C12.49,3.37,11.51,3.37,10.8,3.9z M12.5,12.5c0,0.83-0.67,1.5-1.5,1.5v3.5c0,0.28-0.22,0.5-0.5,0.5h0c-0.28,0-0.5-0.22-0.5-0.5V14 c-0.83,0-1.5-0.67-1.5-1.5V10c0-0.28,0.22-0.5,0.5-0.5h0c0.28,0,0.5,0.22,0.5,0.5v2.5H10V10c0-0.28,0.22-0.5,0.5-0.5h0 c0.28,0,0.5,0.22,0.5,0.5v2.5h0.5V10c0-0.28,0.22-0.5,0.5-0.5h0c0.28,0,0.5,0.22,0.5,0.5V12.5z M14.5,18L14.5,18 c-0.28,0-0.5-0.22-0.5-0.5v-3h-0.5c-0.28,0-0.5-0.22-0.5-0.5v-2.5c0-0.88,0.57-1.63,1.36-1.89C14.67,9.5,15,9.75,15,10.09v7.41 C15,17.78,14.78,18,14.5,18z"/>
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 block" :class="{ 'text-blue-500': menu==1}">Ficha Nutricional</span>
                        </a>
                    </div>
                <?php endif; ?>
            </nav>
            <h2 class="text-gray-500 font-medium pl-2 text-lg hidden sm:block">Dirección de Bienestar Universitario</h2>
            <h2 class="text-gray-500 font-medium pl-2 text-lg sm:hidden">DBU</h2>
        </div>
        
        <div class="relative inline-block" >
            <div class="flex h-16 items-center">
                <a href="https://api.whatsapp.com/send?phone=+51942427360"
                   class="block mr-4 p-1 bg-green-400 rounded-full" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                         class="fill-current text-white">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-4h2v2h-2zm1.61-9.96c-2.06-.3-3.88.97-4.43 2.79-.18.58.26 1.17.87 1.17h.2c.41 0 .74-.29.88-.67.32-.89 1.27-1.5 2.3-1.28.95.2 1.65 1.13 1.57 2.1-.1 1.34-1.62 1.63-2.45 2.88 0 .01-.01.01-.01.02-.01.02-.02.03-.03.05-.09.15-.18.32-.25.5-.01.03-.03.05-.04.08-.01.02-.01.04-.02.07-.12.34-.2.75-.2 1.25h2c0-.42.11-.77.28-1.07.02-.03.03-.06.05-.09.08-.14.18-.27.28-.39.01-.01.02-.03.03-.04.1-.12.21-.23.33-.34.96-.91 2.26-1.65 1.99-3.56-.24-1.74-1.61-3.21-3.35-3.47z"/>
                    </svg>
                </a>
                <button @click="loadOpen1()" class="focus:outline-none">
                    <div class="w-10 h-10 bg-green-500 rounded-full overflow-hidden border-1 border-gray-100">
                        <span class="text-white font-bold text-center block leading-10" v-if="tabnext1==0"><?php echo substr($_SESSION['nombres'],0,1)."".substr($_SESSION['apellidos'],0,1);?></span>
                        <img  src="../vistas/img/alumnos/<?php echo $_SESSION['dni']?>.jpg" alt="" class="w-full h-full object-cover" v-else-if="tabnext1==1">
                    </div>
                </button>
            </div>
            <div v-show="open1" @click="loadOpen1()"
                 class="origin-top-right absolute right-0 mt-2 w-56 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                 role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div role="none">
                <?php if($_SESSION['rol']==2): ?>
                    <a href="#" @click="menu=4" class="text-gray-700 block px-4 py-3 text-sm hover:bg-gray-100 rounded-t-lg"
                       role="menuitem" tabindex="-1" id="menu-item-0">Perfil</a>
                    <a href="#" @click="menu=5" class="text-gray-700 block px-4 py-3 text-sm hover:bg-gray-100" role="menuitem"
                       tabindex="-1" id="menu-item-1">Modificar datos</a>
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                <?php endif; ?>
                    <a href="<?php echo URL;?>"
                                class="text-gray-700 block w-full text-left px-4 py-3 text-sm hover:bg-gray-100 rounded-b-lg"
                                role="menuitem" tabindex="-1" id="menu-item-3" >Cerrar sesión</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
