@push('styles')
    <style>
    .highcharts-figure {
        min-width: 310px;
        max-width: 800px;
        /* margin: 1em auto; */
    }

    /* #container {
        height: 400px;
    } */

/* .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
} */

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

    </style>
@endpush
<x-main>
    {{-- @push('styles')
        @livewireStyles()
    @endpush --}}
    @section('sidebar-panel')
        <!-- Sidebar Panel -->
        <div class="sidebar-panel">
            <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
                <!-- Sidebar Panel Header -->
                <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                    <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                        Dashboards
                    </p>
                    <button @click="$store.global.isSidebarExpanded = false"
                        class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar Panel Body -->
                <div x-data="{ expandedItem: null }" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                    x-init="$el._x_simplebar = new SimpleBar($el);">
                    <ul class="flex flex-1 flex-col px-4 font-inter">
                        <li>
                            <a x-data="navLink" href="{{ route('dashboard') }}"
                                :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                    'text-slate-500 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50'"
                                class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                                Panel de Control - Principal
                            </a>
                        </li>
                        <li>
                            <a x-data="navLink" href="#"
                                :class="isActive ? 'font-medium text-primary dark:text-accent-light' :
                                    'text-slate-500 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50'"
                                class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                                Panel de Control - Obras
                            </a>
                        </li>
                    </ul>
                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                </div>
            </div>
        </div>
    @endsection

    @section('content')

        <main class="main-content w-full pb-8">
            @if(auth()->user()->can('all.managerial'))
            <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div class="col-span-12 lg:col-span-9">
                    <figure class="highcharts-figure">
                        <div class="pb-2 flex justify-end gap-2">
                            <button class="btn rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" id="plain">
                                <i class="fa-solid fa-chart-simple"></i><span class="px-1">Plano</span>
                            </button>
                            <button class="btn rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" id="inverted">
                                <i class="fa-solid fa-chart-bar"></i><span class="px-1">Invertido</span>
                            </button>
                            <button class="btn rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" id="polar">
                                <i class="fa-solid fa-chart-line"></i><span class="px-1">Polar</span>
                            </button>
                        </div>
                        <div id="container3" class="rounded-md shadow-lg"></div>
                        <p class="highcharts-description">
                            Reporte de la realización de Obras civiles en general, en el conteo incluyen las áreas de Construcción, Estudios y Supervisión. Se los puede ver de tres formas diferentes, los cuáles son, gráfico plano en columnas, gráfico de columnas invertido y el gráfico polar.
                        </p>
                    </figure>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-3 sm:gap-5 lg:grid-cols-1">
                        <a href="{{ route('admin.users.index') }}" class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between space-x-1">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalWorks->count() }}</p>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-success">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"
                                    />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Total Obras Civiles</p>
                        </a>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $constructions->count() }}</p>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-secondary">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" 
                                    />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Obras de Construcción</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $studies->count() }}</p>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-warning">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z"
                                    />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Obras de Estudio</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $supervisions->count() }}</p>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-info"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                    />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Obras de Supervisión</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">{{ $deregistering_works->count() }}</p>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-error">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                                    />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Obras dadas de Baja</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <div class="card shadow-lg w-full">
                        <figure class="highcharts-figure p-5">
                            <div id="container" class="rounded-md"></div>
                            <p class="highcharts-description">
                                Gráfico de barras con columnas horizontales. Este tipo de gráfico muestra la cantidad de obras ejecutadas por cada departamento de Bolivia.
                            </p>
                        </figure>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <div class="card shadow-lg w-full">
                        <figure class="highcharts-figure p-5">
                            <div id="container1" class="rounded-md"></div>
                            <p class="highcharts-description">
                                Los gráficos circulares de radio variable pueden utilizarse para visualizar una segunda dimensión en un gráfico circular. En este gráfico, los departamentos con más obras realizadas se dibujan más alejados, mientras que la anchura del corte viene determinada por el tamaño de cada departamento.
                            </p>
                        </figure>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-10">
                    <figure class="highcharts-figure">
                        <div id="container2" class="rounded-md"></div>
                        <p class="highcharts-description">
                            Gráfico de barras horizontales apiladas. Este tipo de visualización es ideal para comparar datos que se acumulan hasta alcanzar una suma, que es el caso de los diferentes tipos de obras realizados en cada departamento.
                        </p>
                    </figure>
                </div>
            </div>
            @endif
            @if(auth()->user()->can('all.construction'))
            <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div class="col-span-12 lg:col-span-9">
                    <h1>DASHBOARD CONSTRUCTORESholaggggg</h1>
                </div>
                </div>
            @endif
            @if(auth()->user()->can('all.study'))
                <h1>DASHBOARD ESTUDIOS</h1>
            @endif
            @if(auth()->user()->can('all.supervision'))
                <h1>DASHBOARD SUPERVISORES</h1>
            @endif

        </main>
    @endsection
    @push('scripts')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
            var works = {{ Js::from($works) }};
            var states = {{ Js::from($states) }};
            var statesTwo = {{ Js::from($statesTwo) }};
            var consDep = {{ Js::from($consDep) }};
            var stuDep = {{ Js::from($stuDep) }};
            var supDep = {{ Js::from($supDep) }};
            
            console.log(states);
            console.log(consDep);
            /* console.log('2020')
            console.log(y2020)
            console.log('2021')
            console.log(y2021)
            console.log('2022')
            console.log(y2022) */
            /* states.forEach(function(item){
                // console.log( item.name)
                nameDep = item.name;
            }); */
            let year = new Date().getFullYear();

            /* Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Historic World Population by Region',
                    align: 'left'
                },
                subtitle: {
                    text: 'Source: <a ' +
                        'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
                        'target="_blank">Wikipedia.org</a>',
                    align: 'left'
                },
                xAxis: {
                    categories: ['La Paz', 'Cochabamba', 'Santa Cruz', 'Oruro', 'Potosi', 'Chuquisaca', 'Beni', 'Pando', 'Tarija'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Population (millions)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: 'obras'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [
                    {
                        name: 'Año 2022',
                        data: [12, 43, 34, 34, 34,23, 23,43,65]
                    }
                ],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            }); */

            /**PRUEBA*/
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                lang: {
                    viewFullscreen: "Ver en pantalla completa",
                    printChart: "Imprimir Gráfico",
                    downloadPNG: "Descargar en PNG",
                    downloadJPEG: "Descargar en JPEG",
                    downloadPDF: "Descargar en PDF",
                    downloadSVG: "Descargar en SVG",
                    downloadCSV: "Descarga CSV",
                    downloadXLS: "Descargar en Excel",
                    viewData: "Ver en Tabla",
                },
                credits: {
                    enabled: true,
                    text: "EYSERGES S.R.L.",
                    href: "#"
                },
                exporting: {
                    csv: {
                        columnHeaderFormatter: function(item, key) {
                            if (!item || item instanceof Highcharts.Axis) {
                                return 'Meses'
                            } else {
                                return item.name;
                            }
                        }
                    },
                    buttons: {
                        contextButton: {
                            menuItems:
                            [
                                // {
                                //     textKey: 'printChart',
                                //     onclick: function () {
                                //         this.print();
                                //     }
                                // }, {
                                // separator: true
                                // },
                                {
                                    textKey: 'downloadPNG',
                                    onclick: function () {
                                        this.exportChart();
                                    }
                                }, {
                                    textKey: 'downloadJPEG',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'image/jpeg'
                                        });
                                    }
                                }, {
                                    separator: true
                                },
                                {
                                    textKey: 'downloadPDF',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'application/pdf'
                                        });
                                    }
                                }, {
                                    textKey: 'downloadXLS',
                                    onclick: function () {
                                        this.downloadXLS();
                                    }
                                }
                            ]
                        }
                    }
                },
                title: {
                    text: `Gráfico de Columnas - Obras en general realizadas por departamento, ${year}`
                },
                subtitle: {
                    text: 'Fuente: <a href="#">EYSERGES S.R.L.</a>'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad de obras civiles'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: `Obras ejecutadas en ${year}:` + '<b>{point.y} Obras</b>'
                },
                series: [{
                    name: 'Número de Obras',
                    data: statesTwo,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });

            /**END PRUEBA*/

            // hecho
            Highcharts.chart('container1', {
                chart: {
                    type: 'variablepie'
                },
                lang: {
                    viewFullscreen: "Ver en pantalla completa",
                    printChart: "Imprimir Gráfico",
                    downloadPNG: "Descargar en PNG",
                    downloadJPEG: "Descargar en JPEG",
                    downloadPDF: "Descargar en PDF",
                    downloadSVG: "Descargar en SVG",
                    downloadCSV: "Descarga CSV",
                    downloadXLS: "Descargar en Excel",
                    viewData: "Ver en Tabla",
                },
                credits: {
                    enabled: true,
                    text: "EYSERGES S.R.L.",
                    href: "#"
                },
                exporting: {
                    csv: {
                        columnHeaderFormatter: function(item, key) {
                            if (!item || item instanceof Highcharts.Axis) {
                                return 'Meses'
                            } else {
                                return item.name;
                            }
                        }
                    },
                    buttons: {
                        contextButton: {
                            menuItems:
                            [
                                // {
                                //     textKey: 'printChart',
                                //     onclick: function () {
                                //         this.print();
                                //     }
                                // }, {
                                // separator: true
                                // },
                                {
                                    textKey: 'downloadPNG',
                                    onclick: function () {
                                        this.exportChart();
                                    }
                                }, {
                                    textKey: 'downloadJPEG',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'image/jpeg'
                                        });
                                    }
                                }, {
                                    separator: true
                                },
                                {
                                    textKey: 'downloadPDF',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'application/pdf'
                                        });
                                    }
                                }, {
                                    textKey: 'downloadXLS',
                                    onclick: function () {
                                        this.downloadXLS();
                                    }
                                }
                            ]
                        }
                    }
                },
                title: {
                    text: `Gráfico de Torta - Departamentos comparados por el tipo de obras en total, ${year}`,
                    align: 'left'
                },
                tooltip: {
                    headerFormat: '',
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                        'Obras en General realizadas en este departamento: <b>{point.w}</b><br/>' +
                        'Construcciones realizadas: <b>{point.x}</b><br/>' +
                        'Estudios realizados: <b>{point.y}</b><br/>' +
                        'Supervisiones realizadas: <b>{point.z}</b><br/>'
                },
                series: [{
                    minPointSize: 15,
                    innerSize: '20%',
                    zMin: 0,
                    name: 'countries',
                    data: states
                }]
            });

            // Data retrieved from: https://www.uefa.com/uefachampionsleague/history/
            Highcharts.chart('container2', {
                chart: {
                    type: 'bar'
                },
                lang: {
                    viewFullscreen: "Ver en pantalla completa",
                    printChart: "Imprimir Gráfico",
                    downloadPNG: "Descargar en PNG",
                    downloadJPEG: "Descargar en JPEG",
                    downloadPDF: "Descargar en PDF",
                    downloadSVG: "Descargar en SVG",
                    downloadCSV: "Descarga CSV",
                    downloadXLS: "Descargar en Excel",
                    viewData: "Ver en Tabla",
                },
                credits: {
                    enabled: true,
                    text: "EYSERGES S.R.L.",
                    href: "#"
                },
                exporting: {
                    csv: {
                        columnHeaderFormatter: function(item, key) {
                            if (!item || item instanceof Highcharts.Axis) {
                                return 'Meses'
                            } else {
                                return item.name;
                            }
                        }
                    },
                    buttons: {
                        contextButton: {
                            menuItems:
                            [
                                // {
                                //     textKey: 'printChart',
                                //     onclick: function () {
                                //         this.print();
                                //     }
                                // }, {
                                // separator: true
                                // },
                                {
                                    textKey: 'downloadPNG',
                                    onclick: function () {
                                        this.exportChart();
                                    }
                                }, {
                                    textKey: 'downloadJPEG',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'image/jpeg'
                                        });
                                    }
                                }, {
                                    separator: true
                                },
                                {
                                    textKey: 'downloadPDF',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'application/pdf'
                                        });
                                    }
                                }, {
                                    textKey: 'downloadXLS',
                                    onclick: function () {
                                        this.downloadXLS();
                                    }
                                }
                            ]
                        }
                    }
                },
                title: {
                    text: `Máximos trabajos realizados de los diferentes tipos de obras por departamento, ${year}`
                },
                xAxis: {
                    categories: ['La Paz', 'Oruro', 'Potosi', 'Cochabamba', 'Chuquisaca', 'Tarija', 'Pando', 'Beni', 'Santa Cruz'],
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Goals'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'Construcciones',
                    data: consDep
                }, {
                    name: 'Estudios',
                    data: stuDep
                }, {
                    name: 'Supervisiones',
                    data: supDep
                }]
            });


            const chart3 = Highcharts.chart('container3', {
                chart: {
                    styledMode: false,
                    events: {
                        load() {
                            const chart = this;
                            chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
                            setTimeout(function() {
                            chart.hideLoading();
                            }, 1000);
                        }
                        }
                },
                lang: {
                    viewFullscreen: "Ver en pantalla completa",
                    printChart: "Imprimir Gráfico",
                    downloadPNG: "Descargar en PNG",
                    downloadJPEG: "Descargar en JPEG",
                    downloadPDF: "Descargar en PDF",
                    downloadSVG: "Descargar en SVG",
                    downloadCSV: "Descarga CSV",
                    downloadXLS: "Descargar en Excel",
                    viewData: "Ver en Tabla",
                },
                credits: {
                    enabled: true,
                    text: "EYSERGES S.R.L.",
                    href: "#"
                },
                exporting: {
                    csv: {
                        columnHeaderFormatter: function(item, key) {
                            if (!item || item instanceof Highcharts.Axis) {
                                return 'Meses'
                            } else {
                                return item.name;
                            }
                        }
                    },
                    buttons: {
                        contextButton: {
                            menuItems:
                            [
                                // {
                                //     textKey: 'printChart',
                                //     onclick: function () {
                                //         this.print();
                                //     }
                                // }, {
                                // separator: true
                                // },
                                {
                                    textKey: 'downloadPNG',
                                    onclick: function () {
                                        this.exportChart();
                                    }
                                }, {
                                    textKey: 'downloadJPEG',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'image/jpeg'
                                        });
                                    }
                                }, {
                                    separator: true
                                },
                                {
                                    textKey: 'downloadPDF',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'application/pdf'
                                        });
                                    }
                                }, {
                                    textKey: 'downloadXLS',
                                    onclick: function () {
                                        this.downloadXLS();
                                    }
                                }
                            ]
                        }
                    }
                },
                title: {
                    text: `Realización de Obras Civiles Mensualmente de la gestión, ${year}`,
                    align: 'left'
                },
                subtitle: {
                    text: 'Tipo Gráfico: Plano | Fuente: ' +
                        '<a href="#"' +
                        'target="_blank">EYSERGES S.R.L.</a>',
                    align: 'left'
                },
                yAxis: {
                    title: {
                        text: '{{ __("Cantidad") }}'
                    }
                },
                xAxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                },
                series: [{
                    type: 'column',
                    name: 'Obras',
                    colorByPoint: true,
                    data: works,
                    showInLegend: false
                }]
            });

            document.getElementById('plain').addEventListener('click', () => {
                chart3.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Tipo Gráfico: Plano | Fuente: ' +
                        '<a href="#"' +
                        'target="_blank">EYSERGES S.R.L.</a>',
                    }
                });
            });

            document.getElementById('inverted').addEventListener('click', () => {
                chart3.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Tipo Gráfico: Invertido | Fuente: ' +
                        '<a href="#"' +
                        'target="_blank">EYSERGES S.R.L.</a>',
                    }
                });
            });

            document.getElementById('polar').addEventListener('click', () => {
                chart3.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Tipo Gráfico: Polar | Fuente: ' +
                        '<a href="#"' +
                        'target="_blank">EYSERGES S.R.L.</a>',
                    },
                    yAxis: {
                    title: {
                        text: '{{ __("Cant.") }}'
                    }
                },
                });
            });


        </script>
    @endpush
</x-main>

