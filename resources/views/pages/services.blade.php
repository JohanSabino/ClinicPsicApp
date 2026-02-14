<x-web-layout>
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Hero-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full">Nuestros Servicios</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Cuidamos tu salud mental
                </h1>
                <p class="leading-normal text-2xl mb-8">
                    Ofrecemos una amplia gama de servicios profesionales adaptados a tus necesidades.
                </p>
            </div>
             <!--Imagen Hero (Opcional o SVG)-->
             <div class="w-full md:w-3/5 py-6 text-center">
                <x-logo class="w-full md:w-4/5 z-50" />
            </div>
        </div>
    </div>

    <!-- Sección de Servicios -->
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Especialidades
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <!-- Servicio 1 -->
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                        Psicología Clínica
                    </div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Evaluación, diagnóstico y tratamiento de trastornos mentales y emocionales. Terapias individuales para adultos y adolescentes.
                    </p>
                </div>
            </div>

             <!-- Servicio 2 -->
             <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                        Neuropsicología
                    </div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Evaluación de funciones cognitivas (memoria, atención, lenguaje) y rehabilitación neuropsicológica.
                    </p>
                </div>
            </div>

             <!-- Servicio 3 -->
             <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                        Terapia de Pareja y Familia
                    </div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Espacios para mejorar la comunicación, resolver conflictos y fortalecer vínculos afectivos.
                    </p>
                </div>
            </div>
             <!-- Servicio 4 -->
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                         Psicología Infantil
                    </div>
                    <p class="text-gray-800 text-base px-6 mb-5">
                        Atención especializada para niños con dificultades de aprendizaje, emocionales o conductuales.
                    </p>
                </div>
            </div>

            <!-- Servicio 5 -->
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                 <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                     <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                          Orientación Vocacional
                     </div>
                     <p class="text-gray-800 text-base px-6 mb-5">
                         Ayuda para descubrir intereses y aptitudes profesionales.
                     </p>
                 </div>
             </div>


        </div>
    </section>
</x-web-layout>
