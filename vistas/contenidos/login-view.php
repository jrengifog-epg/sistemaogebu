<main>
<?php
    session_start();
    session_unset();
    session_destroy();
     
?>
<login  v-if="validate==true"></login>
<div class="flex w-full min-h-screen flex-col items-center px-8" v-else-if="validate==false">
    <main class="w-full flex justify-center items-center main-h mb-8 md:mb-0">
        <div class="md:border login md:rounded-lg bg-white md:flex py-8">
            <div class="hidden w-1/2 md:flex items-center login-img inline-block">
            <img src="vistas/img/5243315.jpg" alt="">
            </div>
            <div class="md:w-1/2">
            <div class="">
                <img src="vistas/img/logo-UNAP.png" alt="log-unap" class="w-32 md:w-20 block mx-auto mb-2">
                <h2 class="text-center font-medium text-lg text-gray-700 mb-2">Dirección de Bienestar Universitario</h2>
                <p class="text-center font-bold text-sm text-gray-500">Entrevista Socio Económica Virtual</p>
            </div>
            <div class="sm:block" aria-hidden="true">
                <div class="py-5 md:px-5">
                <div class="border-t border-gray-200"></div>
                </div>
            </div>
            <div class="">
                <h3 class="text-center text-lg font-medium text-gray-700">Iniciar Sesión</h3>
                <form id="frm_login" method="POST" action="<?php echo URL ?>controlador/login.php" enctype="multipart/form-data" class="mt-4 md:mx-12">
                <div class="my-4">
                    <input type="text" id="userID"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="DNI">
                </div>
                <div class="my-4">
                    <input type="password" id="passwordID"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Contraseña">
                    <a href="#" class="text-blue-500 inline-block mt-4 sm:text-sm">¿Cuál es tu contraseña?</a>
                </div>
                <p class="text-gray-500 sm:text-sm">¿No sabes con ingresar? un video explicativo de como usar la aplicación. <a href="#" class="text-blue-500">Ver tutorial</a></p>
                <button class="mt-4 w-full py-2 bg-blue-700 text-white rounded-lg sm:text-sm font-medium">Enviar</button>
                </form>
            </div>
            </div>
        </div>
    </main>
    <footer class="footer-h m-8 md:my-0 w-full" >
        <div class=" text-blue-500 md:text-left mt-4 mb-8 text-center border-t border-gray-200 pt-4">
            <p class="text-sm">Copyright © 2021 UNAP. Todos los Derechos Reservados </p>
            <p class="text-sm">Desarrollado con ❤️ por <a
                    href="https://api.whatsapp.com/send?phone=+51933240664">Galilei</a></p>
        </div>
    </footer>
</div>
</main>
