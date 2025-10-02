{{--
    Componente reutilizable: Stats Card
    
    Props disponibles:
    - title: Título de la estadística
    - value: Valor numérico o texto principal
    - subtitle: Texto descriptivo opcional
    - icon: HTML del icono (opcional)
    - color: Color del gradiente (blue, green, purple, orange)
    - trend: Valor de tendencia (positivo o negativo)
    - size: Tamaño del componente (sm, md, lg)
--}}

@props([
    'title',
    'value',
    'subtitle' => '',
    'icon' => '',
    'color' => 'blue',
    'trend' => null,
    'size' => 'md'
])

@php
    // Definir clases de color para gradientes
    $colorClasses = [
        'blue' => 'from-blue-500 to-blue-600',
        'green' => 'from-green-500 to-green-600',
        'purple' => 'from-purple-500 to-purple-600',
        'orange' => 'from-orange-500 to-orange-600',
        'red' => 'from-red-500 to-red-600',
        'indigo' => 'from-indigo-500 to-indigo-600',
    ];
    
    // Definir clases de tamaño
    $sizeClasses = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];
    
    $gradientClass = $colorClasses[$color] ?? $colorClasses['blue'];
    $paddingClass = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<div class="bg-gradient-to-br {{ $gradientClass }} rounded-xl {{ $paddingClass }} text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <!-- Título de la estadística -->
            <p class="text-white/80 text-sm font-medium mb-1 uppercase tracking-wide">
                {{ $title }}
            </p>
            
            <!-- Valor principal -->
            <p class="text-3xl font-bold mb-1 leading-tight">
                {{ $value }}
            </p>
            
            <!-- Subtítulo opcional -->
            @if($subtitle)
                <p class="text-white/70 text-xs mb-2">
                    {{ $subtitle }}
                </p>
            @endif
            
            <!-- Indicador de tendencia -->
            @if($trend !== null)
                <div class="flex items-center mt-2">
                    @if($trend > 0)
                        <!-- Flecha hacia arriba para tendencia positiva -->
                        <svg class="w-4 h-4 text-green-300 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-300 text-xs font-semibold">+{{ $trend }}%</span>
                    @elseif($trend < 0)
                        <!-- Flecha hacia abajo para tendencia negativa -->
                        <svg class="w-4 h-4 text-red-300 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-300 text-xs font-semibold">{{ $trend }}%</span>
                    @else
                        <!-- Sin cambio -->
                        <svg class="w-4 h-4 text-yellow-300 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-yellow-300 text-xs font-semibold">0%</span>
                    @endif
                </div>
            @endif
        </div>
        
        <!-- Icono opcional -->
        @if($icon)
            <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm ml-4">
                {!! $icon !!}
            </div>
        @endif
    </div>
    
    <!-- Slot para contenido adicional -->
    @if(isset($slot) && !empty(trim($slot)))
        <div class="mt-4 pt-4 border-t border-white/20">
            {{ $slot }}
        </div>
    @endif
</div>