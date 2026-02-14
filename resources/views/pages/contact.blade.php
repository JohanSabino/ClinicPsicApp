<x-web-layout>
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Hero-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full">Contáctanos</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Estamos aquí para escucharte
                </h1>
                <p class="leading-normal text-2xl mb-8">
                    ¿Tienes dudas o quieres agendar una cita? Escríbenos.
                </p>
            </div>
        </div>
    </div>

    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            
            <div class="w-full md:w-1/2 p-6">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">Envíanos un mensaje</h3>
                <form action="#" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Nombre
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Tu nombre">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Correo Electrónico
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="tucorreo@ejemplo.com">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                            Mensaje
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="4" placeholder="¿Cómo podemos ayudarte?"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>

            <div class="w-full md:w-1/2 p-6">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">Información de Contacto</h3>
                <p class="text-gray-600 mb-8">
                    Visítanos en nuestras instalaciones o contáctanos a través de nuestros canales oficiales.
                </p>
                <div class="flex items-center mb-4">
                    <span class="text-xl mr-2">📍</span>
                    <p class="text-gray-800">Calle 123 # 45-67, Ciudad, Colombia</p>
                </div>
                <div class="flex items-center mb-4">
                    <span class="text-xl mr-2">📞</span>
                    <p class="text-gray-800">+57 (1) 234-5678</p>
                </div>
                 <div class="flex items-center mb-4">
                    <span class="text-xl mr-2">✉️</span>
                    <p class="text-gray-800">info@clinicpsicapp.com</p>
                </div>
                 <div class="flex items-center mb-4">
                    <span class="text-xl mr-2">⏰</span>
                    <p class="text-gray-800">Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                </div>
                
                <!-- Mapa placeholder -->
                <div class="w-full h-64 bg-gray-300 rounded-lg flex items-center justify-center mt-6">
                    <span class="text-gray-600">Mapa de Ubicación</span>
                </div>
            </div>

        </div>
    </section>
</x-web-layout>
