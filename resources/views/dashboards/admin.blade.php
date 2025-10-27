@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    
    <!-- Header con información del usuario -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Panel de Control</h1>
                <p class="text-sm text-gray-500 mt-1">Bienvenido, <span class="font-semibold text-blue-600">{{ Auth::user()->name }}</span></p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">{{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</span>
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Tarjetas de Resumen -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- Resumen Diario -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+1.4%</span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Ingresos</p>
                    <h3 class="text-2xl font-bold text-gray-800">S/. 1,424.00</h3>
                    <p class="text-xs text-gray-400 mt-2">respecto a la semana pasada</p>
                </div>
            </div>

            <!-- Clientes Nuevos -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">-4%</span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Clientes Nuevos</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['total_clientes'] }}</h3>
                    <p class="text-xs text-gray-400 mt-2">respecto a la semana pasada</p>
                </div>
            </div>

            <!-- Transacciones -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">+2%</span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Transacciones</p>
                    <h3 class="text-2xl font-bold text-gray-800">254</h3>
                    <p class="text-xs text-gray-400 mt-2">respecto a la semana pasada</p>
                </div>
            </div>

            <!-- Usuarios Activos -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-cyan-600 bg-cyan-50 px-2 py-1 rounded-full">{{ $stats['total_empleados'] }}</span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Usuarios Activos</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['total_usuarios'] }}</h3>
                    <p class="text-xs text-gray-400 mt-2">empleados en línea</p>
                </div>
            </div>

        </div>

        <!-- Gráfico y Operaciones -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Gráfico de Ventas -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Resumen de Ventas</h3>
                    <select class="text-sm border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Últimos 12 meses</option>
                        <option>Últimos 6 meses</option>
                        <option>Últimos 3 meses</option>
                    </select>
                </div>
                
                <!-- Gráfico simulado con CSS -->
                <div class="relative h-64">
                    <svg class="w-full h-full" viewBox="0 0 800 200" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:rgb(99, 102, 241);stop-opacity:0.3" />
                                <stop offset="100%" style="stop-color:rgb(99, 102, 241);stop-opacity:0.05" />
                            </linearGradient>
                        </defs>
                        <path d="M 0 150 Q 100 120, 200 140 T 400 100 T 600 120 T 800 80 L 800 200 L 0 200 Z" fill="url(#gradient)" />
                        <path d="M 0 150 Q 100 120, 200 140 T 400 100 T 600 120 T 800 80" fill="none" stroke="rgb(99, 102, 241)" stroke-width="2"/>
                    </svg>
                    
                    <!-- Etiquetas de meses -->
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between px-4 text-xs text-gray-400">
                        <span>Ene</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Abr</span>
                        <span>May</span>
                        <span>Jun</span>
                        <span>Jul</span>
                        <span>Ago</span>
                        <span>Sep</span>
                        <span>Oct</span>
                        <span>Nov</span>
                        <span>Dic</span>
                    </div>
                </div>
            </div>

            <!-- Actividad Reciente -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actividad Reciente</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Nuevo depósito</p>
                            <p class="text-xs text-gray-500">S/. 500.00 - BCP</p>
                            <p class="text-xs text-gray-400 mt-1">Hace 5 min</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Cliente nuevo</p>
                            <p class="text-xs text-gray-500">Juan Pérez registrado</p>
                            <p class="text-xs text-gray-400 mt-1">Hace 12 min</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Retiro procesado</p>
                            <p class="text-xs text-gray-500">S/. 300.00 - Interbank</p>
                            <p class="text-xs text-gray-400 mt-1">Hace 25 min</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Operaciones por Bancos -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Operaciones por Cuentas</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Cuenta</th>
                            <th class="text-center py-3 px-4 text-sm font-medium text-gray-600">Operaciones</th>
                            <th class="text-right py-3 px-4 text-sm font-medium text-gray-600">Egreso</th>
                            <th class="text-right py-3 px-4 text-sm font-medium text-gray-600">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <span class="text-sm font-bold text-purple-600">Y</span>
                                    </div>
                                    <span class="font-medium text-gray-800">Yape</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">39</td>
                            <td class="py-4 px-4 text-right text-gray-600">S/. 348.00</td>
                            <td class="py-4 px-4 text-right font-semibold text-gray-800">S/. 19,017.82</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <span class="text-sm font-bold text-blue-600">BBVA</span>
                                    </div>
                                    <span class="font-medium text-gray-800">BBVA</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">36</td>
                            <td class="py-4 px-4 text-right text-gray-600">S/. 490.00</td>
                            <td class="py-4 px-4 text-right font-semibold text-gray-800">S/. 20,449.22</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                                        <span class="text-sm font-bold text-red-600">BCP</span>
                                    </div>
                                    <span class="font-medium text-gray-800">BCP</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">48</td>
                            <td class="py-4 px-4 text-right text-gray-600">S/. 430.00</td>
                            <td class="py-4 px-4 text-right font-semibold text-gray-800">S/. 21,602.53</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                        <span class="text-sm font-bold text-green-600">INT</span>
                                    </div>
                                    <span class="font-medium text-gray-800">Interbank</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">48</td>
                            <td class="py-4 px-4 text-right text-gray-600">S/. 476.00</td>
                            <td class="py-4 px-4 text-right font-semibold text-gray-800">S/. 25,795.21</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                                        <span class="text-sm font-bold text-yellow-600">BN</span>
                                    </div>
                                    <span class="font-medium text-gray-800">Banco de la Nación</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">39</td>
                            <td class="py-4 px-4 text-right text-gray-600">S/. 385.00</td>
                            <td class="py-4 px-4 text-right font-semibold text-gray-800">S/. 17,612.86</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
            <a href="{{ route('clientes.index') }}" class="bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-2">👥</div>
                    <p class="font-semibold">Clientes</p>
                </div>
            </a>

            <a href="{{ route('empleados.index') }}" class="bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-2">🧑‍💼</div>
                    <p class="font-semibold">Empleados</p>
                </div>
            </a>

            <a href="{{ route('movimientos.deposito') }}" class="bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-2">💰</div>
                    <p class="font-semibold">Depósitos</p>
                </div>
            </a>

            <a href="{{ route('movimientos.retiro') }}" class="bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="text-4xl mb-2">💸</div>
                    <p class="font-semibold">Retiros</p>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection